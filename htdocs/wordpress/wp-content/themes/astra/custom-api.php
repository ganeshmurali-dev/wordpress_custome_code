<?php

add_action('rest_api_init', function () {

    register_rest_route('custom/v1', '/blogs', [
        'methods' => 'GET',
        'callback' => 'get_blog_list',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('custom/v1', '/blog/(?P<slug>[a-zA-Z0-9-_]+)', [
        'methods' => 'GET',
        'callback' => 'get_blog_detail',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('custom/v1', '/search', [
        'methods' => 'GET',
        'callback' => 'search_blog',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('custom/v1', '/filter/tag/(?P<tag>[a-zA-Z0-9-_]+)', [
        'methods' => 'GET',
        'callback' => 'filter_by_tag',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('custom/v1', '/filter/author/(?P<author>[a-zA-Z0-9-_]+)', [
        'methods' => 'GET',
        'callback' => 'filter_by_author',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('custom/v1', '/like', [
        'methods' => 'POST',
        'callback' => 'like_post',
        'permission_callback' => '__return_true'
    ]);

    register_rest_route('custom/v1', '/save', [
        'methods' => 'POST',
        'callback' => 'save_post',
        'permission_callback' => '__return_true'
    ]);

});



function get_blog_list(WP_REST_Request $request) {

    $page = $request->get_param('page') ?: 1;
    $limit = $request->get_param('limit') ?: 10;

    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $page,
        'posts_per_page' => $limit
    ];

    $query = new WP_Query($args);

    $blogs = [];

    foreach ($query->posts as $post) {
        $blogs[] = [
            'post_id' => $post->ID,
            'title' => get_the_title($post),
            'author' => get_the_author_meta('display_name', $post->post_author),
            'image_url' => get_the_post_thumbnail_url($post->ID, 'full'),
            'description' => get_post_meta($post->ID, 'description', true),
            'tags' => wp_list_pluck(get_the_terms($post->ID, 'post_tag'), 'name'),
            'slug' => $post->post_name,
            'time_to_read' => get_post_meta($post->ID, 'time_to_read', true),
            'todays_read' => (bool) get_post_meta($post->ID, 'todays_read', true),
            'updated_at' => get_the_modified_date('Y-m-d', $post->ID),
            'likes_count' => (int) get_post_meta($post->ID, 'likes_count', true),
            'saves_count' => (int) get_post_meta($post->ID, 'saves_count', true),
        ];
    }

    return [
        'current_page' => $page,
        'total_pages' => $query->max_num_pages,
        'data' => $blogs
    ];
}



function get_blog_detail(WP_REST_Request $request) {

    $slug = $request['slug'];
    $post = get_page_by_path($slug, OBJECT, 'post');

    if (!$post) return ['error' => 'Post not found'];

    return [
        'post_id' => $post->ID,
        'title' => $post->post_title,
        'author' => get_the_author_meta('display_name', $post->post_author),
        'description' => get_post_meta($post->ID, 'description', true),
        'tags' => wp_list_pluck(get_the_terms($post->ID, 'post_tag'), 'name'),
        'video_url' => get_post_meta($post->ID, 'video_url', true),
        'podcast_url' => get_post_meta($post->ID, 'podcast_url', true),
        'meta_html' => get_post_meta($post->ID, 'meta_html', true),
        'md_data' => apply_filters('the_content', $post->post_content),
        'updated_at' => get_the_modified_date('Y-m-d', $post->ID),
        'image_url' => get_the_post_thumbnail_url($post->ID, 'full'),
        'likes_count' => get_post_meta($post->ID, 'likes_count', true),
        'saves_count' => get_post_meta($post->ID, 'saves_count', true),
    ];
}


function search_blog(WP_REST_Request $request) {

    $q = $request->get_param('q');

    $args = [
        'post_type' => 'post',
        's' => $q,
    ];

    $query = new WP_Query($args);

    return wp_list_pluck($query->posts, 'post_title', 'ID');
}



function filter_by_tag(WP_REST_Request $request) {
    return get_posts([
        'post_type' => 'post',
        'tag' => $request['tag']
    ]);
}



function filter_by_author(WP_REST_Request $request) {
    return get_posts([
        'post_type' => 'post',
        'author_name' => $request['author']
    ]);
}



function like_post(WP_REST_Request $r) {
    $id = $r['post_id'];
    $count = (int) get_post_meta($id, 'likes_count', true) + 1;
    update_post_meta($id, 'likes_count', $count);
    return ['likes_count' => $count];
}



function save_post(WP_REST_Request $r) {
    $id = $r['post_id'];
    $count = (int) get_post_meta($id, 'saves_count', true) + 1;
    update_post_meta($id, 'saves_count', $count);
    return ['saves_count' => $count];
}
