<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Tech_Review_Blog_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/includes/go-pro/upgrade-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Tech_Review_Blog_Customize_Section_Pro' );

		$manager->add_section(
			new Tech_Review_Blog_Customize_Section_Pro(
				$manager,
				'tech_review_blog_upgrade_pro',
				array(
					'title'       => esc_html__( 'Tech Review Blog Pro', 'tech-review-blog' ),
					'pro_text'    => esc_html__( 'GO PRO', 'tech-review-blog' ),
					'pro_url'     => 'https://www.wpelemento.com/products/tech-blog-wordpress-theme',
					'priority'    => 5,
				)
			)
		);
		
		$manager->add_section(
			new Tech_Review_Blog_Customize_Section_Pro(
				$manager,
				'tech-review-blog-documentation',
				array(
					'title'       => esc_html__( 'Documentation', 'tech-review-blog' ),
					'pro_text'    => esc_html__( 'DOCS', 'tech-review-blog' ),
					'pro_url'     => 'https://preview.wpelemento.com/theme-documentation/tech-review-blog/',
					'priority'    => 5,
				)
			)
		);

		$manager->add_section(
			new Tech_Review_Blog_Customize_Section_Pro(
				$manager,
				'tech-review-blog-demo',
				array(
					'title'       => esc_html__( 'Pro Demo link', 'tech-review-blog' ),
					'pro_text'    => esc_html__( 'Demo', 'tech-review-blog' ),
					'pro_url'     => 'https://preview.wpelemento.com/tech-review-blog/',
					'priority'    => 5,
				)
			)
		);

	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'tech-review-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'tech-review-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Tech_Review_Blog_Customize::get_instance();