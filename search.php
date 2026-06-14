<?php get_header();
  while (have_posts()) {
    the_post();
    get_template_part('template-parts/article', get_post_type());
  }

  if (wp_count_posts()->publish > get_option('posts_per_page')) { ?>
    <nav class="posts-navigation">
      <?php echo paginate_links(); ?>
    </nav>
  <?php }

get_footer(); ?>