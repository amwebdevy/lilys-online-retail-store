<?php /*

@package simpleshoptheme

*/

if( post_password_required() ) {
    return;   
}

?>

<div id="comments" class="comments-area">
  
    <?php if( !have_comments() ): ?>
  
    <div class="comments-number no-comments">
      <p>0 Comments</p> 
    </div>
  
    <?php else: ?>
    
    <div class="comments-number">
        <p> 
        <?php
            printf(
                esc_html( _nx( '1 comment', '%1$s comments', get_comments_number(), 'comment title', 'simpleshoptheme' ) ),
                number_format_i18n( get_comments_number() )
            ); 
        ?>
        </p>
    </div>
  
    <?php ss_comments_nav(); ?>

    <ol class="comment-list">
      <?php
          $args = array(
              'walker'        => null,  
              'max-depth'     => '',    
              'syle'          => 'ol',  
              'callback'      => 'ss_format_comment',  
              'end-callback'  => null,  
              'type'          => 'all', 
              'reply_text'    => 'Reply', 
              'page'          => '',    
              'per_page'      => '',    
              'avatar_size'   => 64,    
              'reverse_top_level' => null, 
              'reverse_children'  => '',   
              'format'        => 'html5',  
              'short_ping'    => false,    
              'echo'          => true,  
          );

          wp_list_comments( $args );
      ?>     
    </ol>
    
        <?php 
            if( !comments_open() && get_comments_number() ): 
        ?>

        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'simpleshoptheme' ); ?></p>

        <?php      
            endif;
        ?>
    
    <?php
        endif;
    ?>
    
    <?php  
        $fields = array(  
            'author' => 
                '<div class="input-field col s6"><input id="author" name="author" type="text" class="form-control" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',
            
            'email' =>
				'<div class="input-field col s6"><input id="email" name="email" class="form-control" type="text" placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div>',
        );
        
        $args = array(
            'title_reply_before'   =>
                '<div class="comment-form-header"><h3 id="reply-title" class="comment-reply-title">',
            'title_reply'          => 'Leave a Comment',
            'title_reply_after'    => 
                '<small class="comment-notes"><span id="email-notes">Your email address will not be published.</span></small></h3></div>',
            'comment_notes_before' => '',
            'comment_notes_after'  => '',
            'class_submit'         => 'ss-btn', 
            'label_submit'         => __( 'Post Comment' ), 
            'comment_field'        => 
                '<textarea id="comment" class="form-control" name="comment" placeholder="Comment" rows="4" required="required"></textarea></p>', 
            'fields'               => apply_filters( 'comment_form_default_fields', $fields ), 
        );
            
        comment_form( $args ); 
    ?>

</div><!-- .comments-area -->





<?php

function ss_format_comment($comment, $args, $depth ){
    $post_author = get_the_author_meta('ID');
    $comment_author = $comment->user_id;
    if($post_author == $comment_author ) {
        $author_tag = 'post-author-comment';
    } 
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $args['has_children'] ? 'parent' : '', $comment ); ?>>
         <article id="div-comment-<?php comment_ID(); ?>" class="comment-body <?php echo $author_tag; ?>">
             
            <footer class="comment-meta">
                
               <div class="comment-author vcard">
                   
                   <?php if( get_avatar( $comment ) ) printf( __( '%s' ), sprintf( ' <div class="author-avatar">%s</div>', get_avatar( $comment, $args['avatar_size'] )  ) ); ?>
             
                    <div class="author-info">
                        
                        <?php printf( __( '%s' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) ) ); ?>
                        <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
                        
                        <div class="comment-metadata">
                             <time datetime="<?php comment_time( 'c' ); ?>">
                                <?php
                                   /* translators: 1: comment date */
                                   printf( __( '%1$s' ), get_comment_date( '', $comment ) );
                                ?>
                            </time>
                        </div><!-- .comment-metadata -->
                        
                    </div><!-- .author-info -->
                   
               </div><!-- .comment-author -->

               <?php if ( '0' == $comment->comment_approved ) : ?>
                
                    <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
                
               <?php endif; ?>
                
            </footer><!-- .comment-meta -->

            <div class="comment-content">
               <?php comment_text(); ?>
            </div><!-- .comment-content -->

         </article><!-- .comment-body -->
        
        <?php
            comment_reply_link( array_merge( $args, array(
               'add_below'  => 'div-comment',
               'depth'      => $depth,
               'max_depth'  => $args['max_depth'],
               'before'     => '<div class="reply">',
               'after'      => '</div>',
               'reply_text' => 'Reply <i class="material-icons">reply</i>'
            ) ) );       
}

?>
