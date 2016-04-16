<?php
/*
Plugin Name: VS Plugin
Plugin URI: http://varunshrivastava.in
Description: Built for VS with Love
Version: 1.0
Author: Varun Shrivastava
Author URI: http://varunshrivastava.in
License: none
Text Domain: Varun Shrivastava
*/
require_once 'widgets/VSGoogleSearchWidget.php';
function register_google_search_widget() {
    register_widget('VSGoogleSearchWidget');
}
add_action('widgets_init', 'register_google_search_widget');

require_once 'widgets/RelatedPostsWidget.php';
function register_related_posts_widget () {
    register_widget('RelatedPostsWidget');
}
add_action ('widgets_init', 'register_related_posts_widget');

# Sidebar to hold Google Search
function register_google_search_bar(){
    $args = [
        'name'          => __( 'Google Sidebar', 'google_sidebar' ),
        'id'            => 'google_search_sidebar',
        'description'   => 'This Bar Must Only Contain Google Search',
        'before_widget' => '<div class="google-sidebar">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="google-sidebar-title">',
        'after_title'   => '</div>'
    ];
    register_sidebar($args);
}
add_action('widgets_init', 'register_google_search_bar');

# Single Page Sidebar (single-sidebar)
function register_single_page_sidebar () {
    $args = [
        'name' => __( 'Single Page Sidebar ', 'single_sidebar'),
        'id' => 'single_sidebar',
        'before_widget' => '<div class="widget related-posts">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widgettitle">',
        'after_title'   => '</div>'
    ];
    register_sidebar($args);
}
add_action('widgets_init', 'register_single_page_sidebar');

# Returns the Related blogPosts
function getRelatedPostsByCategory ($postCount = 5) {
    global $post;
    $catID = $post->post_category[0];

    $args = [
        'category' => $catID,
        'posts_per_page' => $postCount,
        'post_status' => 'publish'
    ];
    $results = get_posts($args);
    foreach ($results as $key=>$p) {
        unset ($results [$key-1]);
    }
    return $results;
}
