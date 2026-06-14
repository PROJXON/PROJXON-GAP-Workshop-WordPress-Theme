<?php get_header();

  while (have_posts()) {
    the_post();
    $parentID = wp_get_post_parent_id(get_the_ID());
    $hasChildren = get_pages(['child_of' => get_the_ID()]);

    //Only display if page is a parent page or is a child of another page. You can also create a file called page-[post ID].php or page-[post-slug].php to power a single page.
    if ($parentID || $hasChildren) { ?>
      <nav class="menu" id="childMenu">
        <?php wp_list_pages([
          'title_li' => null,
          'child_of' => $parentID ? $parentID : get_the_ID(),
          'sort_column' => 'menu_order'
        ]); ?>
      </nav>
    <?php }

    get_template_part('template-parts/article');
  }

get_footer(); ?>