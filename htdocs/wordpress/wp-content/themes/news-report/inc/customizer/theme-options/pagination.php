<?php
/**
 * Pagination setting
 */

// Pagination setting.
$wp_customize->add_section(
	'news_report_pagination',
	array(
		'title' => esc_html__( 'Pagination', 'news-report' ),
		'panel' => 'news_report_theme_options_panel',
	)
);

// Pagination enable setting.
$wp_customize->add_setting(
	'news_report_pagination_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'news_report_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new News_Report_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'news_report_pagination_enable',
		array(
			'label'    => esc_html__( 'Enable Pagination.', 'news-report' ),
			'settings' => 'news_report_pagination_enable',
			'section'  => 'news_report_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Style.
$wp_customize->add_setting(
	'news_report_pagination_type',
	array(
		'default'           => 'numeric',
		'sanitize_callback' => 'news_report_sanitize_select',
	)
);

$wp_customize->add_control(
	'news_report_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Style', 'news-report' ),
		'section'         => 'news_report_pagination',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'news-report' ),
			'numeric' => __( 'Numeric', 'news-report' ),
		),
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'news_report_pagination_enable' )->value() );
		},
	)
);
