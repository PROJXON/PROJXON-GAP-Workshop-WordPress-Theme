<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <h2 class="entry-title">
    <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
  </h2>
  <div class="entry-content">
    <?php the_excerpt(); ?>
  </div>
</article>