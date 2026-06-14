<?php get_header();

  global $wp_query;
  $numOfResults = $wp_query->found_posts; ?>
  <h2><?php echo $numOfResults; ?> results for "<?php the_search_query(); ?>"</h2>

  <?php while (have_posts()) {
    the_post();
    get_template_part('template-parts/article', get_post_type());
  }

  if ($numOfResults > get_option('posts_per_page')) { ?>
    <nav class="posts-navigation">
      <?php echo paginate_links(); ?>
    </nav>
  <?php }

get_footer(); ?>