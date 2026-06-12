<?php get_header();

  while (have_posts()) {
    the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2 class="entry-title"><?php the_title(); ?></h2>
      <div class="entry-meta">
				<span class="byline">
          Posted by <?php the_author(); ?> on <?php echo get_the_date(); ?>
        </span>
			</div>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>
  <?php }

get_sidebar();
get_footer(); ?>