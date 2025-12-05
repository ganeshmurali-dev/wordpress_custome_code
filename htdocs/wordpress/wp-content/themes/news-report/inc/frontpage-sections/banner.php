<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package News Report
 */

// Banner Section.
$banner_section = get_theme_mod( 'news_report_banner_section_enable', false );

if ( false === $banner_section ) {
	return;
}

$featured_posts_content_ids  = array();
$featured_posts_content_type = get_theme_mod( 'news_report_banner_featured_posts_content_type', 'post' );

if ( $featured_posts_content_type === 'post' ) {

	for ( $i = 1; $i <= 5; $i++ ) {
		$featured_posts_content_ids[] = get_theme_mod( 'news_report_banner_featured_posts_post_' . $i );
	}

	$featured_posts_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);

	if ( ! empty( array_filter( $featured_posts_content_ids ) ) ) {
		$featured_posts_args['post__in'] = array_filter( $featured_posts_content_ids );
		$featured_posts_args['orderby']  = 'post__in';
	} else {
		$featured_posts_args['orderby'] = 'date';
	}
} else {
	$cat_content_id      = get_theme_mod( 'news_report_banner_featured_posts_category' );
	$featured_posts_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}

$featured_title = get_theme_mod( 'news_report_banner_featured_posts_title', __( 'Featured News', 'news-report' ) );
?>

<div id="news_report_banner_section" class="main-banner-section style-1 adore-navigation">
	<div class="theme-wrapper">
		<div class="main-banner-section-wrapper">
			<?php if ( is_active_sidebar( 'banner-widget-1' ) ) { ?>	
				<div class="banner-widget-area banner-widget-1">
					<div class="banner-widget-inside">
							<?php dynamic_sidebar( 'banner-widget-1' ); ?>
					</div>
				</div>
			<?php } ?>
			<div class="featured-posts-outer">
				<div class="featured-posts-inside">
					<?php if ( ! empty( $featured_title ) ) : ?>
						<div class="widget-header">
							<h3 class="widget-title"><?php echo esc_html( $featured_title ); ?></h3>
						</div>
					<?php endif; ?>
					<div class="featured-posts dark-mode">
						<?php
						$i = 1;
						$featured_posts_query = new WP_Query( $featured_posts_args );
						if ( $featured_posts_query->have_posts() ) {
							while ( $featured_posts_query->have_posts() ) :
								$featured_posts_query->the_post();
								?>
								<div class="post-item <?php echo esc_attr( $i === 1 ? 'overlay-post' : 'post-list' ); ?>">
									<div class="post-item-image">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>							
										</a>
									</div>
									<div class="post-item-content">
										<div class="entry-cat <?php echo esc_attr( $i === 1 ? '' : 'no-bg' ); ?>">
											<?php the_category( '', '', get_the_ID() ); ?>						
										</div>
										<h3 class="entry-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>  
										<ul class="entry-meta">
											<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="far fa-user"></span><?php echo esc_html( get_the_author() ); ?></a></li>
											<li class="post-date"> <span class="far fa-calendar-alt"></span><?php echo esc_html( get_the_date() ); ?></li>
											<li class="post-comment"> <span class="far fa-comment"></span><?php echo absint( get_comments_number( get_the_ID() ) ); ?></li>
										</ul>
									</div>
								</div>
								<?php
								$i++;
							endwhile;
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
			</div>

			<?php if ( is_active_sidebar( 'banner-widget-2' ) ) { ?>
				<div class="banner-widget-area banner-widget-2">
					<div class="banner-widget-inside">
							<?php dynamic_sidebar( 'banner-widget-2' ); ?>
					</div>
				</div>
			<?php } ?> <!--check this code -->	
				
		</div>
	</div>
</div>
