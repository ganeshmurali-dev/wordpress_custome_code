<?php

/**
 * Font section
 */

// Font section.
$wp_customize->add_section(
	'news_report_font_options',
	array(
		'title' => esc_html__( 'Font ( Typography ) Options', 'news-report' ),
		'panel' => 'news_report_theme_options_panel',
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'news_report_site_title_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'news_report_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'news_report_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'news-report' ),
		'section'  => 'news_report_font_options',
		'settings' => 'news_report_site_title_font',
		'type'     => 'select',
		'choices'  => news_report_font_choices(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'news_report_site_description_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'news_report_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'news_report_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'news-report' ),
		'section'  => 'news_report_font_options',
		'settings' => 'news_report_site_description_font',
		'type'     => 'select',
		'choices'  => news_report_font_choices(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'news_report_header_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'news_report_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'news_report_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'news-report' ),
		'section'  => 'news_report_font_options',
		'settings' => 'news_report_header_font',
		'type'     => 'select',
		'choices'  => news_report_font_choices(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'news_report_body_font',
	array(
		'default'           => '',
		'sanitize_callback' => 'news_report_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'news_report_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'news-report' ),
		'section'  => 'news_report_font_options',
		'settings' => 'news_report_body_font',
		'type'     => 'select',
		'choices'  => news_report_font_choices(),
	)
);
