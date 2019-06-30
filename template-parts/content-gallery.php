<?php 

/*

@package simpleshoptheme
-- GALLERY POST FORMAT

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <div class="side-content">

    <div class="entry-date">
        <?php echo ss_posted_date(); ?>
    </div>

    <div class="entry-comment">
      <a class="comments-link small text-caps" href="<?php echo get_comments_link(); ?>'">
        <span class="ss-icon ss-icon-comment-box"></span>
        <span class="comments-number"><?php echo get_comments_number(); ?></span>
      </a>
    </div>

  </div><!-- .side-content -->

  <div class="post-content">
  
    <header class="entry-header">
      
      <?php 
       
      if( !ss_get_attachment() ): echo ''; ?>
      
      <?php else: ?>
      
        <div class="gallery-featured post-gallery-wrap">
          
          <div class="carousel" id="gallery-carousel">
            
            <?php $attachments = ss_get_bs_slides( ss_get_attachment(7) );
                    
              foreach( $attachments as $attachment ): ?>
            
                <a class="carousel-item gallery-featured-link"><img class="ss-attachment-img wp-post-img materialboxed" width="200" src="<?php echo $attachment['url']; ?>"></a>
                    
            <?php endforeach; ?>
                
          </div><!-- .carousel -->

        </div><!-- .post-gallery-wrap --> 
      
      <?php endif; ?>

      <div class="post-header">

        <div class="entry-title">
          <?php the_title( '<h1 class="post-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>' ); ?>
        </div>

        <div class="entry-info">
          <p>by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a> in <?php echo ss_posted_categories(); ?></p>
        </div>

      </div><!-- .post-header -->

    </header>

    <div class="entry-content">
        
        <div class="entry-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
    </div><!-- .entry-content -->
    
    <footer class="entry-footer">
      
      <div class="post-link">
         <a href="<?php the_permalink(); ?>">Read More</a>
      </div>
     
    </footer>
  
  </div><!-- .post-content -->
  
</article>