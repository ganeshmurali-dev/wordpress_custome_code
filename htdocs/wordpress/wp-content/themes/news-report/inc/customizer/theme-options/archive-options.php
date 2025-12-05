<?php
/**
 * Blog / Archive Options
 */

$wp_customize->add_section(
	'news_report_archive_page_options',
	array(
		'title' => esc_html__( 'Blog / Archive Pages Options', 'news-report' ),
		'panel' => 'news_report_theme_options_panel',
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'news_report_excerpt_length',
	array(
		'default'           => 25,
		'sanitize_callback' => 'news_report_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'news_report_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'news-report' ),
		'section'     => 'news_report_archive_page_options',
		'settings'    => 'news_report_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Grid Column layout options.
$wp_customize->add_setting(
	'news_report_archive_grid_column_layout',
	array(
		'default'           => 'grid-column-3',
		'sanitize_callback' => 'news_report_sanitize_select',
	)
);

$wp_customize->add_control(
	'news_report_archive_grid_column_layout',
	array(
		'label'   => esc_html__( 'Grid Column Layout', 'news-report' ),
		'section' => 'news_report_archive_page_options',
		'type'    => 'select',
		'choices' => array(
			'grid-column-2' => __( 'Column 2', 'news-report' ),
			'grid-column-3' => __( 'Column 3', 'news-report' ),
		),
	)
);

// Enable archive page category setting.
$wp_customize->add_setting(
	'news_report_enable_archive_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'news_report_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new News_Report_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'news_report_enable_archive_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'news-report' ),
			'settings' => 'news_report_enable_archive_category',
			'section'  => 'news_report_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page author setting.
$wp_customize->add_setting(
	'news_report_enable_archive_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'news_report_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new News_Report_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'news_report_enable_archive_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'news-report' ),
			'settings' => 'news_report_enable_archive_author',
			'section'  => 'news_report_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page date setting.
$wp_customize->add_setting(
	'news_report_enable_archive_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'news_report_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new News_Report_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'news_report_enable_archive_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'news-report' ),
			'settings' => 'news_report_enable_archive_date',
			'section'  => 'news_report_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);
