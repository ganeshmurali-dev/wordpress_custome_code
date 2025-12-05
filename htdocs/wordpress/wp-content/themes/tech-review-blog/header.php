<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tech Review Blog
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>
<?php if(get_theme_mod('tech_review_blog_preloader_hide', false )){ ?>
	<div class="loader">
		<div class="preloader">
			<div class="diamond">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
<?php } ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tech-review-blog' ); ?></a>

<header id="site-navigation" class="header <?php if( get_theme_mod( 'tech_review_blog_sticky_header','on') != '') { ?>sticky-header<?php } else { ?>close-sticky <?php } ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-3 col-sm-4 col-12 align-self-center">
				<div class="logo text-center text-sm-start my-2">
					<div class="logo-image text-center text-sm-start">
						<?php the_custom_logo(); ?>
					</div>
					<div class="logo-content text-center text-sm-start">
						<?php
							if ( get_theme_mod('tech_review_blog_display_header_title', true) == true ) :
								echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
								echo esc_attr(get_bloginfo('name'));
								echo '</a>';
							endif;
							if ( get_theme_mod('tech_review_blog_display_header_text', false) == true ) :
								echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
							endif;
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-10 col-md-9 col-sm-8 col-12">
				<div class="row top-header px-3">
					<div class="col-lg-6 col-md-6 col-sm-5 col-12 align-self-center text-sm-start text-center">
						<?php if ( get_theme_mod('tech_review_blog_date_enable', 'on' ) == true ) : ?>
							<div class="blog-date my-2">
								<i class="far fa-calendar-alt me-2"></i>
								<span><?php echo esc_html( wp_date( 'd-m-y' ) ); ?></span>
							</div>
						<?php endif; ?>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-7 col-12 align-self-center text-sm-end text-center py-2">
						<div class="row media-div">
							<?php $tech_review_blog_settings = get_theme_mod( 'tech_review_blog_social_links_settings' ); ?>
							<div class="social-links">
								<?php if ( is_array($tech_review_blog_settings) || is_object($tech_review_blog_settings) ){ ?>
									<?php foreach( $tech_review_blog_settings as $tech_review_blog_setting ) { ?>
										<a href="<?php echo esc_url( $tech_review_blog_setting['link_url'] ); ?>" target="_blank">
											<i class="<?php echo esc_attr( $tech_review_blog_setting['link_text'] ); ?>"></i>
										</a>
									<?php } ?>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="row bottom-header py-1">
					<div class="col-lg-9 col-md-8 col-sm-5 col-5 align-self-center text-start">
						<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false" type="button">
							<span aria-hidden="true"><i class="fa-solid fa-bars"></i></span>
						</button>
						<nav id="main-menu" class="close-panal">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'main-menu',
									'container' => 'false'
								));
							?>
							<button class="close-menu my-2 p-2" type="button">
								<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>
						</nav>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-7 col-7 align-self-center text-center px-2 d-flex justify-content-between">
						<?php if ( get_theme_mod('tech_review_blog_search_enable', 'on' ) == true ) : ?>
							<div class="search-cont py-2">
								<button type="button" class="search-cont-button"><i class="fas fa-search"></i></button>
							</div>
							<div class="outer-search">
								<div class="inner-search">
									<?php get_search_form(); ?>
								</div>
								<button type="button" class="closepop search-cont-button-close" >X</button>
							</div>
						<?php endif; ?>
						<?php if ( get_theme_mod('tech_review_blog_header_button_url') || get_theme_mod('tech_review_blog_header_button_text') ) : ?>
							<div class="subscribe-btn my-2 ">
								<a href="<?php echo esc_url( get_theme_mod('tech_review_blog_header_button_url' ) ); ?>"><?php echo esc_html( get_theme_mod('tech_review_blog_header_button_text' ) ); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>