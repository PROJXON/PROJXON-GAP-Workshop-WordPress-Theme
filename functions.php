<?php
add_action('wp_enqueue_scripts', function() {
  wp_enqueue_style('main_stylesheet', get_stylesheet_uri());
});