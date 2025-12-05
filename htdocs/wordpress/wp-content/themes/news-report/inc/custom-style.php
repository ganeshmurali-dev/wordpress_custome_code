<?php
/**
 * Custom Style
 */
function news_report_header_text_style() {

	$site_title_font       = get_theme_mod( 'news_report_site_title_font', '' );
	$site_description_font = get_theme_mod( 'news_report_site_description_font', '' );
	$header_font           = get_theme_mod( 'news_report_header_font', '' );
	$body_font             = get_theme_mod( 'news_report_body_font', '' );

	?>
	<style type="text/css">

		/* Site title */
		.site-title a{
			color: #<?php echo esc_attr( get_header_textcolor() ); ?>;
		}
		/* End Site title */

		/*Typography CSS*/

		<?php if ( ! empty( $site_title_font ) ) : ?>

			:root {
				--font-site-title: <?php echo esc_attr( str_replace( '+', ' ', $site_title_font ) ); ?>, serif;
			}

		<?php endif; ?>

		<?php if ( ! empty( $site_description_font ) ) : ?>

			:root {
				--font-tagline: <?php echo esc_attr( str_replace( '+', ' ', $site_description_font ) ); ?>, serif;
			}

		<?php endif; ?>

		<?php if ( ! empty( $header_font ) ) : ?>

			:root {
				--font-head: <?php echo esc_attr( str_replace( '+', ' ', $header_font ) ); ?>, serif;
			}

		<?php endif; ?>

		<?php if ( ! empty( $body_font ) ) : ?>

			:root {
				--font-body: <?php echo esc_attr( str_replace( '+', ' ', $body_font ) ); ?>, serif;
			}

		<?php endif; ?>

	/*End Typography CSS*/

</style>

	<?php
}
add_action( 'wp_head', 'news_report_header_text_style' );
