<?php

/**
 * Theme Options Customizer.
 */

$wp_customize->add_panel(
	'news_report_theme_options_panel',
	array(
		'title'    => esc_html__( 'Theme Options', 'news-report' ),
		'priority' => 150,
	)
);

$theme_options_customizer = array( 'font-options', 'sidebar-layout', 'breadcrumb', 'archive-options', 'pagination', 'single-post', 'footer' );

foreach ( $theme_options_customizer as $customizer ) {
	require get_template_directory() . '/inc/customizer/theme-options/' . $customizer . '.php';

}
