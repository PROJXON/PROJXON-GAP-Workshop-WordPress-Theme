<?php
function pjxnwpws_live_search_route() {
  //Create new WordPress REST API route combining post and pages
  register_rest_route('custom/v1', '/combined', [
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'pjxnwpws_combine_posts_and_pages'
  ]);
}

add_action('rest_api_init', 'pjxnwpws_live_search_route');

function pjxnwpws_combine_posts_and_pages($data) {
    //Create new query containing the 5 most recent posts and pages with the ability to search them
    $postsAndPagesQuery = new WP_Query([
      'post_type' => ['post', 'page'],
      'posts_per_page' => 5,
      'post_status' => 'publish',
      's' => sanitize_text_field($data['search'])
    ]);

    $postsAndPagesData = [];

    if ($postsAndPagesQuery->have_posts()) {
        while ($postsAndPagesQuery->have_posts()) {
            $postsAndPagesQuery->the_post();
            
            //Include only the exact information we need for the route
            array_push($postsAndPagesData, [
              'title' => get_the_title(),
              'author' => get_the_author(),
              'type' => get_post_type(),
              'link' => get_permalink(),
            ]);
        }

        wp_reset_postdata();
    }

    return $postsAndPagesData;
}