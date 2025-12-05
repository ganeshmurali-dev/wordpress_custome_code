<?php
	
require get_template_directory() . '/includes/tgm/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function tech_review_blog_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'tech-review-blog' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WPElemento Importer', 'tech-review-blog' ),
			'slug'             => 'wpelemento-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Royal Elementor Addons', 'tech-review-blog' ),
			'slug'             => 'royal-elementor-addons',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'Elementor', 'tech-review-blog' ),
			'slug'             => 'elementor',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tech_review_blog_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'tech_review_blog_register_recommended_plugins' );
