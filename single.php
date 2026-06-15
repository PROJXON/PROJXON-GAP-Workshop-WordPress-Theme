<?php get_header();

  //If you want extra content on the post with an ID of 7, uncomment out the following line. Alternatively, you can also create a new file called single-7.php or single-[The slug for that post].php.
  //if (get_the_ID() === 7) echo '<p>This only appears on the post with an ID of 7</p>';

  while (have_posts()) {
    the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2 class="entry-title"><?php the_title(); ?></h2>
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
      <div class="entry-content">
        <?php the_post_thumbnail('banner-image');
        the_content(); ?>
      </div>
    </article>

    <?php if (comments_open() || get_comments_number()) comments_template();
  }

get_footer(); ?>