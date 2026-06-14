<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <h2 class="entry-title">
    <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
  </h2>
  <div class="entry-meta">
    <span class="byline">
      Posted by
      <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
        <?php echo esc_html(get_the_author()); ?>
      </a>
      on
      <a href="<?php echo esc_url(get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d'))); ?>">
        <?php echo esc_html(get_the_date()); ?>
      </a>
      in
      <?php echo get_the_category_list(esc_html__(', ')); ?>
    </span>
  </div>
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