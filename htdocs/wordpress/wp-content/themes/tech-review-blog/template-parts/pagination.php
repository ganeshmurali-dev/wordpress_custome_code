<?php
	the_posts_pagination( array(
		'prev_text' => esc_html__( 'Previous page', 'tech-review-blog' ),
		'next_text' => esc_html__( 'Next page', 'tech-review-blog' ),
	) );