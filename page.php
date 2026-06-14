<?php get_header();

  while (have_posts()) {
    the_post();
    $parentID = wp_get_post_parent_id(get_the_ID());
    $hasChildren = get_pages(['child_of' => get_the_ID()]);

    if ($parentID || $hasChildren) { ?>
      <nav class="menu" id="childMenu">
        <?php wp_list_pages([
          'title_li' => null,
          'child_of' => $parentID ? $parentID : get_the_ID(),
          'sort_column' => 'menu_order'
        ]); ?>
      </nav>
    <?php }

    get_template_part('template-parts/content', 'page');
  }

get_footer(); ?>