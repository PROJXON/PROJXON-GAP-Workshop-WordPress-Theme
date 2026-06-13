<?php get_header();

  //If you want extra content on the post with an ID of 7, uncomment out the following line. Alternatively, you can also create a new file called single-7.php or single-[The slug for that post].php.
  //if (get_the_ID() === 7) echo '<p>This only appears on the post with an ID of 7</p>';

  while (have_posts()) {
    the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2 class="entry-title"><?php the_title(); ?></h2>
      <div class="entry-meta">
				<span class="byline">
          <?php echo sprintf(
            esc_html_x('Posted by %1$s on %2$s', 'Post author and date'), get_the_author(), get_the_date()
          ); ?>
        </span>
			</div>
      <div class="entry-content">
        <?php the_post_thumbnail('banner-image');
        the_content(); ?>
      </div>
    </article>

    <?php if (comments_open() || get_comments_number()) comments_template();
  }

get_footer(); ?>