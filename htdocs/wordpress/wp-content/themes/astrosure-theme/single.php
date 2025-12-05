<?php get_header(); ?>
<?php include 'sidebar-left.php'; ?>

<div class="middle">
  <article style="background:white;padding:20px;border-radius:12px;">
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  </article>
</div>

<?php include 'sidebar-right.php'; ?>
<?php get_footer(); ?>
