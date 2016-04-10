<?php

$args = [

];
register_sidebar();

# My Top Menu
function register_my_top_bar() {
    register_nav_menu('top-bar',__( 'Top Bar' ));
}
add_action( 'init', 'register_my_top_bar' );

# My Primary Menu
function register_primary_menu() {
    register_nav_menu('primary', __('Primary Menu'));
}
add_action ('init', 'register_primary_menu');


// This adds the feature to add featured images to the post
add_theme_support( 'post-thumbnails' );

# This add .active class to the current page menu
function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);