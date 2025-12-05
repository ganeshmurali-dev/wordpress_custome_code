<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tech Review Blog
 */
?>

<footer class="footer-side">
  <?php if ( get_theme_mod( 'tech_review_blog_show_footer_widget', true ) ) : ?>
    <div class="footer-widget">
      <div class="container">
        <?php
          // Check if any footer sidebar is active
          $tech_review_blog_any_sidebar_active = false;
          for ( $tech_review_blog_i = 1; $tech_review_blog_i <= 4; $tech_review_blog_i++ ) {
            if ( is_active_sidebar( "footer{$tech_review_blog_i}-sidebar" ) ) {
              $tech_review_blog_any_sidebar_active = true;
              break;
            }
          }
          // Count active for responsive column classes
          $tech_review_blog_active_sidebars = 0;
          if ( $tech_review_blog_any_sidebar_active ) {
            for ( $tech_review_blog_i = 1; $tech_review_blog_i <= 4; $tech_review_blog_i++ ) {
              if ( is_active_sidebar( "footer{$tech_review_blog_i}-sidebar" ) ) {
                $tech_review_blog_active_sidebars++;
              }
            }
          }
          $tech_review_blog_col_class = $tech_review_blog_active_sidebars > 0 ? 'col-lg-' . (12 / $tech_review_blog_active_sidebars) . ' col-md-6 col-sm-12' : 'col-lg-3 col-md-6 col-sm-12';
        ?>
        <div class="row pt-2 <?php echo esc_attr( get_theme_mod('tech_review_blog_enable_footer_animation', true) ? 'zoomInUp wow' : '' ); ?>">
          <?php for ( $tech_review_blog_i = 1; $tech_review_blog_i <= 4; $tech_review_blog_i++ ) : ?>
            <div class="footer-area <?php echo esc_attr($tech_review_blog_col_class); ?>">
              <?php if ( $tech_review_blog_any_sidebar_active && is_active_sidebar("footer{$tech_review_blog_i}-sidebar") ) : ?>
                <?php dynamic_sidebar("footer{$tech_review_blog_i}-sidebar"); ?>
              <?php elseif ( ! $tech_review_blog_any_sidebar_active ) : ?>
                  <?php if ( $tech_review_blog_i === 1 ) : ?>
                    <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer1', 'tech-review-blog' ); ?>" id="Search" class="sidebar-widget">
                      <h4 class="title" ><?php esc_html_e( 'Search', 'tech-review-blog' ); ?></h4>
                      <?php get_search_form(); ?>
                    </aside>

                  <?php elseif ( $tech_review_blog_i === 2 ) : ?>
                      <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer2', 'tech-review-blog' ); ?>" id="archives" class="sidebar-widget">
                      <h4 class="title" ><?php esc_html_e( 'Archives', 'tech-review-blog' ); ?></h4>
                      <ul>
                          <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                      </ul>
                      </aside>
                  <?php elseif ( $tech_review_blog_i === 3 ) : ?>
                    <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer3', 'tech-review-blog' ); ?>" id="meta" class="sidebar-widget">
                      <h4 class="title"><?php esc_html_e( 'Meta', 'tech-review-blog' ); ?></h4>
                      <ul>
                        <?php wp_register(); ?>
                        <li><?php wp_loginout(); ?></li>
                        <?php wp_meta(); ?>
                      </ul>
                    </aside>
                  <?php elseif ( $tech_review_blog_i === 4 ) : ?>
                    <aside role="complementary" aria-label="<?php echo esc_attr__( 'footer4', 'tech-review-blog' ); ?>" id="categories" class="sidebar-widget">
                      <h4 class="title" ><?php esc_html_e( 'Categories', 'tech-review-blog' ); ?></h4>
                      <ul>
                          <?php wp_list_categories('title_li=');  ?>
                      </ul>
                    </aside>
                  <?php endif; ?>
              <?php endif; ?>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php if( get_theme_mod( 'tech_review_blog_show_footer_copyright',true)) : ?>
    <div class="footer-copyright  <?php if( get_theme_mod( 'tech_review_blog_sticky_copyright_enable','off') == 'on') { ?>sticky-copyright<?php } else { ?>close-sticky <?php } ?>">
      <div class="container">
        <div class="row pt-2">
          <div class="col-lg-6 col-md-6 align-self-center">
            <p class="mb-0 py-3 text-center text-md-start">
              <?php
                if (!get_theme_mod('tech_review_blog_footer_text') ) { ?>
                <a href="<?php echo esc_url(__('https://www.wpelemento.com/products/free-tech-review-wordpress-theme', 'tech-review-blog' )); ?>" target="_blank">
                  <?php esc_html_e('Tech Review Blog WordPress Theme','tech-review-blog'); ?>
                </a>
                <?php } else {
                  echo esc_html(get_theme_mod('tech_review_blog_footer_text'));
                }
              ?>
              <?php if ( get_theme_mod('tech_review_blog_copyright_enable', true) == true ) : ?>
              <?php
                /* translators: %s: WP Elemento */
                printf( esc_html__( ' By %s', 'tech-review-blog' ), 'WP Elemento' ); ?>
              <?php endif; ?>
            </p>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center text-center text-md-end">
            <?php if ( get_theme_mod('tech_review_blog_copyright_enable', true) == true ) : ?>
              <a href="<?php echo esc_url(__('https://wordpress.org','tech-review-blog') ); ?>" rel="generator"><?php  /* translators: %s: WordPress */ printf( esc_html__( 'Proudly powered by %s', 'tech-review-blog' ), 'WordPress' ); ?></a>
            <?php endif; ?>
          </div>
          <?php if(get_theme_mod('tech_review_blog_footer_social_icon_hide', false )== true){ ?>
            <div class="row">
              <div class="col-12 align-self-center py-1">
                <div class="footer-links">
                  <?php $tech_review_blog_settings_footer = get_theme_mod( 'tech_review_blog_social_links_settings_footer' ); ?>
                  <?php if ( is_array($tech_review_blog_settings_footer) || is_object($tech_review_blog_settings_footer) ){ ?>
                    <?php foreach( $tech_review_blog_settings_footer as $tech_review_blog_setting_footer ) { ?>
                      <a href="<?php echo esc_url( $tech_review_blog_setting_footer['link_url'] ); ?>" target="_blank">
                        <i class="<?php echo esc_attr( $tech_review_blog_setting_footer['link_text'] ); ?> me-2"></i>
                      </a>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <?php if ( get_theme_mod('tech_review_blog_scroll_enable_setting')) : ?>
    <div class="scroll-up">
      <a href="#tobottom"><i class="fas fa-angle-double-up"></i></a>
    </div>
  <?php endif; ?>
  <?php if(get_theme_mod('tech_review_blog_progress_bar', true )== true): ?>
    <div id="elemento-progress-bar" class="theme-progress-bar <?php if( get_theme_mod( 'tech_review_blog_progress_bar_position','top') == 'top') { ?> top <?php } else { ?> bottom <?php } ?>"></div>
  <?php endif; ?>
  <?php if(get_theme_mod('tech_review_blog_cursor_outline', false )== true): ?>
    <!-- Custom cursor -->
    <div class="cursor-point-outline"></div>
    <div class="cursor-point"></div>
    <!-- .Custom cursor -->
  <?php endif; ?>
</footer>

<?php wp_footer(); ?>

</body>
</html>