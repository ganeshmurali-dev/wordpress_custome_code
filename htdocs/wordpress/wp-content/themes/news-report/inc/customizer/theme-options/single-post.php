<?php
/**
 * Single Post Options
 */

$wp_customize->add_section(
	'news_report_single_page_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'news-report' ),
		'panel' => 'news_report_theme_options_panel',
	)
);

// Enable single post category setting.
$wp_customize->add_setting(
	'news_report_enable_single_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'news_report_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new News_Report_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'news_report_enable_single_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'news-report' ),
			'settings' => 'news_report_enable_single_category',
			'section'  => 'news_report_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post author setting.
$wp_customize->add_setting(
	'news_report_enable_single_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'news_report_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new News_Report_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'news_report_enable_single_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'news-report' ),
			'settings' => 'news_report_enable_single_author',
			'section'  => 'news_report_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post date setting.
$wp_customize->add_setting(
	'news_report_enable_single_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'news_report_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new News_Report_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'news_report_enable_single_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'news-report' ),
			'settings' => 'news_report_enable_single_date',
			'section'  => 'news_report_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post tag setting.
$wp_customize->add_setting(
	'news_report_enable_single_tag',
	array(
		'default'           => true,
		'sanitize_callback' => 'news_report_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new News_Report_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'news_report_enable_single_tag',
		array(
			'label'    => esc_html__( 'Enable Post Tag', 'news-report' ),
			'settings' => 'news_report_enable_single_tag',
			'section'  => 'news_report_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Single post related Posts title label.
$wp_customize->add_setting(
	'news_report_related_posts_title',
	array(
		'default'           => __( 'Related Posts', 'news-report' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'news_report_related_posts_title',
	array(
		'label'    => esc_html__( 'Related Posts Title', 'news-report' ),
		'section'  => 'news_report_single_page_options',
		'settings' => 'news_report_related_posts_title',
	)
);
