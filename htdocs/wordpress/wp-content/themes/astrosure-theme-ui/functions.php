<?php
function astrosure_scripts() {
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'astrosure_scripts');
?>