<?php get_header();
  
  //Determines if the user is on an archive page. We could've also created a separate archive.php page, or archive-[type of archive].php (e.g. archive-category.php for category archives) for specific types of archive pages
  if (is_archive()) { ?>
    <h2><?php
      if (is_category()) {
        echo 'All posts in ' . single_cat_title() . ':';
      } elseif (is_author()) {
        the_post();
        echo 'All posts written by ' . get_the_author() . ':';
        rewind_posts();
      } elseif (is_day()) {
        echo 'All posts published on ' . get_the_date() . ':';
      } elseif (is_month()) {
        echo 'All posts published in ' . get_the_date('F Y') . ':';
      } else if (is_year()) {
        echo 'All posts published in ' . get_the_date('Y') . ':';
      } else {
        echo 'Archives:';
      }
    ?></h2>
  <?php }

  while (have_posts()) {
    the_post();
    get_template_part('template-parts/article', 'post');
  }

  if (wp_count_posts()->publish > get_option('posts_per_page')) { ?>
    <nav class="posts-navigation">
      <?php echo paginate_links(); ?>
    </nav>
  <?php }

get_footer(); ?>