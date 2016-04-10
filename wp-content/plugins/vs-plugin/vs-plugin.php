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
require_once 'VSGoogleSearchWidget.php';
function register_google_search_widget() {
    register_widget('VSGoogleSearchWidget');
}
add_action('widgets_init', 'register_google_search_widget');