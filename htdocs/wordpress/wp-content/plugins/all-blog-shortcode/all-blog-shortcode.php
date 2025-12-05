<?php
/*
Plugin Name: All Blog Shortcode
Description: Displays all blog posts including image, title, tags, author, date, and read time.
Version: 1.0
Author: Ganesh
*/

// --- Shortcode Function ---
function abs_display_all_blogs() {

    // WP Query to fetch all posts
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => -1, // all posts
        'order'          => 'DESC',
        'orderby'        => 'date'
    );

    $posts = new WP_Query($args);

    if (!$posts->have_posts()) {
        return "<p>No blog posts found.</p>";
    }

    $output = '<div class="abs-all-blogs">';

    while ($posts->have_posts()) {
        $posts->the_post();

        $post_id = get_the_ID();

        // Featured Image
        $image = get_the_post_thumbnail($post_id, 'large', ['class' => 'abs-blog-image']);

        // Title
        $title = get_the_title();

        // Author
        $author = get_the_author();

        // Date
        $date = get_the_date('F j, Y');

        // Read Time (optional custom field meta key: "read_time")
        $read_time = get_post_meta($post_id, 'read_time', true);
        if (!$read_time) {
            $read_time = "3 min read"; // fallback
        }

        // Tags
        $tags = get_the_tag_list('<div class="abs-blog-tags"><span>', '</span><span>', '</span></div>');
        
        // Full content
        $content = apply_filters('the_content', get_the_content());

        // Build HTML for each post
        $output .= '
        <div class="abs-blog-item">
            <div class="abs-blog-header">
                '.$image.'
                <h2 class="abs-blog-title">'. esc_html($title) .'</h2>
            </div>
            <div class="abs-blog-meta">
                <span class="abs-blog-author">By '. esc_html($author) .'</span> |
                <span class="abs-blog-date">'. esc_html($date) .'</span> |
                <span class="abs-blog-readtime">'. esc_html($read_time) .'</span>
            </div>
            '.$tags.'
            <div class="abs-blog-content">
                '.$content.'
            </div>
        </div>';
    }

    $output .= '</div>';

    wp_reset_postdata();
    return $output;
}

// --- Register Shortcode ---
add_shortcode('all_blogs', 'abs_display_all_blogs');

// --- Add Basic Styling ---
function abs_shortcode_styles() {
    echo "
    <style>
        .abs-all-blogs { width: 100%; display: flex; flex-direction: column; gap: 40px; }
        .abs-blog-item { padding: 20px; border: 1px solid #ddd; border-radius: 10px; background: #fff; }
        .abs-blog-image { width: 100%; height: auto; border-radius: 10px; margin-bottom: 15px; }
        .abs-blog-title { font-size: 28px; margin-bottom: 10px; }
        .abs-blog-meta { color: #666; font-size: 14px; margin-bottom: 10px; }
        .abs-blog-tags span { display: inline-block; background: #eef2ff; padding: 6px 10px; margin-right: 5px; border-radius: 5px; font-size: 12px; }
        .abs-blog-content { margin-top: 20px; font-size: 16px; line-height: 1.7; }
    </style>
    ";
}
add_action('wp_head', 'abs_shortcode_styles');
