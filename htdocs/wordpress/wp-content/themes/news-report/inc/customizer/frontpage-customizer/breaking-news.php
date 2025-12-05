<?php
/**
 * Adore Themes Customizer
 *
 * @package News Report
 *
 * Breaking News Section
 */

$wp_customize->add_section(
	'news_report_breaking_news_section',
	array(
		'title' => esc_html__( 'Breaking News Section', 'news-report' ),
		'panel' => 'news_report_frontpage_panel',
	)
);

// Breaking News section enable settings.
$wp_customize->add_setting(
	'news_report_breaking_news_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'news_report_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new News_Report_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'news_report_breaking_news_section_enable',
		array(
			'label'    => esc_html__( 'Enable Breaking News Section', 'news-report' ),
			'type'     => 'checkbox',
			'settings' => 'news_report_breaking_news_section_enable',
			'section'  => 'news_report_breaking_news_section',
		)
	)
);

// Breaking News title settings.
$wp_customize->add_setting(
	'news_report_breaking_news_title',
	array(
		'default'           => __( 'Breaking News', 'news-report' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'news_report_breaking_news_title',
	array(
		'label'           => esc_html__( 'Title', 'news-report' ),
		'section'         => 'news_report_breaking_news_section',
		'active_callback' => 'news_report_if_breaking_news_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'news_report_breaking_news_title',
		array(
			'selector'            => '.breaking-news-section h3.breaking-news-label',
			'settings'            => 'news_report_breaking_news_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'news_report_breaking_news_title_text_partial',
		)
	);
}

// Flash News Section - Speed Controller.
$wp_customize->add_setting(
	'news_report_breaking_news_speed_controller',
	array(
		'default'           => 200,
		'sanitize_callback' => 'news_report_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'news_report_breaking_news_speed_controller',
	array(
		'label'           => esc_html__( 'Speed Controller', 'news-report' ),
		'description'     => esc_html__( 'Note: Default speed value is 200.', 'news-report' ),
		'section'         => 'news_report_breaking_news_section',
		'settings'        => 'news_report_breaking_news_speed_controller',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'news_report_if_breaking_news_enabled',
	)
);

// breaking_news content type settings.
$wp_customize->add_setting(
	'news_report_breaking_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'news_report_sanitize_select',
	)
);

$wp_customize->add_control(
	'news_report_breaking_news_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'news-report' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'news-report' ),
		'section'         => 'news_report_breaking_news_section',
		'type'            => 'select',
		'active_callback' => 'news_report_if_breaking_news_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'news-report' ),
			'category' => esc_html__( 'Category', 'news-report' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// breaking_news post setting.
	$wp_customize->add_setting(
		'news_report_breaking_news_post_' . $i,
		array(
			'sanitize_callback' => 'news_report_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'news_report_breaking_news_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'news-report' ), $i ),
			'section'         => 'news_report_breaking_news_section',
			'type'            => 'select',
			'choices'         => news_report_get_post_choices(),
			'active_callback' => 'news_report_breaking_news_section_content_type_post_enabled',
		)
	);

}

// breaking_news category setting.
$wp_customize->add_setting(
	'news_report_breaking_news_category',
	array(
		'sanitize_callback' => 'news_report_sanitize_select',
	)
);

$wp_customize->add_control(
	'news_report_breaking_news_category',
	array(
		'label'           => esc_html__( 'Category', 'news-report' ),
		'section'         => 'news_report_breaking_news_section',
		'type'            => 'select',
		'choices'         => news_report_get_post_cat_choices(),
		'active_callback' => 'news_report_breaking_news_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function news_report_if_breaking_news_enabled( $control ) {
	return $control->manager->get_setting( 'news_report_breaking_news_section_enable' )->value();
}
function news_report_breaking_news_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'news_report_breaking_news_content_type' )->value();
	return news_report_if_breaking_news_enabled( $control ) && ( 'post' === $content_type );
}
function news_report_breaking_news_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'news_report_breaking_news_content_type' )->value();
	return news_report_if_breaking_news_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'news_report_breaking_news_title_text_partial' ) ) :
	// Title.
	function news_report_breaking_news_title_text_partial() {
		return esc_html( get_theme_mod( 'news_report_breaking_news_title' ) );
	}
endif;
