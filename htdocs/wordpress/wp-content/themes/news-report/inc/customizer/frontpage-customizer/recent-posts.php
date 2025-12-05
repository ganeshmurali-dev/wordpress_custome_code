<?php
/**
 * Adore Themes Customizer
 *
 * @package News Report
 *
 * Recent Posts Section
 */

$wp_customize->add_section(
	'news_report_recent_posts_section',
	array(
		'title' => esc_html__( 'Recent Posts Section', 'news-report' ),
		'panel' => 'news_report_frontpage_panel',
	)
);

// Recent Posts section enable settings.
$wp_customize->add_setting(
	'news_report_recent_posts_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'news_report_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new News_Report_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'news_report_recent_posts_section_enable',
		array(
			'label'    => esc_html__( 'Enable Recent Posts Section', 'news-report' ),
			'type'     => 'checkbox',
			'settings' => 'news_report_recent_posts_section_enable',
			'section'  => 'news_report_recent_posts_section',
		)
	)
);

// Recent Posts title settings.
$wp_customize->add_setting(
	'news_report_recent_posts_title',
	array(
		'default'           => __( 'Recent Articles', 'news-report' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'news_report_recent_posts_title',
	array(
		'label'           => esc_html__( 'Title', 'news-report' ),
		'section'         => 'news_report_recent_posts_section',
		'active_callback' => 'news_report_if_recent_posts_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'news_report_recent_posts_title',
		array(
			'selector'            => '.recentpost h3.widget-title',
			'settings'            => 'news_report_recent_posts_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'news_report_recent_posts_title_text_partial',
		)
	);
}

// View All button label setting.
$wp_customize->add_setting(
	'news_report_recent_posts_view_all_button_label',
	array(
		'default'           => __( 'View All', 'news-report' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'news_report_recent_posts_view_all_button_label',
	array(
		'label'           => esc_html__( 'View All Button Label', 'news-report' ),
		'section'         => 'news_report_recent_posts_section',
		'settings'        => 'news_report_recent_posts_view_all_button_label',
		'type'            => 'text',
		'active_callback' => 'news_report_if_recent_posts_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'news_report_recent_posts_view_all_button_label',
		array(
			'selector'            => '.recentpost .adore-view-all',
			'settings'            => 'news_report_recent_posts_view_all_button_label',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'news_report_recent_posts_view_all_btn_partial',
		)
	);
}

// View All button URL setting.
$wp_customize->add_setting(
	'news_report_recent_posts_view_all_button_url',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'news_report_recent_posts_view_all_button_url',
	array(
		'label'           => esc_html__( 'View All Button Link', 'news-report' ),
		'section'         => 'news_report_recent_posts_section',
		'settings'        => 'news_report_recent_posts_view_all_button_url',
		'type'            => 'url',
		'active_callback' => 'news_report_if_recent_posts_enabled',
	)
);

// recent_posts content type settings.
$wp_customize->add_setting(
	'news_report_recent_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'news_report_sanitize_select',
	)
);

$wp_customize->add_control(
	'news_report_recent_posts_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'news-report' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'news-report' ),
		'section'         => 'news_report_recent_posts_section',
		'type'            => 'select',
		'active_callback' => 'news_report_if_recent_posts_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'news-report' ),
			'category' => esc_html__( 'Category', 'news-report' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// recent_posts post setting.
	$wp_customize->add_setting(
		'news_report_recent_posts_post_' . $i,
		array(
			'sanitize_callback' => 'news_report_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'news_report_recent_posts_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'news-report' ), $i ),
			'section'         => 'news_report_recent_posts_section',
			'type'            => 'select',
			'choices'         => news_report_get_post_choices(),
			'active_callback' => 'news_report_recent_posts_section_content_type_post_enabled',
		)
	);

}

// recent_posts category setting.
$wp_customize->add_setting(
	'news_report_recent_posts_category',
	array(
		'sanitize_callback' => 'news_report_sanitize_select',
	)
);

$wp_customize->add_control(
	'news_report_recent_posts_category',
	array(
		'label'           => esc_html__( 'Category', 'news-report' ),
		'section'         => 'news_report_recent_posts_section',
		'type'            => 'select',
		'choices'         => news_report_get_post_cat_choices(),
		'active_callback' => 'news_report_recent_posts_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function news_report_if_recent_posts_enabled( $control ) {
	return $control->manager->get_setting( 'news_report_recent_posts_section_enable' )->value();
}
function news_report_recent_posts_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'news_report_recent_posts_content_type' )->value();
	return news_report_if_recent_posts_enabled( $control ) && ( 'post' === $content_type );
}
function news_report_recent_posts_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'news_report_recent_posts_content_type' )->value();
	return news_report_if_recent_posts_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'news_report_recent_posts_title_text_partial' ) ) :
	// Title.
	function news_report_recent_posts_title_text_partial() {
		return esc_html( get_theme_mod( 'news_report_recent_posts_title' ) );
	}
endif;
if ( ! function_exists( 'news_report_recent_posts_view_all_btn_partial' ) ) :
	// View All Btn.
	function news_report_recent_posts_view_all_btn_partial() {
		return esc_html( get_theme_mod( 'news_report_recent_posts_view_all_button_label' ) );
	}
endif;
