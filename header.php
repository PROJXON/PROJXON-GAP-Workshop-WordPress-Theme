<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset'); ?>">
    <?php wp_head(); ?>
  </head>
  <body>
    <header>
      <h1><a href="<?php echo esc_url(site_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
    </header>