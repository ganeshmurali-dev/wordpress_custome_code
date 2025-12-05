<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));


	Kirki::add_field( 'theme_config_id', [
		'label'       => esc_html__( 'Logo Size','tech-review-blog' ),
		'section'     => 'title_tagline',
		'priority'    => 9,
		'type'        => 'range',
		'settings'    => 'logo_size',
		'choices' => [
			'step'             => 5,
			'min'              => 0,
			'max'              => 100,
			'aria-valuemin'    => 0,
			'aria-valuemax'    => 100,
			'aria-valuenow'    => 50,
			'aria-orientation' => 'horizontal',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'tech_review_blog_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'tech-review-blog' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'tech-review-blog' ),
			'off' => esc_html__( 'Disable', 'tech-review-blog' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'tech_review_blog_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'tech-review-blog' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'tech-review-blog' ),
			'off' => esc_html__( 'Disable', 'tech-review-blog' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	// TYPOGRAPHY SETTINGS

	Kirki::add_panel( 'tech_review_blog_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'tech-review-blog' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'tech_review_blog_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'tech-review-blog' ),
		'panel'    => 'tech_review_blog_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_h1_typography_heading',
		'section'     => 'tech_review_blog_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'tech_review_blog_h1_typography_font',
		'section'   =>  'tech_review_blog_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'IBM Plex Sans', serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  array('.header-image-box h1'),
				'suffix' => '!important'
			],
		],
	) );

	//Heading 2 Section

	Kirki::add_section( 'tech_review_blog_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'tech-review-blog' ),
		'panel'    => 'tech_review_blog_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_h2_typography_heading',
		'section'     => 'tech_review_blog_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'tech_review_blog_h2_typography_font',
		'section'   =>  'tech_review_blog_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'IBM Plex Sans', serif",
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'tech_review_blog_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'tech-review-blog' ),
		'panel'    => 'tech_review_blog_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_h3_typography_heading',
		'section'     => 'tech_review_blog_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'tech_review_blog_h3_typography_font',
		'section'   =>  'tech_review_blog_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'IBM Plex Sans', serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'tech_review_blog_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'tech-review-blog' ),
		'panel'    => 'tech_review_blog_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_h4_typography_heading',
		'section'     => 'tech_review_blog_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'tech_review_blog_h4_typography_font',
		'section'   =>  'tech_review_blog_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'IBM Plex Sans', serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'tech_review_blog_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'tech-review-blog' ),
		'panel'    => 'tech_review_blog_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_h5_typography_heading',
		'section'     => 'tech_review_blog_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'tech_review_blog_h5_typography_font',
		'section'   =>  'tech_review_blog_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'IBM Plex Sans', serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'tech_review_blog_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'tech-review-blog' ),
		'panel'    => 'tech_review_blog_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_h6_typography_heading',
		'section'     => 'tech_review_blog_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'tech_review_blog_h6_typography_font',
		'section'   =>  'tech_review_blog_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'IBM Plex Sans', serif",
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'tech_review_blog_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'tech-review-blog' ),
		'panel'    => 'tech_review_blog_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_body_typography_heading',
		'section'     => 'tech_review_blog_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'tech_review_blog_body_typography_font',
		'section'   =>  'tech_review_blog_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  "'IBM Plex Sans', serif",
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) );

	// Theme color

	Kirki::add_section( 'tech_review_blog_theme_color_setting', array(
		'title'    => __( 'Color Option', 'tech-review-blog' ),
		'priority' => 10,
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_first_theme_color',
		'label'       => __( 'Theme First color', 'tech-review-blog'),
		'description'    => esc_html__( 'To customize the colors of the homepage, use the Elementor editor', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_theme_color_setting',
		'type'        => 'color',
		'default'     => '#432CF3',
	) );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_second_theme_color',
		'label'       => __( 'Theme Second color', 'tech-review-blog'),
		'description'    => esc_html__( 'To customize the colors of the homepage, use the Elementor editor', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_theme_color_setting',
		'type'        => 'color',
		'default'     => '#1C222A',
	) );

	//Theme Options Panel

	Kirki::add_panel( 'tech_review_blog_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'tech-review-blog' ),
	) );

	// HEADER SECTION

	Kirki::add_section( 'tech_review_blog_section_header',array(
		'title' => esc_html__( 'Header Settings', 'tech-review-blog' ),
		'description'    => esc_html__( 'Here you can add header information.', 'tech-review-blog' ),
		'panel' => 'tech_review_blog_theme_options_panel',
		'tabs'  => [
			'header' => [
				'label' => esc_html__( 'Header', 'tech-review-blog' ),
			],
			'menu'  => [
				'label' => esc_html__( 'Menu', 'tech-review-blog' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'tech_review_blog_menu_size_heading',
		'section'     => 'tech_review_blog_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Font Size(px)', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_menu_size',
		'tab'      => 'menu',
		'label'       => __( 'Enter a value in pixels. Example:20px', 'tech-review-blog' ),
		'type'        => 'text',
		'section'     => 'tech_review_blog_section_header',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => 'font-size',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'menu',
		'settings'    => 'tech_review_blog_menu_text_transform_heading',
		'section'     => 'tech_review_blog_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Menu Text Transform', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'menu',
		'settings'    => 'tech_review_blog_menu_text_transform',
		'section'     => 'tech_review_blog_section_header',
		'default'     => 'capitalize',
		'choices'     => [
			'none' => esc_html__( 'Normal', 'tech-review-blog' ),
			'uppercase' => esc_html__( 'Uppercase', 'tech-review-blog' ),
			'lowercase' => esc_html__( 'Lowercase', 'tech-review-blog' ),
			'capitalize' => esc_html__( 'Capitalize', 'tech-review-blog' ),
		],
		'output' => array(
			array(
				'element'  => array( '#main-menu a', '#main-menu ul li a', '#main-menu li a'),
				'property' => ' text-transform',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'tab'      => 'header',
		'settings'    => 'tech_review_blog_sticky_header',
		'label'       => esc_html__( 'Enable/Disable Sticky Header', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'tech-review-blog' ),
			'off' => esc_html__( 'Disable', 'tech-review-blog' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'tab'      => 'header',
		'settings'    => 'tech_review_blog_date_enable',
		'label'       => esc_html__( 'Enable/Disable Date', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'tech-review-blog' ),
			'off' => esc_html__( 'Disable', 'tech-review-blog' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'tab'      => 'header',
		'settings'    => 'tech_review_blog_search_enable',
		'label'       => esc_html__( 'Enable/Disable Search', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'tech-review-blog' ),
			'off' => esc_html__( 'Disable', 'tech-review-blog' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'tech_review_blog_enable_button_heading',
		'section'     => 'tech_review_blog_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Subscribe Button', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'tab'      => 'header',
		'label'    => esc_html__( 'Button Text', 'tech-review-blog' ),
		'settings' => 'tech_review_blog_header_button_text',
		'section'  => 'tech_review_blog_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'tab'      => 'header',
		'label'    =>  esc_html__( 'Button Link', 'tech-review-blog' ),
		'settings' => 'tech_review_blog_header_button_url',
		'section'  => 'tech_review_blog_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'tech_review_blog_enable_socail_link',
		'priority'       => 11,
		'section'     => 'tech_review_blog_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'tab'      => 'header',
		'section'     => 'tech_review_blog_section_header',
		'priority'       => 11,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'tech-review-blog' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'tech-review-blog' ),
		'settings'     => 'tech_review_blog_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'tech-review-blog' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'tech-review-blog' ). ' <a href="https://fontawesome.com/v6/search?ic=brands" target="_blank"><strong>' . esc_html__( 'View All', 'tech-review-blog' ) . ' </strong></a>',
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'tech-review-blog' ),
				'description' => esc_html__( 'Add the social icon url here.', 'tech-review-blog' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'tech_review_blog_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'tech-review-blog' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'tech-review-blog' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'tech_review_blog_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_woocommerce_settings',
		'default'     => 'false',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'tech-review-blog' ),
		'settings'    => 'tech_review_blog_shop_page_layout',
		'section'     => 'tech_review_blog_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'tech-review-blog' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'tech-review-blog' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'tech_review_blog_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'tech-review-blog' ),
		'settings'    => 'tech_review_blog_products_per_row',
		'section'     => 'tech_review_blog_woocommerce_settings',
		'default'     => '4',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'tech-review-blog' ),
		'settings'    => 'tech_review_blog_products_per_page',
		'section'     => 'tech_review_blog_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'tech_review_blog_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'tech-review-blog' ),
		'settings'    => 'tech_review_blog_single_product_sidebar_layout',
		'section'     => 'tech_review_blog_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'tech-review-blog' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'tech-review-blog' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'tech_review_blog_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_products_button_border_radius_heading',
		'section'     => 'tech_review_blog_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'tech_review_blog_products_button_border_radius',
		'section'     => 'tech_review_blog_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_sale_badge_position_heading',
		'section'     => 'tech_review_blog_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'tech_review_blog_sale_badge_position',
		'section'     => 'tech_review_blog_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'tech-review-blog' ),
			'left' => esc_html__( 'Left', 'tech-review-blog' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_products_sale_font_size_heading',
		'section'     => 'tech_review_blog_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'tech_review_blog_products_sale_font_size',
		'section'     => 'tech_review_blog_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );
	
	//ADDITIONAL SETTINGS

	Kirki::add_section( 'tech_review_blog_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'tech-review-blog' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'tech-review-blog' ),
		'panel'    => 'tech_review_blog_theme_options_panel',
		'priority'       => 10,
		'tabs'  => [
			'general' => [
				'label' => esc_html__( 'General', 'tech-review-blog' ),
			],
			'header-image'  => [
				'label' => esc_html__( 'Header Image', 'tech-review-blog' ),
			],
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'tech_review_blog_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => '0',
		'priority'    => 10,
		'tab'      => 'general',
	] );
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'tech_review_blog_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => '0',
		'priority'    => 10,
		'tab'      => 'general',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_enable_sidebar_animation_heading',
		'section'     => 'tech_review_blog_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Animation', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_enable_sidebar_animation',
		'label'       => esc_html__( 'Enable or Disable Sidebar Animation', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_enable_footer_animation',
		'label'       => esc_html__( 'Enable or Disable Footer Animation', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => true,
		'priority'    => 10,
	] );


	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_scroll_alignment_heading',
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Position', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'radio-buttonset',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_scroll_alignment',
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => 'right',
		'choices'     => [
			'left' => esc_html__( 'left', 'tech-review-blog' ),
			'center' => esc_html__( 'center', 'tech-review-blog' ),
			'right' => esc_html__( 'right', 'tech-review-blog' ),
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_scroller_border_radius_heading',
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Scroll To Top Border Radius', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'slider',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_scroller_border_radius',
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => '50',
		'choices'     => [
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		],
		'output' => array(
			array(
				'element'  => '.scroll-up a',
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_cursor_outline_heading',
		'section'     => 'tech_review_blog_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Dot Cursor', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_cursor_outline',
		'label'       => esc_html__( 'Enable or Disable Dot Cursor', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_progress_bar_heading',
		'section'     => 'tech_review_blog_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_progress_bar',
		'label'       => esc_html__( 'Enable or Disable Progress Bar', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_progress_bar_position_heading',
		'section'     => 'tech_review_blog_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar Position', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
		'active_callback'  => [
			[
				'setting'  => 'tech_review_blog_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_progress_bar_position',
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => 'top',
		'choices'     => [
			'top' => esc_html__( 'Top', 'tech-review-blog' ),
			'bottom' => esc_html__( 'Bottom', 'tech-review-blog' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'tech_review_blog_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_progress_bar_color_heading',
		'section'     => 'tech_review_blog_additional_setting',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Progress Bar Color', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
		'active_callback'  => [
			[
				'setting'  => 'tech_review_blog_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_progress_bar_color',
		'tab'      => 'general',
		'label'       => __( 'Color', 'tech-review-blog' ),
		'type'        => 'color',
		'section'     => 'tech_review_blog_additional_setting',
		'transport' => 'auto',
		'default'     => '#432CF3',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '#elemento-progress-bar',
				'property' => 'background-color',
			),
		),
		'active_callback'  => [
			[
				'setting'  => 'tech_review_blog_progress_bar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_single_page_layout_heading',
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'tech_review_blog_single_page_layout',
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'tech-review-blog' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'tech-review-blog' ),
			'One Column' => esc_html__( 'One Column', 'tech-review-blog' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'tech_review_blog_header_background_attachment_heading',
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'header-image',
		'settings'    => 'tech_review_blog_header_background_attachment',
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'tech-review-blog' ),
			'fixed' => esc_html__( 'Fixed', 'tech-review-blog' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'tech_review_blog_header_image_height_heading',
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image height', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_header_image_height',
		'label'       => __( 'Image Height', 'tech-review-blog' ),
		'description'    => esc_html__( 'Enter a value in pixels. Example:500px', 'tech-review-blog' ),
		'type'        => 'text',
		'tab'      => 'header-image',
		'default'    => [
			'desktop' => '550px',
			'tablet'  => '350px',
			'mobile'  => '200px',
		],
		'responsive' => true,
		'section'     => 'tech_review_blog_additional_setting',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.header-image-box'),
				'property' => 'height',
				'media_query' => [
					'desktop' => '@media (min-width: 1024px)',
					'tablet'  => '@media (min-width: 768px) and (max-width: 1023px)',
					'mobile'  => '@media (max-width: 767px)',
				],
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'tech_review_blog_header_overlay_heading',
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_header_overlay_setting',
		'tab'      => 'header-image',
		'label'       => __( 'Overlay Color', 'tech-review-blog' ),
		'type'        => 'color',
		'section'     => 'tech_review_blog_additional_setting',
		'transport' => 'auto',
		'default'     => '#00000061',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.header-image-box:before',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'tech_review_blog_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'tech_review_blog_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'tech_review_blog_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'tech-review-blog' ),
		'description'    => esc_html__( 'Here you can add post information.', 'tech-review-blog' ),
		'panel'    => 'tech_review_blog_theme_options_panel',
		'tabs'  => [
			'blog-post' => [
				'label' => esc_html__( 'Blog Post', 'tech-review-blog' ),
			],
			'single-post'  => [
				'label' => esc_html__( 'Single Post', 'tech-review-blog' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'tech_review_blog_enable_post_animation_heading',
		'section'     => 'tech_review_blog_blog_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Animation', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'tech_review_blog_enable_post_animation',
		'label'       => esc_html__( 'Enable or Disable Blog Post Animation', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_blog_post',
		'default'     => true,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'tech_review_blog_post_layout_heading',
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'blog-post',
		'settings'    => 'tech_review_blog_post_layout',
		'section'     => 'tech_review_blog_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'tech-review-blog' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'tech-review-blog' ),
			'One Column' => esc_html__( 'One Column', 'tech-review-blog' ),
			'Three Columns' => esc_html__( 'Three Columns', 'tech-review-blog' ),
			'Four Columns' => esc_html__( 'Four Columns', 'tech-review-blog' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'tech_review_blog_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'tech_review_blog_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'tech_review_blog_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'tech_review_blog_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'tech_review_blog_length_setting_heading',
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'tab'      => 'blog-post',
		'settings'    => 'tech_review_blog_length_setting',
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'tech_review_blog_single_post_date_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Date', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'tech_review_blog_single_post_author_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Author', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'tech_review_blog_single_post_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Comment', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'tech-review-blog' ),
		'settings'    => 'tech_review_blog_single_post_tag',
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'tech-review-blog' ),
		'settings'    => 'tech_review_blog_single_post_category',
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'tech_review_blog_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'tech_review_blog_single_post_radius',
		'section'     => 'tech_review_blog_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'tech-review-blog' ),
		'type'        => 'text',
		'tab'      => 'single-post',
		'section'     => 'tech_review_blog_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'tech_review_blog_show_related_post_heading',
		'section'     => 'tech_review_blog_blog_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Related post', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'tech_review_blog_show_related_post',
		'label'       => esc_html__( 'Enable or Disable Related post', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_blog_post',
		'default'     => true,
		'priority'    => 10,
	] );

	// No Results Page Settings

	Kirki::add_section( 'tech_review_blog_no_result_section', array(
		'title'          => esc_html__( '404 & No Results Page Settings', 'tech-review-blog' ),
		'panel'    => 'tech_review_blog_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_page_not_found_title_heading',
		'section'     => 'tech_review_blog_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Title', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'tech_review_blog_page_not_found_title',
		'section'  => 'tech_review_blog_no_result_section',
		'default'  => esc_html__('404 Error!', 'tech-review-blog'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_page_not_found_text_heading',
		'section'     => 'tech_review_blog_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Text', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'tech_review_blog_page_not_found_text',
		'section'  => 'tech_review_blog_no_result_section',
		'default'  => esc_html__('The page you are looking for may have been moved, deleted, or possibly never existed.', 'tech-review-blog'),
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'custom',
		'settings' => 'tech_review_blog_page_not_found_line_break',
		'section'  => 'tech_review_blog_no_result_section',
		'default'  => '<hr>',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_no_results_title_heading',
		'section'     => 'tech_review_blog_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Title', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'tech_review_blog_no_results_title',
		'section'  => 'tech_review_blog_no_result_section',
		'default'  => esc_html__('Nothing Found', 'tech-review-blog'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_no_results_content_heading',
		'section'     => 'tech_review_blog_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Content', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'tech_review_blog_no_results_content',
		'section'  => 'tech_review_blog_no_result_section',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tech-review-blog'),
	] );
	
	// FOOTER SECTION

	Kirki::add_section( 'tech_review_blog_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'tech-review-blog' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'tech-review-blog' ),
        'panel'    => 'tech_review_blog_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_show_footer_widget_heading',
		'section'     => 'tech_review_blog_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'tech_review_blog_show_footer_widget',
		'label'       => esc_html__( 'Footer Widget', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'tech_review_blog_show_footer_copyright',
		'label'       => esc_html__( 'Footer Copyright', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_footer_section',
		'default'     => '1',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_footer_text_heading',
		'section'     => 'tech_review_blog_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'tech_review_blog_footer_text',
		'section'  => 'tech_review_blog_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_footer_sticky_heading',
		'section'     => 'tech_review_blog_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Sticky Copyright', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'tech_review_blog_sticky_copyright_enable',
		'label'       => esc_html__( ' Sticky Copyright Section Enable / Disable', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_footer_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'tech-review-blog' ),
			'off' => esc_html__( 'Disable', 'tech-review-blog' ),
		],
	] );


    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_footer_enable_heading',
		'section'     => 'tech_review_blog_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'tech_review_blog_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'tech-review-blog' ),
			'off' => esc_html__( 'Disable', 'tech-review-blog' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_footer_background_widget_heading',
		'section'     => 'tech_review_blog_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'tech_review_blog_footer_background_widget',
		'type'        => 'background',
		'section'     => 'tech_review_blog_footer_section',
		'default'     => [
			'background-color'      => 'rgba(23,20,20,1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_footer_widget_alignment_heading',
		'section'     => 'tech_review_blog_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Alignment', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'tech_review_blog_footer_widget_alignment',
		'section'     => 'tech_review_blog_footer_section',
		'default'     =>[
			'desktop' => 'left',
			'tablet'  => 'left',
			'mobile'  => 'center',
		],
		'responsive' => true,
		'label'       => __( 'Widget Alignment', 'tech-review-blog' ),
		'transport' => 'auto',
		'choices'     => [
			'center' => esc_html__( 'center', 'tech-review-blog' ),
			'right' => esc_html__( 'right', 'tech-review-blog' ),
			'left' => esc_html__( 'left', 'tech-review-blog' ),
		],
		'output' => array(
			array(
				'element'  => '.footer-area',
				'property' => 'text-align',
				'media_query' => [
					'desktop' => '@media (min-width: 1024px)',
					'tablet'  => '@media (min-width: 768px) and (max-width: 1023px)',
					'mobile'  => '@media (max-width: 767px)',
				],
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_footer_copright_color_heading',
		'section'     => 'tech_review_blog_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Background Color', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_footer_copright_color',
		'type'        => 'color',
		'label'       => __( 'Background Color', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_footer_section',
		'transport' => 'auto',
		'default'     => '#432CF3',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.footer-copyright',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_footer_copright_text_color_heading',
		'section'     => 'tech_review_blog_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Text Color', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_footer_copright_text_color',
		'type'        => 'color',
		'label'       => __( 'Text Color', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_footer_section',
		'transport' => 'auto',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '.footer-copyright a', '.footer-copyright p'),
				'property' => 'color',
			),
		),
	) );

	// Footer Social Icons Section

	Kirki::add_section( 'tech_review_blog_footer_social_media_section', array(
		'title'          => esc_html__( 'Footer Social Icons', 'tech-review-blog' ),
		'panel'    => 'tech_review_blog_theme_options_panel',
		'priority'       => 160,
	) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_footer_social_icon_hide_heading',
		'section'     => 'tech_review_blog_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable or Disable your Footer Social Icon', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'tech_review_blog_footer_social_icon_hide',
		'label'       => esc_html__( 'Enable or Disable Social Icon.', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_footer_social_media_section',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'tech_review_blog_enable_footer_socail_link_align_heading',
		'section'     => 'tech_review_blog_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Text Align', 'tech-review-blog' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'tech_review_blog_enable_footer_socail_link_align',
		'type'        => 'select',
		'priority'    => 10,
		'label'       => __( 'Text Align', 'tech-review-blog' ),
		'section'     => 'tech_review_blog_footer_social_media_section',
		'default'     => 'left',
		'choices'     => [
			'center' => esc_html__( 'center', 'tech-review-blog' ),
			'right' => esc_html__( 'right', 'tech-review-blog' ),
			'left' => esc_html__( 'left', 'tech-review-blog' ),
		],
		'output' => array(
			array(
				'element'  => array( '.footer-links'),
				'property' => 'text-align',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'priority'    => 10,
		'settings'    => 'tech_review_blog_enable_footer_socail_link',
		'section'     => 'tech_review_blog_footer_social_media_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Link', 'tech-review-blog' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'priority'    => 10,
		'section'     => 'tech_review_blog_footer_social_media_section',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icons', 'tech-review-blog' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'tech-review-blog' ),
		'settings'     => 'tech_review_blog_social_links_settings_footer',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'tech-review-blog' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'tech-review-blog' ). ' <a href="https://fontawesome.com/v6/search?ic=brands" target="_blank"><strong>' . esc_html__( 'View All', 'tech-review-blog' ) . ' </strong></a>',
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'tech-review-blog' ),
				'description' => esc_html__( 'Add the social icon url here.', 'tech-review-blog' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );

	load_template( trailingslashit( get_template_directory() ) . '/includes/logo/logo-resizer.php' );
}
