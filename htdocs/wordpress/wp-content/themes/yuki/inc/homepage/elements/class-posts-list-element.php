<?php

/**
 * Homepage posts list element
 *
 * @package Yuki
 */
use LottaFramework\Customizer\Controls\Collapse;
use LottaFramework\Customizer\Controls\Number;
use LottaFramework\Customizer\Controls\Section;
use LottaFramework\Customizer\Controls\Separator;
use LottaFramework\Customizer\Controls\Slider;
use LottaFramework\Customizer\Controls\Tabs;
use LottaFramework\Facades\Css;
use LottaFramework\Utils;
if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly.
}
if ( !class_exists( 'Yuki_Posts_List_Element' ) ) {
    class Yuki_Posts_List_Element extends Yuki_Posts_Base_Element {
        use Yuki_Post_Pagination;
        /**
         * @return array
         */
        public function getControls() {
            return [( new Tabs() )->ghostStyle()->setActiveTab( 'content' )->addTab( 'content', __( 'Content', 'yuki' ), [( new Collapse() )->setLabel( __( 'Query', 'yuki' ) )->setControls( array_merge( [( new Number('posts-count') )->setLabel( __( 'Posts Count', 'yuki' ) )->setMin( 1 )->setMax( 100 )->setDefaultValue( 6 ), new Separator()], $this->getPostsQueryControls() ) ), ( new Collapse() )->setLabel( __( 'Layout', 'yuki' ) )->setControls( [( new \LottaFramework\Customizer\Controls\Radio('thumbnail-position') )->setLabel( __( 'Thumbnail Position', 'yuki' ) )->buttonsGroupView()->setDefaultValue( 'left' )->setChoices( [
                'left'  => __( 'Left', 'yuki' ),
                'right' => __( 'Right', 'yuki' ),
            ] ), ( new Slider('thumbnail-width') )->setLabel( __( 'Thumbnail Width', 'yuki' ) )->setDefaultUnit( '%' )->setUnits( [[
                'unit' => 'px',
                'min'  => 0,
                'max'  => 1000,
            ], [
                'unit' => '%',
                'min'  => 0,
                'max'  => 100,
            ]] )->setMin( 0 )->setMax( 100 )->enableResponsive()->setDefaultValue( [
                'desktop' => '45%',
                'tablet'  => '45%',
                'mobile'  => '100%',
            ] ), ( new Slider('items-gap') )->setLabel( __( 'Items Gap', 'yuki' ) )->enableResponsive()->setDefaultUnit( 'px' )->setDefaultValue( '24px' )] ), ( new Collapse() )->setLabel( __( 'Card', 'yuki' ) )->setControls( array_merge( [$this->getPostElementsLayer( 'structure', 'el', [
                'value' => [
                    [
                        'id'      => 'thumbnail',
                        'visible' => true,
                    ],
                    [
                        'id'      => 'categories',
                        'visible' => true,
                    ],
                    [
                        'id'      => 'title',
                        'visible' => true,
                    ],
                    [
                        'id'      => 'excerpt',
                        'visible' => true,
                    ],
                    [
                        'id'      => 'metas',
                        'visible' => true,
                    ]
                ],
                'title' => [],
                'cats'  => [],
                'tags'  => [],
                'metas' => [],
            ] ), new Separator()], $this->getCardContentControls() ) )] )->addTab( 'style', __( 'Style', 'yuki' ), [( new Collapse() )->setLabel( __( 'Card', 'yuki' ) )->setControls( $this->getCardStyleControls() )] ), ( new Section('pagination') )->setLabel( __( 'Pagination', 'yuki' ) )->enableSwitch( false )->setControls( $this->getPaginationControls() )];
        }

        /**
         * {@inheritDoc}
         */
        public function enqueue_frontend_scripts( $id = null, $data = [] ) {
            if ( !$id ) {
                return;
            }
            $settings = $data['settings'] ?? [];
            // Add magazine grid dynamic css
            add_filter( 'yuki_filter_dynamic_css', function ( $css ) use($id, $settings) {
                $elements = [
                    'title',
                    'metas',
                    'categories',
                    'tags',
                    'excerpt',
                    'divider',
                    'thumbnail',
                    'read-more'
                ];
                $css[".{$id}"] = [
                    '--card-gap'             => $this->get( 'items-gap', $settings ),
                    '--card-thumbnail-width' => $this->get( 'thumbnail-width', $settings ),
                ];
                $css[".{$id} .card"] = array_merge(
                    Css::background( $this->get( 'card_background', $settings ) ),
                    Css::shadow( $this->get( 'card_shadow', $settings ) ),
                    Css::border( $this->get( 'card_border', $settings ) ),
                    Css::dimensions( $this->get( 'card_radius', $settings ), 'border-radius' )
                );
                $css[".{$id} .card .card-content"] = [
                    'text-align'                        => $this->get( 'card_content_alignment', $settings ),
                    'justify-content'                   => $this->get( 'card_vertical_alignment', $settings ),
                    '--card-content-vertical-alignment' => $this->get( 'card_vertical_alignment', $settings ),
                    '--card-content-spacing'            => $this->get( 'card_content_spacing', $settings ),
                ];
                // post pagination
                if ( $this->checked( 'pagination', $settings ) ) {
                    $css[".{$id} .yuki-pagination"] = yuki_posts_pagination_css( [
                        'options'  => $this,
                        'settings' => $settings,
                    ] );
                }
                return array_merge( $css, yuki_post_elements_css(
                    ".{$id} .card",
                    'el',
                    $elements,
                    $this,
                    $settings
                ) );
            } );
        }

        /**
         * @param array $attrs
         *
         * @return mixed|void
         */
        public function render( $attrs = [] ) {
            $id = $attrs['id'];
            $settings = $attrs['settings'];
            $homepag_builder_id = apply_filters( 'yuki_homepage_builder_id', 'yuki_homepage_builder' ) . '_';
            $page_key = ( is_string( $id ) ? str_replace( $homepag_builder_id, '', $id ) . '_paged' : $id );
            $this->add_render_attribute( $id, 'class', Utils::clsx( ['yuki-page-builder-element', $id] ) );
            if ( is_customize_preview() ) {
                $this->add_render_attribute( $id, 'data-shortcut', 'drop' );
                $this->add_render_attribute( $id, 'data-shortcut-location', $attrs['location'] );
            }
            $posts = new \WP_Query($this->getPostsQueryArgs( $this->get( 'posts-count', $settings ), $settings, $page_key ));
            $layout = 'archive-' . $this->get( 'thumbnail-position', $settings );
            ?>
            <div <?php 
            $this->print_attribute_string( $id );
            ?>>
                <div class="yuki-posts-grid card-list">
					<?php 
            while ( $posts->have_posts() ) {
                $posts->the_post();
                ?>
                        <div class="card-wrapper">
                            <article data-card-layout="<?php 
                echo esc_attr( $layout );
                ?>" class="<?php 
                Utils::the_clsx( get_post_class( 'yuki-scroll-reveal card overflow-hidden h-full', get_the_ID() ), [
                    'card-thumb-motion' => $this->checked( 'yuki_el_thumbnail_motion', $settings ),
                ] );
                ?>">
								<?php 
                yuki_post_structure( ...$this->get_post_structure_args( $id, $settings ) );
                ?>
                            </article>
                        </div>
					<?php 
            }
            ?>
					<?php 
            wp_reset_postdata();
            ?>
                </div>
				<?php 
            if ( $this->checked( 'pagination', $settings ) ) {
                yuki_show_query_pagination( $posts, [
                    'page_key' => $page_key,
                    'options'  => $this,
                    'settings' => $settings,
                ] );
            }
            ?>
            </div>
			<?php 
        }

    }

}