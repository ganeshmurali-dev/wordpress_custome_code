<?php
/**
 * Adore Themes Customizer
 *
 * @package News Report
 *
 * Banner Section
 */

$wp_customize->add_section(
	'news_report_banner_section',
	array(
		'title' => esc_html__( 'Banner Section', 'news-report' ),
		'panel' => 'news_report_frontpage_panel',
	)
);

// Banner enable setting.
$wp_customize->add_setting(
	'news_report_banner_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'news_report_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new News_Report_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'news_report_banner_section_enable',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'news-report' ),
			'type'     => 'checkbox',
			'settings' => 'news_report_banner_section_enable',
			'section'  => 'news_report_banner_section',
		)
	)
);

// Featured posts title settings.
$wp_customize->add_setting(
	'news_report_banner_featured_posts_title',
	array(
		'default'           => __( 'Featured News', 'news-report' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'news_report_banner_featured_posts_title',
	array(
		'label'           => esc_html__( 'Title', 'news-report' ),
		'section'         => 'news_report_banner_section',
		'active_callback' => 'news_report_if_banner_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'news_report_banner_featured_posts_title',
		array(
			'selector'            => '.featured-posts-outer h3.widget-title',
			'settings'            => 'news_report_banner_featured_posts_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
		)
	);
}

// banner featured posts content type settings.
$wp_customize->add_setting(
	'news_report_banner_featured_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'news_report_sanitize_select',
	)
);

$wp_customize->add_control(
	'news_report_banner_featured_posts_content_type',
	array(
		'label'           => esc_html__( 'Featured Posts Content type:', 'news-report' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'news-report' ),
		'section'         => 'news_report_banner_section',
		'settings'        => 'news_report_banner_featured_posts_content_type',
		'type'            => 'select',
		'active_callback' => 'news_report_if_banner_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'news-report' ),
			'category' => esc_html__( 'Category', 'news-report' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// Featured Posts post setting.
	$wp_customize->add_setting(
		'news_report_banner_featured_posts_post_' . $i,
		array(
			'sanitize_callback' => 'news_report_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'news_report_banner_featured_posts_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'news-report' ), $i ),
			'section'         => 'news_report_banner_section',
			'type'            => 'select',
			'choices'         => news_report_get_post_choices(),
			'active_callback' => 'news_report_banner_featured_posts_content_type_post_enabled',
		)
	);

}

// Featured Posts category setting.
$wp_customize->add_setting(
	'news_report_banner_featured_posts_category',
	array(
		'sanitize_callback' => 'news_report_sanitize_select',
	)
);

$wp_customize->add_control(
	'news_report_banner_featured_posts_category',
	array(
		'label'           => esc_html__( 'Category', 'news-report' ),
		'section'         => 'news_report_banner_section',
		'type'            => 'select',
		'choices'         => news_report_get_post_cat_choices(),
		'active_callback' => 'news_report_banner_featured_posts_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function news_report_if_banner_enabled( $control ) {
	return $control->manager->get_setting( 'news_report_banner_section_enable' )->value();
}
// Banner Featured Posts.
function news_report_banner_featured_posts_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'news_report_banner_featured_posts_content_type' )->value();
	return news_report_if_banner_enabled( $control ) && ( 'post' === $content_type );
}
function news_report_banner_featured_posts_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'news_report_banner_featured_posts_content_type' )->value();
	return news_report_if_banner_enabled( $control ) && ( 'category' === $content_type );
}
