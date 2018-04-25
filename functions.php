<?php

// Override Admin CSS Override
function admin_css_override() {
  echo '<style>
    #adminmenu li.wp-menu-separator {
        display: none!important;
    }
  </style>';
}
add_action('admin_head', 'admin_css_override');

// Add Menu Support
add_theme_support('menus');
function register_theme_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu')
        )
    );
}
add_action('init', 'register_theme_menus');

// Load CSS Files
function podcast_theme_styles() {
    wp_enqueue_style('googlefont_css', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900');
    wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'podcast_theme_styles');

// Load Javascript Files
function podcast_theme_js() {
    wp_enqueue_script('main_js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'podcast_theme_js');

?>