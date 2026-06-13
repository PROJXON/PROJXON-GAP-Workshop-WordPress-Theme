<?php get_header();

  while (have_posts()) {
    the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2 class="entry-title">
        <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
      </h2>
      <div class="entry-meta">
				<span class="byline">
          <?php echo sprintf(
            esc_html_x('Posted by %1$s on %2$s', 'Post author and date'), get_the_author(), get_the_date()
          ); ?>
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
  <?php }

get_footer(); ?>