<?php
/**
 * Sidebar settings.
 */

$wp_customize->add_section(
	'news_report_sidebar_option',
	array(
		'title' => esc_html__( 'Sidebar Options', 'news-report' ),
		'panel' => 'news_report_theme_options_panel',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'news_report_sidebar_position',
	array(
		'sanitize_callback' => 'news_report_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'news_report_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'news-report' ),
		'section' => 'news_report_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'news-report' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'news-report' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'news_report_post_sidebar_position',
	array(
		'sanitize_callback' => 'news_report_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'news_report_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'news-report' ),
		'section' => 'news_report_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'news-report' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'news-report' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'news_report_page_sidebar_position',
	array(
		'sanitize_callback' => 'news_report_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'news_report_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'news-report' ),
		'section' => 'news_report_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'news-report' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'news-report' ),
		),
	)
);
