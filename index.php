<?php get_header();

  while (have_posts()) {
    the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="entry-meta">
				<span class="byline">
          <?php echo sprintf(
            esc_html_x('Posted by %1$s on %2$s', 'Post author and date', 'projxon-gap-workshop-wordpress-theme'), get_the_author(), get_the_date()
          ); ?>
        </span>
			</div>
      <div class="entry-content">
        <?php the_excerpt(); ?>
      </div>
    </article>
  <?php }

get_footer(); ?>