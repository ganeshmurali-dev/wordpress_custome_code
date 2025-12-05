<?php

// Featured Posts Widget.
require get_template_directory() . '/inc/widgets/featured-posts-widget.php';

// Express List Widget.
require get_template_directory() . '/inc/widgets/express-list-widget.php';

// Most Read Widget.
require get_template_directory() . '/inc/widgets/most-read-widget.php';

// Latest Posts Widget.
require get_template_directory() . '/inc/widgets/latest-posts-widget.php';

// Categories Posts Widget.
require get_template_directory() . '/inc/widgets/categories-posts-widget.php';

// Social Widget.
require get_template_directory() . '/inc/widgets/social-widget.php';

/**
 * Register Widgets
 */
function news_report_register_widgets() {

	register_widget( 'News_Report_Featured_Posts_Widget' );

	register_widget( 'News_Report_Express_List_Widget' );

	register_widget( 'News_Report_Most_Read_Widget' );

	register_widget( 'News_Report_Latest_Posts_Widget' );

	register_widget( 'News_Report_categories_Posts_Widget' );

	register_widget( 'News_Report_Social_Widget' );
}
add_action( 'widgets_init', 'news_report_register_widgets' );
