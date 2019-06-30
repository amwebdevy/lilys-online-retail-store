<?php
    
    /*  
        @package simpleshoptheme
    */
?>

<footer>
  
  <section class="footer-upper">
    <div class="container">

      <div class="row <?php ( is_active_sidebar( 'ss-footer-sidebar' ) ? print 'footer-sidebar' : print 'no-footer-sidebar' ); ?>">

        <?php get_sidebar('ss-footer-sidebar'); ?>

      </div><!-- .row -->

    </div><!-- .container -->
  </section><!-- .footer-upper -->
  
  <section class="footer-lower">
    <div class="container">
    
      <div class="row">

        <div class="left"><p><small>&copy; Copyright 2019. All Rights Reserved.</small></p></div>

        <div class="right">
          <ul>
            <li><a href="#" class="transparent grey-text text-lighten-2">
              <i class="fab fa-cc-paypal"></i>  
            </a></li>
            <li><a href="#" class="transparent grey-text text-lighten-2">
              <i class="fab fa-cc-mastercard"></i>  
            </a></li>
            <li><a href="#" class="transparent grey-text text-lighten-2">
              <i class="fab fa-cc-visa"></i>  
            </a></li>
          </ul>
        </div>

      </div><!-- .row -->
      
    </div><!-- .container -->
  </section><!-- .footer-lower -->

</footer>

<?php wp_footer(); ?>

</body>
</html>