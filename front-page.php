<?php /*

@package simpleshoptheme

*/

get_header(); ?>

  <section class="slider" id="landing">
    <ul class="slides">
      <li>
        <img id="slide-img-1" src="<?php echo get_template_directory_uri(); ?>/img/landing-carousel/slide-1-a.jpg"> 
        <div class="landing-content-wrap left-wrap">
          <div class="caption left-align">
            <p class="grey-text text-lighten-5">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            <h3 class="grey-text text-lighten-5">This is our big Tagline!</h3>
            <a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" class="ss-btn-alt">Shop</a>
          </div>
        </div>
      </li>
      <li>
        <img id="slide-img-2" src="<?php echo get_template_directory_uri(); ?>/img/landing-carousel/slide-2.jpg"> 
        <div class="landing-content-wrap left-wrap">
          <div class="caption center-align" style="color: #454545;">
            <p class="grey-text text-darken-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            <h3>This is our big Tagline!</h3>
            <a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" class="ss-btn">Shop</a>
          </div>
        </div>
      </li>
      <li>
        <img id="slide-img-3" src="<?php echo get_template_directory_uri(); ?>/img/landing-carousel/slide-3.jpg"> 
        <div class="landing-content-wrap right-wrap">
          <div class="caption right-align" style="transform: translateX(-100px); color: #454545;">
            <p class="grey-text text-darken-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            <h3>This is our big Tagline!</h3>
            <a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" class="ss-btn">Shop</a>
          </div>
        </div>
      </li>
    </ul>
  </section><!-- .slider -->

  <section class="landing-info grey lighten-3">
    
    <div class="container">
      
      <div class="info-wrap">
        <div class="info info-left"><h5>shipping anywhere</h5></div>
        <div class="info info-center"><h5>online support</h5></div>
        <div class="info info-right"><h5>money back guarantee</h5></div>
      </div><!-- .info-wrap -->
    
    </div><!-- .container -->
    
  </section><!-- .landing-info -->

  <section class="landing-categories">
    <div class="container">
      
      <div class="categories-grid animated">
                     
        <?php

        $ss_featured_category_id = array( 22, 76, 19, 18, 23 );

        foreach( $ss_featured_category_id as $id ):
          if( $term = get_term_by( 'id', $id, 'product_cat' ) ):
            $cat_name = $term->name;
         endif;
          $cat_thumb_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
          $cat_thumb_url = wp_get_attachment_image_src( $cat_thumb_id, 'large' )[0];
          $cat_link = get_term_link( $term->slug , 'product_cat' );
        ?>

        <div class="landing-category">
          <a href="<?php echo $cat_link; ?>" class="cat-link"> 
            <div class="landing-cat-bg" style="background-image: url(<?php echo $cat_thumb_url; ?>)">
              <span class="cat-name"><?php echo $cat_name; ?></span>
              <div class="overlay"></div>
            </div>
          </a>
        </div><!-- .landing-category -->

        <?php

        endforeach;

        ?>
        
      </div><!-- .categories-grid -->
    
    </div><!-- .container -->
  </section><!-- .landing-categories -->


  <section class="landing-banner animated">
    <div class="container">
      
      <div class="hori-banner grey">
        
        <div class="banner-text">
          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
        </div>
        
        <div class="banner-links">
          <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'about' ) ) ); ?>" class="ss-btn-alt">Learn more</a>
          <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'contact' ) ) ); ?>" class="ss-btn">Contact</a>
        </div>
        
        <div class="overlay"></div>
        
      </div><!-- .hori-banner -->
      
    </div><!-- .container -->
  </section><!-- .landing-banner -->

  <section class="landing-new animated">
    <div class="container">
      
      <div class="new-arrivals-header">
        <div class="new-info">
          <h3>New Arrivals</h3>
          <p>Neque porro quisquam est qui dolorem</p>
        </div>
        <div class="view-products-link">
          <a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>"> <i class="material-icons">apps</i>View All Products</a>
        </div>
      </div>
    
    <div class="new-arrivals center">
           
      <?php
        $args = array(
          'post_type' => 'product',
          'stock' => 1,
          'posts_per_page' => 4,
          'orderby' =>'date',
          'order' => 'DESC' 
        );
      ?>
    
      <?php global $product; // required
      
          $custom_posts = get_posts($args);
      
          $products = array();
    
      
          foreach( $custom_posts as $post ):
        
          $products[] = $post;
      
          endforeach;
      
      ?>
      
          <div class="woocommerce">

            <ul class="products columns-4">

               <?php foreach($products as $product) : 
                
              setup_postdata($product); ?>

                <li class="product hoverable">
                  <a id="id-<?php echo $product->get_id(); ?>" href="<?php echo get_permalink( $product->get_id() ); ?>" title="<?php echo $product->get_name(); ?>">
                    <div class="product-image">
                      <?php if (has_post_thumbnail( $product->post->ID )) echo get_the_post_thumbnail($product->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="300px" height="300px" />'; ?>
                      <i class="material-icons">add_circle_outline</i>
                      <div class="overlay"></div>
                    </div>
                      <?php echo ss_product_star_rating( $product->get_average_rating() ); ?>
                  <h3><?php echo $product->get_name(); ?></h3>
                  <span class="price"><?php echo $product->get_price_html(); ?></span>
                  </a>
                  <?php woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>

                </li><!-- /span3 -->  

               <?php endforeach; ?>

            </ul><!-- .products -->   
            
          </div><!-- .woocommerce -->

      </div><!-- .new-arrivals -->
    
    </div><!-- .container -->
  </section><!-- .landing-new -->

  <section class="landing-blog animated">

    <div class="container">
      
      <div class="blog-container">

        <h3>Latest News</h3>
        
        <ul class="blog-items">
  
          <?php
              $args = array(
                  'numberposts' => 6,
                  'orderby' => 'post_date',
                  'order' => 'DESC',
                  'post_type' => 'post',
                  'post_status' => 'publish',
              );
                 
              $recent_posts = wp_get_recent_posts( $args );
          
              foreach( $recent_posts as $recent ): ?>
          
                <li class="blog-item">
                  <div class="item-img">
                    <a href=" <?php echo get_permalink( $recent["ID"] ); ?> ">
                      <?php echo get_the_post_thumbnail( $recent["ID"], 'thumbnail' ); ?>
                    </a>
                  </div>
                  
                  <div class="item-content">
                    
                    <a class="post-date">
                      <?php echo get_the_date( $d = '', $recent["ID"] ); ?>
                    </a>
                    <a href=" <?php echo get_permalink( $recent["ID"] ); ?> " class="post-title">
                      <?php echo $recent["post_title"]; ?>
                    </a>
                    <p class="post-excerpt"><?php echo wp_trim_excerpt( $recent['post_content']); ?></p>
                  </div>
                </li>
          <?php
              endforeach;
              wp_reset_query();
          ?>
          
        </ul>

      </div>
    
    </div><!-- .container -->

  </section><!-- .landing-blog -->

<?php echo do_shortcode("[instagram-feed]"); ?>

<?php get_footer(); ?>