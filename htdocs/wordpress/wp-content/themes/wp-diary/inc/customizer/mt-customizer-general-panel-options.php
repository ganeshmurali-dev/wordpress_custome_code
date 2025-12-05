<?php
/**
 * WP Diary manage the Customizer options of general panel.
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

// Toggle field for Enable/Disable wow animation.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'toggle',
		'settings' => 'wp_diary_enable_wow_animation',
		'label'    => esc_html__( 'Enable Wow Animation', 'wp-diary' ),
		'section'  => 'wp_diary_section_site',
		'default'  => '1',
		'priority' => 5,
	)
);


// Radio Image field for Site layout
Kirki::add_field(
	'wp_diary_config', array(
		'type'     => 'radio-image',
		'settings' => 'wp_diary_site_layout',
		'label'    => esc_html__( 'Site Layout', 'wp-diary' ),
		'section'  => 'wp_diary_section_site',
		'default'  => 'site-layout--wide',
		'priority' => 5,
		'choices'  => array(
			'site-layout--wide'   => array(
				'src'	=> get_template_directory_uri() . '/assets/images/full-width.png',
				'alt'	=> __( 'Fullwidth', 'wp-diary' )
			),
			'site-layout--boxed'  => array(
				'src'	=> get_template_directory_uri() . '/assets/images/boxed-layout.png',
				'alt'	=> __( 'Boxed', 'wp-diary' )
			)
		),
	)
);

// Toggle field for Block-based Widgets Editor.
Kirki::add_field(
	'wp_diary_config', array(
		'type'     		=> 'toggle',
		'settings' 		=> 'wp_diary_enable_widgets_editor',
		'label'    		=> esc_html__( 'Enable Widgets Editor', 'wp-diary' ),
		'description' 	=> __( 'Enable/disable Block-based Widgets Editor(since WordPress 5.8).', 'wp-diary' ),
		'section'  		=> 'wp_diary_section_site',
		'default'  		=> '',
		'priority' 		=> 10,
	)
);

// Color Picker field for Primary Color
Kirki::add_field( 
	'wp_diary_config', array(
		'type'        => 'color',
		'settings'    => 'wp_diary_primary_color',
		'label'       => __( 'Primary Color', 'wp-diary' ),
		'section'     => 'colors',
		'default'     => '#ec9fa1',
	)
);


// Toggle for Date
Kirki::add_field(
    'wp_diary_config', array(
        'type'     => 'toggle',
        'settings' => 'wp_diary_post_meta_date',
        'label'    => esc_html__( 'Show Date', 'wp-diary' ),
        'section'  => 'wp_diary_section_posts',
        'default'  => '1',
        'priority' => 5,
    )
);

// Toggle for Categories
Kirki::add_field(
    'wp_diary_config', array(
        'type'     => 'toggle',
        'settings' => 'wp_diary_post_meta_categories',
        'label'    => esc_html__( 'Show Categories', 'wp-diary' ),
        'section'  => 'wp_diary_section_posts',
        'default'  => '1',
        'priority' => 10,
    )
);

// Toggle for Author
Kirki::add_field(
    'wp_diary_config', array(
        'type'     => 'toggle',
        'settings' => 'wp_diary_post_meta_author',
        'label'    => esc_html__( 'Show Author', 'wp-diary' ),
        'section'  => 'wp_diary_section_posts',
        'default'  => '0',
        'priority' => 15,
    )
);

// Toggle for Comments
Kirki::add_field(
    'wp_diary_config', array(
        'type'     => 'toggle',
        'settings' => 'wp_diary_post_meta_comments',
        'label'    => esc_html__( 'Show Comments', 'wp-diary' ),
        'section'  => 'wp_diary_section_posts',
        'default'  => '0',
        'priority' => 25,
    )
);


// Toggle for tags
Kirki::add_field(
    'wp_diary_config', array(
        'type'     => 'toggle',
        'settings' => 'wp_diary_post_meta_tags',
        'label'    => esc_html__( 'Show Tags', 'wp-diary' ),
        'section'  => 'wp_diary_section_posts',
        'default'  => '0',
        'priority' => 15,
    )
);