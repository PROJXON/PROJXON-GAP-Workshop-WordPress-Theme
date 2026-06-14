<form role="search" method="GET" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
  <label class="screen-reader-text"><?php echo _x('Search for:', 'label'); ?></label>
	<input type="search" id="s" class="search-field" placeholder="<?php echo esc_attr_x('Search…', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label'); ?>" />
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button'); ?>" />
</form>