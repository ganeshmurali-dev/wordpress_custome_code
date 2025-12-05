<?php get_header(); ?>
<?php get_sidebar('left'); ?>

<main class="col-span-12 md:col-span-6">
<h1 class="text-3xl font-bold mb-6">Agastyaa Speaks</h1>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="bg-white rounded-2xl mb-8 overflow-hidden">
    <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('large'); ?>
        <div class="p-5">
            <h2 class="text-xl font-bold"><?php the_title(); ?></h2>
            <p class="text-gray-600"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
        </div>
    </a>
</div>
<?php endwhile; endif; ?>

<div class="flex justify-between">
<?php previous_posts_link('Previous'); ?>
<?php next_posts_link('Next'); ?>
</div>
</main>

<?php get_sidebar('right'); ?>
<?php get_footer(); ?>