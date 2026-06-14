<?php get_header();

  while (have_posts()) {
    the_post();
    get_template_part('template-parts/article');
  }
  
  $latestBlogPosts = new WP_Query([
    'posts_per_page' => 2
    // 'posts_per_page' => -1, //Display all posts
    // 'post_type' => 'page', //Display pages instead of posts
    // 'orderby' => 'title', //Order by post title instead of date
    // 'order' => 'ASC' //Sort in ascending order instead of descending
  ]); ?>

  <div class="wp-query">
    <h2>My two latest blog posts:</h2>
    <?php while ($latestBlogPosts->have_posts()) {
      $latestBlogPosts->the_post(); ?>
        <?php get_template_part('template-parts/article', 'post'); ?>
    <?php } ?>
  </div>

  <?php wp_reset_postdata();

get_footer(); ?>