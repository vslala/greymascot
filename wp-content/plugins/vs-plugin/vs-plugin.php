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
if ( !defined('ABSPATH') )
    exit('Please do not load this file directly.');
    
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
    global $post, $wpdb;
    $catID = $post->post_category[0];
    $postID = $post->ID;

    # fetches ID, post_title, post_name (slug) by category ID
    $sql = "SELECT $wpdb->posts.ID, $wpdb->posts.post_title, $wpdb->posts.post_content, $wpdb->posts.post_name from $wpdb->posts LEFT JOIN $wpdb->term_relationships ON $wpdb->term_relationships.object_id = $wpdb->posts.ID WHERE $wpdb->term_relationships.term_taxonomy_id = %d AND $wpdb->posts.post_status = %s ORDER BY $wpdb->posts.post_modified";

    $results = $wpdb->get_results ( $wpdb->prepare ($sql, $catID, 'publish') );

    foreach ($results as $key=>$p) {
        if ($p->ID == $postID) {
            unset ($results [$key]);
        }
    }
    return $results;
}
