<?php
/*

@package simpleshoptheme

    ===================================
        THEME SUPPORT FUNCTIONS 
    ===================================
*/

//ACTIVATE POST FORMATS
$formats = array( 
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'video',
        'audio',
    );

add_theme_support( 'post-formats', $formats );

//ACTIVATE NAV MENU OPTION
function ss_register_nav_menu() {
    register_nav_menu(
        'primary',
        'Header Navigation Menu'
    );  
}

add_action( 'after_setup_theme', 'ss_register_nav_menu' );

//WOOCOMMERCE SUPPORT
function ss_add_woocommerce_support() {
  add_theme_support( 'woocommerce', array(
    'thumbnail_image_width' => 300,
    'single_image_width'    => 600,
    
    'product_grid'          => array(
        'default_rows'    => 3,
        'min_rows'        => 3,
        'max_rows'        => 3,
        'default_columns' => 4,
        'min_columns'     => 4,
        'max_columns'     => 4,
    ),
  ) );
}

add_action( 'after_setup_theme', 'ss_add_woocommerce_support' );

/*
    ===================================
        SIDEBAR FUNCTIONS 
    ===================================
*/

function ss_sidebar_init() {
  
    register_sidebar(
      array(
          'name' => esc_html__( 'Footer Sidebar', 'simpleshoptheme'),
          'id' => 'ss-footer-sidebar',
          'description' => 'Dynamic Footer Sidebar',
          'before_widget' => '<section id="%1$s" class="ss-widget %2$s">',
          'after_widget' => '</section>',
          'before_title' => '<h3 class="ss-widget-title">',
          'after_title' => '</h3>'
      )
  );
  
  register_sidebar(
      array(
          'name' => esc_html__( 'Shop Sidebar', 'simpleshoptheme'),
          'id' => 'shop',
          'description' => 'Dynamic Shop Sidebar',
          'before_widget' => '<section id="%1$s" class="ss-widget %2$s">',
          'after_widget' => '</section>',
          'before_title' => '<h3 class="ss-widget-title">',
          'after_title' => '</h3>'
      )
  );
  
  register_sidebar(
      array(
          'name' => esc_html__( 'Blog Sidebar', 'simpleshoptheme'),
          'id' => 'ss-blog-sidebar',
          'description' => 'Dynamic Blog/Archive Sidebar',
          'before_widget' => '<section id="%1$s" class="ss-widget %2$s">',
          'after_widget' => '</section>',
          'before_title' => '<h3 class="ss-widget-title">',
          'after_title' => '</h3>'
      )
  );

}

add_action('widgets_init', 'ss_sidebar_init');

/*
    ===================================
        NUMERIC PAGINATION
    ===================================
*/

function ss_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<ul class="page-numbers">' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('←') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="current"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="page-numbers current"' : ' class="page-numbers"';
        printf( $paged == $link ? '<li><span%s href="%s">%s</span></li>' . "\n" : '<li><a%s href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="page-numbers current"' : ' class="page-numbers"';
        printf( $paged == $max ? '<li><span%s href="%s">%s</span></li>' . "\n" : '<li><a%s href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('→') );
 
    echo '</ul>' . "\n";
 
}

/*
    ===================================
        BLOG LOOP FUNCTIONS 
    ===================================
*/

//GET POST ATTACHMENT
function ss_get_attachment( $num = 1 ) {
    
    $output = '';
    
    if( has_post_thumbnail() && $num == 1 ):
    
        $output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
    else:
    
        $attachments = get_posts( array(
            'post_type'      =>  'attachment',
            'posts_per_page' =>  $num,
            'post_parent'    =>  get_the_ID()
        ) );
    
        if( $attachments && $num == 1 ):
            
            foreach( $attachments as $attachment ):   
                $output = wp_get_attachment_url( $attachment->ID );
            endforeach;
    
        elseif( $attachments && $num > 1 ):
        
            $output = $attachments;
            
        endif;
    
        wp_reset_postdata();
    
    endif;
    
    return $output; 
}

//GET EMBEDDED MEDIA
function ss_get_embedded_media( $type = array() ) {
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    
    $embed = get_media_embedded_in_content( $content, $type );
    
    if( in_array('audio', $type) ):
        
        $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
    else:
        
        $output = $embed[0];
    endif;
    
    return $output;
}

//GET GALLERY POST ATTACHMENTS
function ss_get_bs_slides($attachments) {
  
  if( get_post_format() == 'gallery'):
    
    $output = array();
    $count = count($attachments)-1;
    
    for( $i = 0; $i <= $count; $i++ ):
          
        $output[$i] = array( 
            'url'       => wp_get_attachment_url( $attachments[$i]->ID ), 
            'caption'   => $attachments[$i]->post_excerpt 
        );
    
    endfor;
    
    return $output; 
  endif;
}


//GET POST CATEGORIES
function ss_posted_categories() {
  
    $categories = get_the_category();
    $seperator = ', ';
    $output = '';
    $i = 1;
    
    if( !empty($categories) ):
        foreach( $categories as $category ):
            
            if( $i > 1 ): $output .= $seperator; endif;
    
            $output .= '<a class="cat-link" href="'. esc_url( get_category_link($category->term_id) ) .'" alt="'. esc_attr( 'View all posts in %s', $category->name ) .'">'. esc_html( $category->name ) .'</a>';
            $i++;
    
        endforeach;
    endif;
    
    return $output; 
}

//GET POST DATE 
function ss_posted_date() {
  $post = get_post();
  
  $month = date("M", strtotime($post->post_date)); 
  $day = date("d", strtotime($post->post_date));
  $year = date("Y", strtotime($post->post_date));
  
  return '<span>'. $month .'</span><span>'. $day .'</span><span>'. $year .'</span>';

}

//CUSTOMIZE SEARCH FROM
function ss_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="input-field">
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="SEARCH"/>
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'ss_search_form', 100 );

/*
    ===================================
        SINGLE POST FUNCTIONS 
    ===================================
*/

//SINGLE POST FOOTER
function ss_single_post_footer( $content ) { 
    
    if( is_single() && !is_product() ): 
    
        $content .= '<footer class="entry-footer"><div class="footer-wrap">';

        $title = get_the_title();

        $permalink = get_permalink();
  
        $media = ( !function_exists('the_post_thumbnail') ? '' : wp_get_attachment_url(get_post_thumbnail_id()) );
  
        $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink; 

        $twitterHandler = ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ) : '' ); 

        $twitter = 'https://twitter.com/intent/tweet?text='. $title . '&amp;url=' . $permalink . $twitterHandler . ''; 
    
        $tumblr = 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' .$permalink.'&title=title&caption=text&tags=hash_tags';
  
        $pinterest = 'http://www.pinterest.com/pin/create/button/?url=' . $permalink . '&media=' . $media . '&description=' . $title . '-' . $permalink;
  
        $content .=  ''. ( !get_the_tag_list() ? '<ul class="tags-list no-tags"></ul>' : get_the_tag_list( '<ul class="tags-list"><i class="fa fa-thumb-tack"></i>', ' ', '</ul>' ) );

        $content .= '<ul class="post-share">';
  
            $content .= '<li><a href="' . $facebook . '" target="_blank" rel="nofollow"><i class="fab fa-facebook"></i></a></li>';

            $content .= '<li><a href="' . $twitter . '" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a></li>';
    
            $content .= '<li><a href="' . $tumblr . '" target="_blank" rel="nofollow"><i class="fab fa-tumblr"></i></a></li>';
  
            $content .= '<li><a href="' . $pinterest . '" target="_blank" rel="nofollow"><i class="fab fa-pinterest"></i></a></li>';
    
            $content .= '</ul></div></footer>';

        return $content;  
        
     else:
        return $content; 
    
    endif;
}

add_filter( 'the_content', 'ss_single_post_footer'); 

//POST NAVIGATION
function ss_post_navigation() { 
    
    $nav = '<div class="post-nav">';
    
    $prev = get_previous_post_link( '<div class="post-link-nav">%link</div>', '<span>←</span> previous' ); 
    
    $nav .= '<div class="ss-prev">' . $prev . '</div>';
    
    $next = get_next_post_link( '<div class="post-link-nav">%link</div>', 'next <span>→</span>' ); 
    
    $nav .= '<div class="ss-next">' . $next . '</div>';
    
    $nav .= '</div>';
    
    return $nav;
}

//GET RELATED POSTS
function ss_get_related_posts( $post_id, $related_count, $args = array() ) {
    $args = wp_parse_args( (array) $args, array(
        'orderby' => 'rand',
        'return'  => 'query', // Valid values are: 'query' (WP_Query object), 'array' (the arguments array)
    ) );
  
  $related_args = array(
    'post_type' => get_post_type( $post_id ),
    'posts_per_page' => $related_count,
    'post_status' => 'publish',
    'post__not_in' => array( $post_id ),
    'orderby' => $args['orderby'],
    'tax_query' => array()
  );

  $post = get_post( $post_id );
  $taxonomies = get_object_taxonomies( $post, 'names' );

  foreach( $taxonomies as $taxonomy ) {
    $terms = get_the_terms( $post_id, $taxonomy );
    if ( empty( $terms ) ) continue;
    $term_list = wp_list_pluck( $terms, 'slug' ); 
    $related_args['tax_query'][] = array(
        'taxonomy' => $taxonomy,
        'field' => 'slug',
        'terms' => $term_list
    );
  } 
  
  if( count( $related_args['tax_query'] ) > 1 ) {
	$related_args['tax_query']['relation'] = 'OR';
  }
  
  if ( $args['return'] == 'query' ) {
      return new WP_Query( $related_args ); 
  } else {
      return $related_args; // Query array
  }
  
}

/*
    ===================================
        COMMENTS FUNCTIONS 
    ===================================
*/

//COMMENTS NAVIAGTION
function ss_comments_nav() { 
    
    if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): 
    
       require( get_template_directory() . '/inc/templates/ss-comment-nav.php'); 
    
    endif;
}

/*
    ===================================
        FRONT PAGE FUNCTIONS
    ===================================
*/

//GET PRODUCT STAR RATING
function ss_product_star_rating( $average ) {
  if ( $average ) :
    return '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div>'; 
 endif; 
}

/*
    ===================================
        PAGE FUNCTIONS
    ===================================
*/

//GET BREADCRUMBS
function ss_get_breadcrumbs() {
    $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
    $cart_page_url = get_permalink( woocommerce_get_page_id( 'cart' ) );
    $blog_page_url = get_permalink( get_option( 'page_for_posts' ) );
  
    $crumbs = '<a href="'.home_url().'" rel="nofollow" class="breadcrumb">Home</a>';
    if (is_single()) {
          if (is_single() && is_product() ) {
            
            $crumbs .= '<a href="'.$shop_page_url.'" rel="nofollow" class="breadcrumb">shop</a>'; 
            $crumbs .= '<a href="" rel="nofollow" class="breadcrumb">'.get_the_title().'</a>'; 
           
          } else {
             $crumbs .= '<a href="'.$blog_page_url.'" rel="nofollow" class="breadcrumb">blog</a>';   
             $crumbs .= '<a href="" rel="nofollow" class="breadcrumb">'.get_the_title().'</a>'; 
          }
    } elseif (is_page() && !is_cart() && !is_checkout() ) {
        $crumbs .= '<a href="#!" rel="nofollow" class="breadcrumb">'.get_the_title().'</a>';      
    } elseif (is_home() ) {
        $crumbs .= '<a href="#!" rel="nofollow" class="breadcrumb">blog</a>';      
    } elseif ( is_shop() && is_post_type_archive( 'product' ) ) {
        $crumbs .= '<a href="#!" rel="nofollow" class="breadcrumb">shop</a>';      
    } elseif ( is_archive() || is_category() ) {
        $crumbs .= '<a href="#!" rel="nofollow" class="breadcrumb">'. str_replace(array('Category: ','Tag: '),'',get_the_archive_title()) .'</a>';      
    } elseif ( is_tag() ) {
        $crumbs .= '<a href="#!" rel="nofollow" class="breadcrumb">'. str_replace('Tag: ','',get_the_archive_title()) .'</a>';      
    } elseif ( is_author() ) {
        $crumbs .= '<a href="#!" rel="nofollow" class="breadcrumb">'. str_replace('Author: ','',get_the_archive_title()) .'</a>';      
    } elseif (is_search()) {
        $crumbs .= '<a href="#!" rel="nofollow" class="breadcrumb">Search results for: "'.get_search_query().'"</a>';
    } elseif (is_404()) {
        $crumbs .= '<a href="#!" rel="nofollow" class="breadcrumb">404</a>'; 
    } elseif (is_cart()) {
        $crumbs .= '<a href="'.$shop_page_url.'" rel="nofollow" class="breadcrumb">shop</a>'; 
        $crumbs .= '<a href="" rel="nofollow" class="breadcrumb">'.get_the_title().'</a>'; 
    } elseif (is_checkout()) {
        $crumbs .= '<a href="'.$shop_page_url.'" rel="nofollow" class="breadcrumb">shop</a>'; 
        $crumbs .= '<a href="'.$cart_page_url.'" rel="nofollow" class="breadcrumb">cart</a>'; 
        $crumbs .= '<a href="" rel="nofollow" class="breadcrumb">'.get_the_title().'</a>'; 
    } 
  
    return $crumbs;
}




