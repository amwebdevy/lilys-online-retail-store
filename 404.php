<?php /*

@package simpleshoptheme

*/

get_header(); ?>

  <section>
    <div class="breadcrumbs grey lighten-3">
      
      <div class="container">
        <nav class="transparent no-shadows">
          <div class="nav-wrapper">
            <div class="col s12">
              <?php echo ss_get_breadcrumbs(); ?>
            </div>
          </div>
        </nav>
      </div><!-- .container -->
    
    </div><!-- .breadcrumbs -->
  </section>


  <section class="error-404 not-found">
    
    <div class="container">
      <div class="error-content">

        <h1 class="error-title"><?php _e( '404', 'simpleshoptheme' ); ?></h1>

        <p><?php _e( 'We\'re sorry, the page you are looking for does not exist. It may have been moved or deleted.', 'simpleshoptheme'); ?></p>

        <div class="error-search">
            <?php echo get_search_form(); ?>
        </div>

      </div><!-- .error-content -->
    
    </div><!-- .container -->
    
  </section>

  <?php echo do_shortcode("[instagram-feed]"); ?>

<?php get_footer(); ?>