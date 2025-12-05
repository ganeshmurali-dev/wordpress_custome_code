<?php

  $tech_review_blog_theme_custom_setting_css = '';

    // Global Color
    $tech_review_blog_first_theme_color = get_theme_mod('tech_review_blog_first_theme_color', '#432CF3');
    $tech_review_blog_second_theme_color = get_theme_mod('tech_review_blog_second_theme_color', '#1C222A');

    $tech_review_blog_theme_custom_setting_css .=':root {';
        $tech_review_blog_theme_custom_setting_css .='--primary-theme-color: '.esc_attr($tech_review_blog_first_theme_color ).'!important;';
        $tech_review_blog_theme_custom_setting_css .='--secondary-theme-color: '.esc_attr($tech_review_blog_second_theme_color ).'!important;';
    $tech_review_blog_theme_custom_setting_css .='}';

	// Scroll to top alignment
	$tech_review_blog_scroll_alignment = get_theme_mod('tech_review_blog_scroll_alignment', 'right');

    if($tech_review_blog_scroll_alignment == 'right'){
        $tech_review_blog_theme_custom_setting_css .='.scroll-up{';
            $tech_review_blog_theme_custom_setting_css .='right: 30px;!important;';
			$tech_review_blog_theme_custom_setting_css .='left: auto;!important;';
        $tech_review_blog_theme_custom_setting_css .='}';
    }else if($tech_review_blog_scroll_alignment == 'center'){
        $tech_review_blog_theme_custom_setting_css .='.scroll-up{';
            $tech_review_blog_theme_custom_setting_css .='left: calc(50% - 10px) !important;';
        $tech_review_blog_theme_custom_setting_css .='}';
    }else if($tech_review_blog_scroll_alignment == 'left'){
        $tech_review_blog_theme_custom_setting_css .='.scroll-up{';
            $tech_review_blog_theme_custom_setting_css .='left: 30px;!important;';
			$tech_review_blog_theme_custom_setting_css .='right: auto;!important;';
        $tech_review_blog_theme_custom_setting_css .='}';
    }


    // Woocommerce Sale Position
    $tech_review_blog_sale_badge_position = get_theme_mod( 'tech_review_blog_sale_badge_position','right');
    if($tech_review_blog_sale_badge_position == 'left'){
        $tech_review_blog_theme_custom_setting_css .='.woocommerce ul.products li.product .onsale{';
            $tech_review_blog_theme_custom_setting_css .='left: 10px; right: auto;';
        $tech_review_blog_theme_custom_setting_css .='}';
    }else if($tech_review_blog_sale_badge_position == 'right'){
        $tech_review_blog_theme_custom_setting_css .='.woocommerce ul.products li.product .onsale{';
            $tech_review_blog_theme_custom_setting_css .='left: auto; right: 10px;';
        $tech_review_blog_theme_custom_setting_css .='}';
    }