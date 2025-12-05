<?php get_header(); ?>
<div class="layout">
  <?php get_template_part('sidebar', 'left'); ?>

  <main class="content">
    <?php if(have_posts()): the_post(); ?>
      <?php the_post_thumbnail('large'); ?>
      <h1><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>
    <?php endif; ?>
  </main>

  <?php get_template_part('sidebar', 'right'); ?>
</div>
<?php get_footer(); ?>
