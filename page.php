<?php get_header();

  while (have_posts()) {
    the_post();
    $parentID = wp_get_post_parent_id(get_the_ID());
    $hasChildren = get_pages(['child_of' => get_the_ID()]);

    if ($parentID || $hasChildren) { ?>
      <nav class="menu" id="childMenu">
        <?php wp_list_pages([
          'title_li' => null,
          'child_of' => $parentID ? $parentID : get_the_ID()
        ]); ?>
      </nav>
    <?php } ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2 class="entry-title"><?php the_title(); ?></h2>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>
  <?php }

get_footer(); ?>