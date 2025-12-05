<?php get_header(); ?>
<?php get_sidebar('left'); ?>

<main class="col-span-12 md:col-span-6 bg-white rounded-2xl p-6">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <h1 class="text-3xl font-bold mb-4"><?php the_title(); ?></h1>
    <?php the_post_thumbnail('large', ['class' => 'rounded-lg mb-4']); ?>
    <div class="prose"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
</main>

<?php get_sidebar('right'); ?>
<?php get_footer(); ?>