<?php
// Enqueue styles
function register_styles() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/bootstrap-5.3.8-dist/css/bootstrap.min.css', array(), '1.0.1');
    wp_enqueue_style('style-theme', get_template_directory_uri() . '/assets/css/style.css', array(), null);
   
}
add_action('wp_enqueue_scripts', 'register_styles');

// Enqueue scripts
function register_scripts() {
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'register_scripts');

?>

