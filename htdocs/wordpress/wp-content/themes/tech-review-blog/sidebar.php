<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tech Review Blog
 */
?>

<div class="sidebar-area <?php echo esc_attr( get_theme_mod('tech_review_blog_enable_sidebar_animation', true) ? 'zoomInRight wow' : '' ); ?>">
  <?php if ( ! dynamic_sidebar( 'tech-review-blog-sidebar' ) ) : ?>
    <div role="complementary" aria-label="<?php echo esc_attr__( 'sidebar1', 'tech-review-blog' ); ?>" id="Search" class="sidebar-widget">
      <h4 class="title" ><?php esc_html_e( 'Search', 'tech-review-blog' ); ?></h4>
      <?php get_search_form(); ?>
    </div>
    <div role="complementary" aria-label="<?php echo esc_attr__( 'sidebar2', 'tech-review-blog' ); ?>" id="archives" class="sidebar-widget">
      <h4 class="title" ><?php esc_html_e( 'Archives', 'tech-review-blog' ); ?></h4>
      <ul>
          <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
      </ul>
    </div>
    <div role="complementary" aria-label="<?php echo esc_attr__( 'sidebar3', 'tech-review-blog' ); ?>" id="meta" class="sidebar-widget">
      <h4 class="title"><?php esc_html_e( 'Meta', 'tech-review-blog' ); ?></h4>
      <ul>
        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
        <?php wp_meta(); ?>
      </ul>
    </div>
    <div role="complementary" aria-label="<?php echo esc_attr__( 'sidebar4', 'tech-review-blog' ); ?>" id="tag-cloud" class="sidebar-widget">
      <h4 class="title" ><?php esc_html_e( 'Tag Cloud', 'tech-review-blog' ); ?></h4>
      <?php wp_tag_cloud(); ?>
    </div>
  <?php endif; // end sidebar widget area ?>
</div>