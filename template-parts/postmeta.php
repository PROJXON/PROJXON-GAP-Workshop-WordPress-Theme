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