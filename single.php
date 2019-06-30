<?php /*

@package simpleshoptheme

*/

get_header(); ?>

<section>
  <div class="breadcrumbs">
    <div class="container">
      <nav class="transparent no-shadows">
        <div class="nav-wrapper">
          <div class="col s12"><?php echo ss_get_breadcrumbs(); ?></div>
        </div>
      </nav>
    </div> 
  </div>
</section>

<section class="main-content ss-blog-content">
  
  <div class="container">
    
    <div class="row">
      
      <div class="single-container <?php ( is_active_sidebar( 'ss-blog-sidebar' ) ? print 'col s12 m12 l8 xl8' : print 'full-width' ); ?>">
          
        <main id="main" class="size-main" rold="main">
          
          <div class="article-wrap">
          
            <?php
            
              if( have_posts() ):

                  while( have_posts() ): the_post();

                      get_template_part( 'template-parts/single', get_post_format() );

                  endwhile; 

              endif; 
            
            ?>
            
          </div><!-- .article-wrap -->
          
          <section class="post-navigation">
            
            <?php echo ss_post_navigation(); ?>
          
          </section>     
          
          <?php 

            $related = ss_get_related_posts( get_the_ID(), 3 );
          
            if( $related->have_posts() ):
            
          ?>

            <section class="post-related">

              <h3>Related</h3>
              
              <div class="related-items">

                <?php while( $related->have_posts() ): $related->the_post(); ?>

                  <article id="post-<?php the_ID(); ?>" class="single-related">
                    
                  <?php if( !has_post_thumbnail() ): echo ''; ?>

                    <?php else: ?>

                      <div class="post-img-wrap">

                        <a class="featured-link" href="<?php the_permalink( $related->ID ); ?>">
                          
                         <?php the_post_thumbnail('full'); ?>
                          
                          <div class="overlay"></div>

                        </a>

                      </div>   

                    <?php endif; ?>

                    <div class="post-header">

                      <div class="entry-date">
                          <?php echo ss_posted_date(); ?>
                      </div>

                      <div class="entry-title">
                        <?php the_title( '<h3 class="post-title"><a href="'. esc_url( get_permalink( $related->ID ) ) .'" rel="bookmark">', '</a></h3>' ); ?>
                      </div>

                    </div><!-- .post-header -->

                  </article>

                <?php endwhile; ?>
                
              </div><!-- .related-items -->

            </section>
          
        <?php endif; wp_reset_postdata(); 

          if ( comments_open() || get_comments_number() ): ?>

            <section class="comments-area">

              <?php comments_template(); ?>

            </section>

         <?php endif; ?>
        
        </main>
        
      </div><!-- .single-container -->
      
      <?php get_sidebar('ss-blog-sidebar'); ?>
      
    </div><!-- .row -->
    
  </div><!-- .container -->
  
</section><!-- .ss-blog-content -->

<?php get_footer(); ?>