<?php
function pjxnwpws_add_scripts() {
  //Import style.css
  wp_enqueue_style('main_stylesheet', get_stylesheet_uri());

  //Import custom Google Font from external URL
  wp_enqueue_style('custom_font', '//fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Source+Serif+4:opsz,wght@8..60,600;8..60,700&display=swap');
}

add_action('wp_enqueue_scripts', 'pjxnwpws_add_scripts');

function pjxnwpws_theme_setup() {
  //Add title tag
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'pjxnwpws_theme_setup');

function pjxnwpws_excerpt_length() {
  //Excerpts only show the first 50 words now
	return 50;
}

add_filter('excerpt_length', 'pjxnwpws_excerpt_length');

function pjxnwpws_register_sidebar() {
  register_sidebar([
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>'
  ]);
}

add_action('widgets_init', 'pjxnwpws_register_sidebar');