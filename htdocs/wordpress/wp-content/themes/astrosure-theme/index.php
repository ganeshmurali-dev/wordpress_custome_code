<?php get_header(); ?>

<?php include 'sidebar-left.php'; ?>

<div class="middle">
<h2>Latest Posts</h2>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
  <div style="background:white;padding:20px;margin-bottom:20px;border-radius:12px;">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p><?php the_excerpt(); ?></p>
  </div>
<?php endwhile; endif; ?>
</div>

<?php include 'sidebar-right.php'; ?>

<?php get_footer(); ?>
