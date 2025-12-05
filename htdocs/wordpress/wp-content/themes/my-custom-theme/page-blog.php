<?php /* Template Name: Blog Page */ ?>
<?php get_header(); ?>
<div class="layout">
  <?php get_template_part('sidebar', 'left'); ?>

  <main class="content">
    <h1>Blog</h1>
    <?php
      $posts = new WP_Query([ 'post_type' => 'post' ]);
      while($posts->have_posts()): $posts->the_post(); ?>
      <div style="margin-bottom:20px;">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('large'); ?>
          <h2><?php the_title(); ?></h2>
        </a>
      </div>
    <?php endwhile; wp_reset_postdata(); ?>
  </main>

  <?php get_template_part('sidebar', 'right'); ?>
</div>
<?php get_footer(); ?>
