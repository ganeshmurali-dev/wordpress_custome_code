<?php
//about theme info
add_action( 'admin_menu', 'tech_review_blog_gettingstarted' );
function tech_review_blog_gettingstarted() {
	add_theme_page( esc_html__('Tech Review Blog', 'tech-review-blog'), esc_html__('Tech Review Blog', 'tech-review-blog'), 'edit_theme_options', 'tech_review_blog_about', 'tech_review_blog_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function tech_review_blog_admin_theme_style() {
	wp_enqueue_style('tech-review-blog-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('tech-review-blog-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'tech_review_blog_admin_theme_style');

// Changelog
if ( ! defined( 'TECH_REVIEW_BLOG_CHANGELOG_URL' ) ) {
    define( 'TECH_REVIEW_BLOG_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function tech_review_blog_changelog_screen() {	
	global $wp_filesystem;
	$tech_review_blog_changelog_file = apply_filters( 'tech_review_blog_changelog_file', TECH_REVIEW_BLOG_CHANGELOG_URL );
	if ( $tech_review_blog_changelog_file && is_readable( $tech_review_blog_changelog_file ) ) {
		WP_Filesystem();
		$tech_review_blog_changelog = $wp_filesystem->get_contents( $tech_review_blog_changelog_file );
		$tech_review_blog_changelog_list = tech_review_blog_parse_changelog( $tech_review_blog_changelog );
		echo wp_kses_post( $tech_review_blog_changelog_list );
	}
}

function tech_review_blog_parse_changelog( $tech_review_blog_content ) {
	$tech_review_blog_content = explode ( '== ', $tech_review_blog_content );
	$tech_review_blog_changelog_isolated = '';
	foreach ( $tech_review_blog_content as $key => $tech_review_blog_value ) {
		if (strpos( $tech_review_blog_value, 'Changelog ==') === 0) {
	    	$tech_review_blog_changelog_isolated = str_replace( 'Changelog ==', '', $tech_review_blog_value );
	    }
	}
	$tech_review_blog_changelog_array = explode( '= ', $tech_review_blog_changelog_isolated );
	unset( $tech_review_blog_changelog_array[0] );
	$tech_review_blog_changelog = '<div class="changelog">';
	foreach ( $tech_review_blog_changelog_array as $tech_review_blog_value) {
		$tech_review_blog_value = preg_replace( '/\n+/', '</span><span>', $tech_review_blog_value );
		$tech_review_blog_value = '<div class="block"><span class="heading">= ' . $tech_review_blog_value . '</span></div><hr>';
		$tech_review_blog_changelog .= str_replace( '<span></span>', '', $tech_review_blog_value );
	}
	$tech_review_blog_changelog .= '</div>';
	return wp_kses_post( $tech_review_blog_changelog );
}

//guidline for about theme
function tech_review_blog_mostrar_guide() { 
	//custom function about theme customizer
	$tech_review_blog_return = add_query_arg( array()) ;
	$tech_review_blog_theme = wp_get_theme( 'tech-review-blog' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Tech Review Blog', 'tech-review-blog' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'tech-review-blog' ); ?>: <?php echo esc_html($tech_review_blog_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">
	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="tech_review_blog_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'tech-review-blog' ); ?></button>
				<button class="tablinks" onclick="tech_review_blog_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'tech-review-blog' ); ?></button>
				<button class="tablinks" onclick="tech_review_blog_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'tech-review-blog' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$tech_review_blog_plugin_ins = Tech_Review_Blog_Plugin_Activation_WPElemento_Importer::get_instance();
					$tech_review_blog_actions = $tech_review_blog_plugin_ins->tech_review_blog_recommended_actions;
					?>
					<div class="tech-review-blog-recommended-plugins ">
						<div class="tech-review-blog-action-list">
							<?php if ($tech_review_blog_actions): foreach ($tech_review_blog_actions as $tech_review_blog_key => $tech_review_blog_actionValue): ?>
									<div class="tech-review-blog-action" id="<?php echo esc_attr($tech_review_blog_actionValue['id']);?>">
										<div class="action-inner plugin-activation-redirect">
											<h3 class="action-title"><?php echo esc_html($tech_review_blog_actionValue['title']); ?></h3>
											<div class="action-desc"><?php echo esc_html($tech_review_blog_actionValue['desc']); ?></div>
											<?php echo wp_kses_post($tech_review_blog_actionValue['link']); ?>
										</div>
									</div>
								<?php endforeach;
							endif; ?>
						</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'tech-review-blog'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'tech-review-blog'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'tech-review-blog'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'tech-review-blog'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'tech-review-blog'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'tech-review-blog'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'tech-review-blog'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'tech-review-blog'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( TECH_REVIEW_BLOG_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'tech-review-blog'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'tech-review-blog'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'tech-review-blog'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( TECH_REVIEW_BLOG_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'tech-review-blog'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'tech-review-blog'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'tech-review-blog'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( TECH_REVIEW_BLOG_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'tech-review-blog'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'tech-review-blog' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','tech-review-blog'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','tech-review-blog'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','tech-review-blog'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','tech-review-blog'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php tech_review_blog_changelog_screen(); ?>
				</div>
			</div>			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'tech-review-blog'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Tech Review Blog WordPress Theme', 'tech-review-blog'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( TECH_REVIEW_BLOG_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'tech-review-blog'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( TECH_REVIEW_BLOG_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'tech-review-blog'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( TECH_REVIEW_BLOG_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'tech-review-blog'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'tech-review-blog'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'tech-review-blog' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'tech-review-blog' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'tech-review-blog' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'tech-review-blog' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'tech-review-blog' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'tech-review-blog' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'tech-review-blog'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( TECH_REVIEW_BLOG_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'tech-review-blog'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'tech-review-blog' ); ?></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>