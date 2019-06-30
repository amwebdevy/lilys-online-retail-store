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

<section class="main-content ss-blog-content">
  
  <div class="container">
    
    <div class="row">
      
      <div class="roll-container <?php ( is_active_sidebar( 'ss-blog-sidebar' ) ? print 'col s12 m12 l8 xl8' : print 'full-width' ); ?>">
          
        <main id="main" class="size-main" rold="main">
          
          <div class="article-wrap">
          
            <?php
            
              if( have_posts() ):

                  while( have_posts() ): the_post();

                      get_template_part( 'template-parts/content', get_post_format() );

                  endwhile;
            
              else:

                echo '<div class="no-search"><h1>No Results!</h1><h4>Sorry, no content matched your criteria. Please try again with some different keywords.</h4></div>';

              endif;
  
            ?>
            
            <nav class="ss-pagination">
      
              <?php ss_numeric_posts_nav(); ?>

            </nav>
            
          </div><!-- .article-wrap -->

        </main>
        
      </div><!-- .roll-container -->
      
      <?php get_sidebar('ss-blog-sidebar'); ?>
      
    </div><!-- .row -->
    
  </div><!-- .container -->
  
</section><!-- .ss-blog-content -->

<?php get_footer(); ?>