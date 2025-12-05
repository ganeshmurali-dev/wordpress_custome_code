<?php
if ( ! class_exists( 'News_Report_categories_Posts_Widget' ) ) {
	/**
	 * Adds News_Report_categories_Posts_Widget Widget.
	 */
	class News_Report_categories_Posts_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$categories_posts_widget = array(
				'classname'   => 'widget adore-widget categories-posts-widget',
				'description' => __( 'Retrive Categories Posts Widgets', 'news-report' ),
			);
			parent::__construct(
				'news_report_categories_posts_widget',
				__( 'Adore Widget: Categories Posts Widget', 'news-report' ),
				$categories_posts_widget
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$categories_posts_offset = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';

			echo $args['before_widget'];
			?>

			<div class="adore-widget-body">
				<div class="adore-category-post-wrapper">
					<?php
					for ( $i = 1; $i <= 3; $i++ ) {
						$categories_posts_category = isset( $instance[ 'category_' . $i ] ) ? absint( $instance[ 'category_' . $i ] ) : '';
						$categories                = get_category( $categories_posts_category );
						?>
						<div class="adore-category-single">
							<?php if ( ! empty( $categories->name ) ) { ?>
								<div class="widget-header">
									<h3 class="widget-title">
										<?php echo esc_html( $categories->name ); ?>
										<a href="<?php echo esc_url( get_term_link( $categories->term_id ) ); ?>">
											<span class="link-icon"><i class="fas fa-link"></i></span>
										</a>
									</h3>
								</div>
							<?php } ?>
							<?php
							$categories_posts_widgets_args = array(
								'post_type'      => 'post',
								'posts_per_page' => absint( 3 ),
								'offset'         => absint( $categories_posts_offset ),
								'cat'            => absint( $categories_posts_category ),
							);

							$query = new WP_Query( $categories_posts_widgets_args );
							$j = 1;
							if ( $query->have_posts() ) :
								while ( $query->have_posts() ) :
									$query->the_post();
									?>
									<div class="post-item <?php echo esc_attr( $j === 1 ? 'post-grid' : 'post-list' ); ?>">
										<?php if ( $j === 1 ) { ?>
											<div class="post-item-image">
												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail(); ?>							
												</a>
											</div>
										<?php } ?>    
										<div class="post-item-content">
											<div class="entry-cat no-bg">
												<?php the_category( '', '', get_the_ID() ); ?>
											</div>
											<h3 class="entry-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
											<ul class="entry-meta">
												<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="far fa-user"></span><?php echo esc_html( get_the_author() ); ?></a></li>
												<li class="post-date"> <span class="far fa-calendar-alt"></span><?php echo esc_html( get_the_date() ); ?></li>
												<li class="post-comment"> <span class="far fa-comment"></span><?php echo absint( get_comments_number( get_the_ID() ) ); ?></li>
											</ul>
										</div>
									</div>
									<?php
									$j++;
								endwhile;
								wp_reset_postdata();
							endif;
							?>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$categories_posts_offset = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			for ( $i = 1; $i <= 3; $i++ ) {
				$categories_posts_category = isset( $instance[ 'category_' . $i ] ) ? absint( $instance[ 'category_' . $i ] ) : '';
				?>
				<p>
					<label for="<?php echo esc_attr( $this->get_field_id( 'category_' . $i ) ); ?>"><?php echo sprintf( esc_html( 'Select the category %d to show posts', 'news-report' ), $i ); ?></label>
					<select id="<?php echo esc_attr( $this->get_field_id( 'category_' . $i ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category_' . $i ) ); ?>" class="widefat" style="width:100%;">
						<?php
						$categories = news_report_get_post_cat_choices();
						foreach ( $categories as $category => $value ) {
							?>
							<option value="<?php echo absint( $category ); ?>" <?php selected( $categories_posts_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
							<?php
						}
						?>
					</select>
				</p>
				<?php
			}
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over', 'news-report' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $categories_posts_offset ); ?>" />
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance           = $old_instance;
			$instance['title']  = sanitize_text_field( $new_instance['title'] );
			$instance['offset'] = (int) $new_instance['offset'];
			for ( $i = 1; $i <= 3; $i++ ) {
				$instance[ 'category_' . $i ] = (int) $new_instance[ 'category_' . $i ];
			}
			return $instance;
		}
	}
}