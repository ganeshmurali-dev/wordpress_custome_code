<?php get_header(); ?>
<div class="layout">
  <?php get_template_part('sidebar', 'left'); ?>

  <main class="content">
    <h2>Latest Posts</h2>
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <div style="margin-bottom:20px;">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('large'); ?>
          <h2><?php the_title(); ?></h2>
        </a>
      </div>
    <?php endwhile; endif; ?>
  </main>

  <?php get_template_part('sidebar', 'right'); ?>
</div>
<?php get_footer(); ?>
