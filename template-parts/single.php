<?php 

/*

@package simpleshoptheme
-- SINGLE POST TEMPLATE

*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="post-content">
    
    <header class="entry-header">
    
      <div class="post-header">

        <div class="entry-title">
          <?php the_title( '<h1 class="post-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>' ); ?>
        </div>

        <div class="entry-info">

          <div class="entry-date">
            <i class="fa fa-calendar"></i>
            <?php echo ss_posted_date(); ?>
          </div>

          <div class="entry-author">
            <i class="fa fa-user"></i>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
          </div>

          <div class="entry-comment">
            <a class="comments-link small text-caps" href="<?php echo get_comments_link(); ?>'">
              <i class="material-icons">comment</i>
              <span class="comments-number"><?php echo get_comments_number(); ?></span>
            </a>
          </div>

        </div><!-- .entry-info -->

      </div><!-- .post-header -->
      
      <?php 
       
      if( !ss_get_attachment() ): echo ''; ?>
      
      <?php else: ?>
      
        <?php if ( has_post_thumbnail() ): ?>
      
          <div class="standard-featured post-img-wrap" style="background-image: url(<?php ( !ss_get_attachment() ? '' : print ss_get_attachment() ); ?>"></div>  
      
        <?php endif; ?>
      
      <?php endif; ?>

    </header>

    <div class="entry-content<?php ( !has_post_thumbnail() ? print ' no-thumbnail' : print '' ); ?>">
        
      <?php the_content(); ?>
        
    </div><!-- .entry-content -->
  
  </div><!-- .post-content -->
  
</article>
