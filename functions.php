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