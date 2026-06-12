      </main><!-- #primary -->
      
      <?php get_sidebar(); ?>

      <footer id="siteFooter">
        <div class="site-info">
          <a href="<?php echo esc_url(__('https://wordpress.org/', 'projxon-gap-workshop-wordpress-theme')); ?>">
				    <?php printf(esc_html__('Proudly powered by %s', 'projxon-example-theme'), 'WordPress'); ?>
			    </a>
          <br />
          &copy; <?php echo date("Y"); ?>
        </div>
      </footer>
      <?php wp_footer(); ?>
    </div><!-- #page -->
  </body>
</html>