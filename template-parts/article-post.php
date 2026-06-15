<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <h2 class="entry-title">
    <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
  </h2>
  <?php get_template_part('template-parts/postmeta'); ?>
  <div class="entry-content <?php if (has_post_thumbnail()) echo 'has-thumbnail'; ?>">
    <?php the_post_thumbnail('small-thumbnail');
    the_excerpt(); ?>
  </div>
  <div class="comments-number">
    <a href="<?php echo esc_url(get_permalink() . '#comments'); ?>">
      <span class="dashicons dashicons-admin-comments"></span>
      <span><?php echo get_comments_number(); ?></span>
    </a>
  </div>
</article>