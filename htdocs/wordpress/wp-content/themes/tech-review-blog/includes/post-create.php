<?php

class Whizzie {

	public function __construct() {
		$this->init();
	}

	public function init()
	{
	
	}

	public static function tech_review_blog_setup_widgets(){

	set_theme_mod( 'tech_review_blog_header_button_text', 'Subscribe' );
	set_theme_mod( 'tech_review_blog_header_button_url', '#' );
	set_theme_mod('tech_review_blog_social_links_settings', array(
		array(
			"link_text" => "fab fa-instagram",
			"link_url" => "www.instagram.com"
		),
		array(
			"link_text" => "fab fa-twitter",
			"link_url" => "www.twitter.com"
		),
		array(
			"link_text" => "fab fa-youtube",
			"link_url" => "www.youtube.com"
		),
		array(
			"link_text" => "fab fa-linkedin-in",
			"link_url" => "www.linkedin.com"
		)
	));

	// Define categories and their corresponding post titles
	$tech_review_blog_categories = array(
		"Gadgets" => ["Rocket Lab mission fails shortly after launch", "Air Pods Pro with Wireless Charging Case", "Virtual Reality or Artificial Intelligence Technology"],
		"Tech News" => ["Security is not just a technology problem its about design too", "A lifestyle you always being the focal point is innately unhealthy"],
		"Technical News" => ["A lifestyle you always being the focal point is innately"],
		"Tutorial" => ["How Good Deeds Can Benefit Your Local Business"],
		"AI" => ["The future of AI what to expect in the next decade"],
		"Coding" => ["Material code Library 1000+ Free AI codes"],
		"Blackchain" => ["Free Printable block chain for the sign"],
	    "Game Tech" => ["Top 10 Best Computer games in Markting"],
		"Review" => ["5 Common Objections to SEO"]
	);
	
	foreach ($tech_review_blog_categories as $tech_review_blog_category_name => $tech_review_blog_post_titles) {
		// Create category if it does not exist
		$tech_review_blog_category_id = get_term_by('name', $tech_review_blog_category_name, 'category');
		if (!$tech_review_blog_category_id) {
			$tech_review_blog_category_id = wp_insert_term($tech_review_blog_category_name, 'category');
			$tech_review_blog_category_id = $tech_review_blog_category_id['term_id'];
		} else {
			$tech_review_blog_category_id = $tech_review_blog_category_id->term_id;
		}
	
		// Loop through post titles
		for ($tech_review_blog_i = 0; $tech_review_blog_i < count($tech_review_blog_post_titles); $tech_review_blog_i++) {
			$tech_review_blog_post_title = $tech_review_blog_post_titles[$tech_review_blog_i];
			$tech_review_blog_post_content = 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.';
			
			// Create post
			$tech_review_blog_post_id = wp_insert_post(array(
				'post_title'   => wp_strip_all_tags($tech_review_blog_post_title),
				'post_content' => $tech_review_blog_post_content,
				'post_status'  => 'publish',
				'post_type'    => 'post',
				'post_category' => [$tech_review_blog_category_id]
			));
			
			// Assign image to post
			$tech_review_blog_image_url = get_template_directory_uri() . '/assets/images/post/' . strtolower(str_replace(' ', '_', $tech_review_blog_post_title)) . '.png';
			$tech_review_blog_image_data = wp_remote_get($tech_review_blog_image_url);
			if (!is_wp_error($tech_review_blog_image_data)) {
				$tech_review_blog_image_body = wp_remote_retrieve_body($tech_review_blog_image_data);
				$tech_review_blog_upload_dir = wp_upload_dir();
				$tech_review_blog_image_name = strtolower(str_replace(' ', '_', $tech_review_blog_post_title)) . '.png';
				$tech_review_blog_uploaded_file = wp_upload_bits($tech_review_blog_image_name, null, $tech_review_blog_image_body);
				
				if (!$tech_review_blog_uploaded_file['error']) {
					$tech_review_blog_attachment = array(
						'post_mime_type' => $tech_review_blog_uploaded_file['type'],
						'post_title'     => sanitize_file_name($tech_review_blog_image_name),
						'post_content'   => '',
						'post_status'    => 'inherit',
					);
					$tech_review_blog_attach_id = wp_insert_attachment($tech_review_blog_attachment, $tech_review_blog_uploaded_file['file'], $tech_review_blog_post_id);
					require_once(ABSPATH . 'wp-admin/includes/image.php');
					$tech_review_blog_attach_data = wp_generate_attachment_metadata($tech_review_blog_attach_id, $tech_review_blog_uploaded_file['file']);
					wp_update_attachment_metadata($tech_review_blog_attach_id, $tech_review_blog_attach_data);
					set_post_thumbnail($tech_review_blog_post_id, $tech_review_blog_attach_id);
				}
			}
		}
	}

}

}
 