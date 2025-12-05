<?php
/**
 * Blogwave Diary functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP Diary
 * @subpackage Blogwave Diary
 * @since 1.0.0
 */

/*------------------------- Theme Version -------------------------------------*/

    if ( ! defined( 'BLOGWAVE_DIARY_VERSION' ) ) {
        // Replace the version number of the theme on each release.
        $blogwave_diary_theme_info = wp_get_theme();
        define( 'BLOGWAVE_DIARY_VERSION', $blogwave_diary_theme_info->get( 'Version' ) );
    }

/*------------------------- Customizer ----------------------------------------*/

    add_action( 'customize_register', 'blogwave_diary_customize_register', 20 );

    if ( ! function_exists( 'blogwave_diary_customize_register' ) ) :

        /**
         * Customizer settings for blogwave diary
         */
        function blogwave_diary_customize_register( $wp_customize ) {

            $wp_customize->get_setting( 'wp_diary_primary_color' )->default = '#9f6e4a';

        }

    endif;

    function blogwave_diary_custom_fields() {
    if ( class_exists( 'Kirki' ) ) {
        
        Kirki::add_field(
            'wp_diary_config', array(
                'type'     => 'toggle',
                'settings' => 'wp_diary_enable_site_mode',
                'label'    => esc_html__( 'Enable Site Mode', 'blogwave-diary' ),
                'section'  => 'wp_diary_section_site',
                'default'  => '1',
                'priority' => 5,
            )
        );

        Kirki::add_field(
            'wp_diary_config', array(
                'type'     => 'toggle',
                'settings' => 'wp_diary_enable_background_animation',
                'label'    => esc_html__( 'Enable Background Animation', 'blogwave-diary' ),
                'section'  => 'wp_diary_section_site',
                'default'  => '1',
                'priority' => 5,
            )
        );
    }
}
add_action( 'after_setup_theme', 'blogwave_diary_custom_fields', 20 );

/*------------------------- Font url ------------------------------------------*/

    if ( ! function_exists( 'blogwave_diary_fonts_url' ) ) :

    	/**
    	 * Register Google fonts for blogwave Diary.
    	 *
    	 * @return string Google fonts URL for the theme.
    	 * @since 1.0.0
    	 */
        function blogwave_diary_fonts_url() {
            $fonts_url = '';
            $font_families = array();
            /*
             * Translators: If there are characters in your language that are not supported
             * by Great Vibes translate this to 'off'. Do not translate into your own language.
             */
            if ( 'off' !== _x( 'on', 'Great Vibes: on or off', 'blogwave-diary' ) ) {
                $font_families[] = 'Great Vibes:400';
            }
            if ( $font_families ) {
                $query_args = array(
                    'family' => urlencode( implode( '|', $font_families ) ),
                    'subset' => urlencode( 'latin,latin-ext' ),
                );
                $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
            }

            /*
             * Translators: If there are characters in your language that are not supported
             * by Be Vietnam Pro translate this to 'off'. Do not translate into your own language.
             */
            if ( 'off' !== _x( 'on', 'Be Vietnam Pro: on or off', 'blogwave-diary' ) ) {
                $font_families[] = 'Be Vietnam Pro:400,700';
            }
            if ( $font_families ) {
                $query_args = array(
                    'family' => urlencode( implode( '|', $font_families ) ),
                    'subset' => urlencode( 'latin,latin-ext' ),
                );
                $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
            }

            return $fonts_url;
        }

    endif;

/*------------------------- Enqueue scripts and styles ------------------------*/

    function blogwave_diary_scripts() {

        wp_enqueue_style( 'blogwave-diary-fonts', blogwave_diary_fonts_url(), array(), null );

        wp_dequeue_style( 'wp-diary-style' );

        wp_dequeue_style( 'wp-diary-responsive-style' );

        wp_enqueue_style( 'blogwave-diary-parent-style', get_template_directory_uri() . '/style.css', array(), BLOGWAVE_DIARY_VERSION );

        wp_enqueue_style( 'blogwave-diary-parent-responsive-style', get_template_directory_uri() . '/assets/css/mt-responsive.css', array(), BLOGWAVE_DIARY_VERSION );

        wp_enqueue_style( 'blogwave-diary-style', get_stylesheet_uri(), array(), BLOGWAVE_DIARY_VERSION );

        wp_enqueue_style( 'blogwave-diary-responsive-style', get_stylesheet_directory_uri() . '/assets/css/bd-responsive.css', array(), BLOGWAVE_DIARY_VERSION );

        $blogwave_diary_enable_site_mode = get_theme_mod( 'wp_diary_enable_site_mode', true );

        if ( $blogwave_diary_enable_site_mode == true ) {
            wp_enqueue_style( 'blogwave-diary-dark-mode-style', get_stylesheet_directory_uri() . '/assets/css/bd-dark-mode.css', array(), BLOGWAVE_DIARY_VERSION );
        }

    	$blogwave_diary_primary_color    = get_theme_mod( 'wp_diary_primary_color', '#9f6e4a' );

    	$output_css = '';

        $output_css .= ".edit-link .post-edit-link,.reply .comment-reply-link,.widget_search .search-submit,.widget_search .search-submit,.widget_search .search-submit:hover,.mt-menu-search .mt-form-wrap .search-form .search-submit:hover,.menu-toggle:hover,.slider-btn,.entry-footer .mt-readmore-btn,article.sticky::before,.post-format-media--quote,.mt-gallery-slider .slick-prev.slick-arrow:hover,.mt-gallery-slider .slick-arrow.slick-next:hover,.wp_diary_social_media a:hover,.mt-header-extra-icons .sidebar-header.mt-form-close:hover,#site-navigation .mt-form-close, #site-navigation ul li:hover>a,#site-navigation ul li.focus > a, #site-navigation ul li:hover>a, #site-navigation ul li.current-menu-item>a, #site-navigation ul li.current_page_ancestor>a, #site-navigation ul li.current_page_item>a, #site-navigation ul li.current-menu-ancestor>a,.cv-read-more a,.form-submit .submit, .wp-block-search__button, .cat-links a:hover, .menu-toggle{ background: ". esc_attr( $blogwave_diary_primary_color ) ."}\n";


        $output_css .= "a,a:hover,a:focus,a:active,.entry-footer a:hover ,.comment-author .fn .url:hover,.commentmetadata .comment-edit-link,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,.widget a:hover,.widget a:hover::before,.widget li:hover::before,.mt-social-icon-wrap li a:hover,.site-title a:hover,.mt-sidebar-menu-toggle:hover,.mt-menu-search:hover,.sticky-header-sidebar-menu li a:hover,.slide-title a:hover,.entry-title a:hover,.cat-links a,.entry-title a:hover,.navigation.pagination .nav-links .page-numbers.current,.navigation.pagination .nav-links a.page-numbers:hover,#top-footer .widget-title ,#footer-menu li a:hover,.wp_diary_latest_posts .mt-post-title a:hover,#mt-scrollup:hover, #secondary .widget .widget-title, .mt-related-post-title, #mt-masonry article .entry-footer .mt-readmore-btn:hover,.cv-read-more a:hover,.archive-classic-post-wrapper article .entry-footer .mt-readmore-btn:hover, .archive-grid-post-wrapper article .entry-footer .mt-readmore-btn:hover,.site-mode--dark .entry-title a:hover,article.hentry .entry-footer .mt-readmore-btn:hover,.site-mode--dark .widget_archive a:hover,.site-mode--dark .widget_categories a:hover,.site-mode--dark .widget_recent_entries a:hover,.site-mode--dark .widget_meta a:hover,.site-mode--dark .widget_recent_comments li:hover,.site-mode--dark .widget_rss li:hover,.site-mode--dark .widget_pages li a:hover,.site-mode--dark .widget_nav_menu li a:hover,.site-mode--dark .wp-block-latest-posts li a:hover,.site-mode--dark .wp-block-archives li a:hover,.site-mode--dark .wp-block-categories li a:hover,.site-mode--dark .wp-block-page-list li a:hover,.site-mode--dark .wp-block-latest-comments l:hover, .entry-meta a:hover, .published.updated:hover, .site-mode--dark .entry-footer a:hover, .site-mode--dark.single .byline:hover, .site-mode--dark.single .byline:hover a, .site-mode--dark .entry-meta a:hover,.navigation .nav-links a,  .site-mode--dark .wp_diary_latest_posts .mt-post-title a:hover, .site-mode--dark .wp_diary_latest_posts .mt-post-meta a:hover, .site-mode--dark #primary .entry-footer a:hover,.widget.wp_diary_latest_posts .mt-post-meta a:hover, .posted-on:hover, .entry-meta a:hover, .byline:hover, .comments-link:hover,.tags-links:hover{ color: ". esc_attr( $blogwave_diary_primary_color ) ."}\n";

        $output_css .= ".widget_search .search-submit,.widget_search .search-submit:hover,.no-thumbnail,.navigation.pagination .nav-links .page-numbers.current,.navigation.pagination .nav-links a.page-numbers:hover ,#secondary .widget .widget-title,.mt-related-post-title,.error-404.not-found,.wp_diary_social_media a:hover, #mt-masonry article .entry-footer .mt-readmore-btn, .cv-read-more a,.archive-classic-post-wrapper article .entry-footer .mt-readmore-btn:hover,.archive-grid-post-wrapper article .entry-footer .mt-readmore-btn:hover, .form-submit .submit:hover, .navigation .nav-links a,.cat-links a{ border-color: ". esc_attr( $blogwave_diary_primary_color ) ."}\n";

        $refine_output_css = wp_diary_css_strip_whitespace( $output_css );

        wp_add_inline_style( 'blogwave-diary-style', $refine_output_css );

        wp_enqueue_script( 'blogwave-diary-sticky-sidebar', get_stylesheet_directory_uri() . '/assets/library/sticky-sidebar/theia-sticky-sidebar.min.js', array(), BLOGWAVE_DIARY_VERSION, true );

        wp_enqueue_script( 'blogwave-diary-custom-scripts', get_stylesheet_directory_uri() . '/assets/js/bd-custom-scripts.js', array( 'jquery'), BLOGWAVE_DIARY_VERSION, true );

    }

    add_action( 'wp_enqueue_scripts', 'blogwave_diary_scripts', 99 );



/*------------------------- Footer --------------------------------------------*/

    if ( !function_exists ( 'wp_diary_footer_background_animation' ) ):

        /**
         * Footer Hook Handling
         *
         */
        function wp_diary_footer_background_animation() {

            $background_animation = get_theme_mod( 'wp_diary_enable_background_animation' , true );

            if ( $background_animation == false ) {
                return;
            }

            echo '<div class="blogwave-diary-background-animation" ><ul class="blogwave-diary-circles"> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> <li></li> </ul> </div > <!-- area -->';
        }

    endif;

    add_action ( 'wp_diary_scroll_top', 'wp_diary_footer_background_animation', 5 );
