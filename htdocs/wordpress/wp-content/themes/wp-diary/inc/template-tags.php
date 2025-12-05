<?php
/**
 * Custom template tags for WP Diary theme
 *
 * @package Mystery Themes
 * @subpackage WP Diary
 * @since 1.0.0
 */

/*----------------------------------------------------------------------------------------------------------------------------------------*/
function wp_diary_posted_on() {
    $show_date = (bool) get_theme_mod( 'wp_diary_post_meta_date', true ); // fallback true

    if ( ! $show_date ) {
        return;
    }

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>
                        <time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_html( get_the_date() ),
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_html( get_the_modified_date() )
    );

    echo '<span class="posted-on"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>';
}


/*----------------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'wp_diary_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     * Only shows if the "Show Author" toggle is enabled in Customizer.
     */
    function wp_diary_posted_by() {
        $show_author = get_theme_mod( 'wp_diary_post_meta_author', false );

        if ( ! $show_author ) {
            return;
        }

        $byline = sprintf(
            '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            esc_html( get_the_author() )
        );

        echo '<span class="byline">' . $byline . '</span>';
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'wp_diary_posted_comments' ) ) :
    /**
     * Show comment count and leave comment link if no comments are posted.
     * Only displays if the "Show Comments" toggle is enabled in Customizer.
     */
    function wp_diary_posted_comments() {
        $show_comments = get_theme_mod( 'wp_diary_post_meta_comments', false );

        if ( ! $show_comments ) {
            return;
        }

        if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wp-diary' ),
                        array( 'span' => array( 'class' => array() ) )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'wp_diary_entry_footer' ) ) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function wp_diary_entry_footer() {
        if ( 'post' !== get_post_type() ) {
            return;
        }

        // Tags
        $show_tags = get_theme_mod( 'wp_diary_post_meta_tags', false );
        if ( $show_tags ) {
            $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'wp-diary' ) );
            if ( $tags_list ) {
                printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'wp-diary' ) . '</span>', $tags_list );
            }
        }

        // Read more button
        if ( ! is_single() ) {
            $wp_diary_archive_read_more = get_theme_mod( 'wp_diary_archive_read_more', __( 'Discover', 'wp-diary' ) );
            echo '<a href="' . get_permalink() . '" class="mt-readmore-btn">' . esc_html( $wp_diary_archive_read_more ) . '</a>';
        }

        // Edit post link
        edit_post_link(
            sprintf(
                wp_kses(
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'wp-diary' ),
                    array( 'span' => array( 'class' => array() ) )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'wp_diary_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     */
    function wp_diary_post_thumbnail() {
        global $wp_query;
        $current_post = $wp_query->current_post;

        $thumbnail_size  = 'post-thumbnail';
        $archive_style   = get_theme_mod( 'wp_diary_archive_style', 'mt-archive--masonry-style' );
        $sidebar_layout  = wp_diary_is_sidebar_layout();

        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( 'mt-archive--masonry-style' === $archive_style ) {
            $thumbnail_size = 'wp-diary-post-auto';
        } elseif ( 'mt-archive--classic-style' === $archive_style && ( 'no-sidebar' === $sidebar_layout || 'no-sidebar-center' === $sidebar_layout ) ) {
            $thumbnail_size = 'wp-diary-full-width';
        } elseif ( 'mt-archive--block-grid-style' === $archive_style ) {
            if ( 0 === $current_post % 5 ) {
                $thumbnail_size = 'wp-diary-full-width';
            } else {
                $thumbnail_size = 'wp-diary-post';
            }
        }

        if ( is_singular() ) {
            echo '<div class="post-thumbnail">';
            the_post_thumbnail( 'wp-diary-full-width' );
            echo '</div>';
        } else {
            echo '<a class="post-thumbnail" href="' . get_permalink() . '" aria-hidden="true" tabindex="-1">';
            the_post_thumbnail( $thumbnail_size, array(
                'alt' => the_title_attribute( array( 'echo' => false ) ),
            ) );
            echo '</a>';
        }
    }
endif;

/*----------------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'wp_diary_article_categories_list' ) ) :
    /**
     * Display the list of categories at only articles
     * Only shows if the "Show Categories" toggle is enabled in Customizer.
     */
    function wp_diary_article_categories_list() {
        // Check if "Show Categories" is enabled
        $show_categories = (bool) get_theme_mod( 'wp_diary_post_meta_categories', true ); // default true
        if ( ! $show_categories ) {
            return;
        }

        if ( 'post' === get_post_type() ) {
            $categories_list = get_the_category_list( '<span class="cat-seperator"> </span>' );
            if ( $categories_list ) {
                printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'wp-diary' ) . '</span>', $categories_list );
            }
        }
    }
endif;

