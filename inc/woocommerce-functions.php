<?php
/*

@package simpleshoptheme

    ===================================
        WOOCOMMERCE FUNCTIONS 
    ===================================
*/

//BEFORE MAIN CONTENT
function ss_before_main_content() {
  

}

add_action( 'woocommerce_before_main_content', 'ss_before_main_content' );

//AFTER MAIN CONTENT
function ss_after_main_content() {
  
  
}

add_action( 'woocommerce_after_main_content', 'ss_after_main_content' );

//REMOVE PAGE TITLE 
function ss_hide_page_title() {
  return false;
}

add_filter( 'woocommerce_show_page_title' , 'ss_hide_page_title' );

//REMOVE BREADCRUMS
function woo_remove_wc_breadcrumbs() {
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

add_action( 'init', 'woo_remove_wc_breadcrumbs' );

/*
    ===================================
        SHOP LOOP FUNCTIONS
    ===================================
*/

//BEFORE SHOP LOOP
function ss_before_shop_loop() {
  
    echo '<section class="page-section-1">
      
      <div id="shop-banner" class="page-banner" style="background-image: url('. get_template_directory_uri() .'/img/page-assets/shop/shop-banner.jpeg);">    
        <div class="banner-content right-wrap">
          <h3>Shop</h3>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna</p>
        </div>
      </div>
      
      <div class="breadcrumbs">
        <div class="container">
          <nav class="transparent no-shadows">
            <div class="nav-wrapper">
              <div class="col s12">'. ss_get_breadcrumbs() .'</div>
            </div>
          </nav>
        </div> 
      </div>
    </section>';
  
  echo '<section class="main-content"><div class="container"><div class="row">';
  
  get_sidebar( 'shop' );
  
  echo '<div class="col s12 m12 l9 xl9"><div class="product-list-container">';
}

add_action( 'woocommerce_before_shop_loop', 'ss_before_shop_loop' );

//AFTER SHOP LOOP
function ss_after_shop_loop() {
  echo '</div></div></section></div></div>';
}

add_action( 'woocommerce_after_shop_loop', 'ss_after_shop_loop' );

//BEFORE SHOP LOOP ITEM TITLE (WRAP LOOP PRODUCT IMAGE)
add_action( 'woocommerce_before_shop_loop_item_title', function(){
    echo '<div class="product-image">';
}, 9 );

add_action( 'woocommerce_before_shop_loop_item_title', function(){
    echo '<i class="material-icons">add_circle_outline</i><div class="overlay"></div></div>';
}, 11 );

//SWAP RATINGS AND TITLE
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_rating', 12 );

/*
    ===================================
        SINGLE PRODUCT FUNCTIONS
    ===================================
*/

//SWAP STORE NOTICE POSTITION
remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );

add_action( 'woocommerce_before_single_product', 'wc_print_notices', 15 );

//BEFORE SINGLE PRODUCT
function ss_before_single_product() {
  
  echo '<div class="breadcrumbs">
        <div class="container">
          <nav class="transparent no-shadows">
            <div class="nav-wrapper">
              <div class="col s12">'. ss_get_breadcrumbs() .'</div>
            </div>
          </nav>
        </div> 
      </div>';
  
  echo '<section class="main-content"><div class="container"><div class="row">';
  
}

add_action( 'woocommerce_before_single_product', 'ss_before_single_product', 4 );

//AFTER SINGLE PRODUCT
function ss_after_single_product() {
   echo '</div></div></section>';
}

add_action( 'woocommerce_after_single_product', 'ss_after_single_product', 15 );

//REMOVE SINGLE PRODUCT SIDEBAR
function ss_remove_sidebar_product_pages() {
  if ( is_product() ) {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
  }
}

add_action( 'wp', 'ss_remove_sidebar_product_pages' );

//SOCIAL SHARE
function ss_single_social_share() {
  
  if ( is_single() && is_product() ) {
    
      $title = get_the_title();

      $permalink = get_permalink();

      $media = ( !function_exists('the_post_thumbnail') ? '' : wp_get_attachment_url(get_post_thumbnail_id()) );

      $facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink; 

      $twitterHandler = ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ) : '' ); 

      $twitter = 'https://twitter.com/intent/tweet?text='. $title . '&amp;url=' . $permalink . $twitterHandler . ''; 

      $tumblr = 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' .$permalink.'&title=title&caption=text&tags=hash_tags';

      $pinterest = 'http://www.pinterest.com/pin/create/button/?url=' . $permalink . '&media=' . $media . '&description=' . $title . '-' . $permalink;  
    }
  
  
  
  
  echo '<ul class="product-share">
      <li style="display: inline; font-size: 24px; margin-right: 5px;">
          <a href="'.$facebook.'" class="transparent grey-text text-darken-3">
              <i class="fab fa-facebook"></i>  
          </a>
      </li>
      <li style="display: inline; font-size: 24px; margin-right: 5px;">
          <a href="'.$twitter.'" class="transparent grey-text text-darken-3">
              <i class="fab fa-twitter"></i>  
          </a>
      </li>
      <li style="display: inline; font-size: 24px; margin-right: 5px;">
          <a href="'.$pinterest.'" class="transparent grey-text text-darken-3">
              <i class="fab fa-pinterest"></i>  
          </a>
      </li>
    </ul>';
}

add_action( 'woocommerce_share', 'ss_single_social_share', 10 );

//REORDER SINGLE SHARING HOOK P
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
add_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing', 15 );
 
//REMOVE TAB HEADINGS
add_filter('woocommerce_product_description_heading', '__return_empty_string');

add_filter('woocommerce_product_additional_information_heading', '__return_empty_string');

/*
    ===================================
        CART PAGE
    ===================================
*/

//SWAP STORE NOTICE POSTITION
remove_action( 'woocommerce_before_cart', 'wc_print_notices', 10 );

add_action( 'woocommerce_before_cart', 'wc_print_notices', 15 );

//BEFORE CART
function ss_before_cart() {
    
  echo '<div class="breadcrumbs">
        <div class="container">
          <nav class="transparent no-shadows">
            <div class="nav-wrapper">
              <div class="col s12">'. ss_get_breadcrumbs() .'</div>
            </div>
          </nav>
        </div> 
      </div>';
  
  echo '<section class="main-content"><div class="container"><div class="row">';
}

add_filter('woocommerce_before_cart', 'ss_before_cart', 4);

//AFTER CART
function ss_after_cart() {
  echo '</section></div></div>';
}

add_filter('woocommerce_after_cart', 'ss_after_cart');

//BEFORE CART TABLE
function ss_before_cart_table() {
  echo '<div class="col s12 m12 l8 xl8"><div class="cart-table-container">';
  
  echo '<h2 class="cart-summary">your selection (';
    
   echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() );
    
  echo ')</h2>';
}

add_filter('woocommerce_before_cart_table', 'ss_before_cart_table');

//AFTER CART TABLE
function ss_after_cart_table() {
  echo '</div></div>';
}

add_filter('woocommerce_after_cart_table', 'ss_after_cart_table');

//REMOVE CROSS SELL DISPLAY
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );


//BEFORE CART TOTALS
function ss_before_before_cart_totals() {
  echo '<div class="col s12 m12 l3 xl3 offset-xl1 offset-l1"><div class="cart-totals-container">';
}

add_filter('woocommerce_before_cart_totals', 'ss_before_before_cart_totals');

//AFTER CART TOTALS
function ss_after_cart_totals() {
  
  echo '<a class="continue-shopping" href="'. get_permalink( woocommerce_get_page_id( 'shop' ) ) .'">continue shopping</a>';
  
  echo '</div></div>';
}

add_filter('woocommerce_after_cart_totals', 'ss_after_cart_totals');

//HIDE OTHER SHIPPING METHODS IF FREE SHIPPING IS AVAILABLE
function ss_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'ss_hide_shipping_when_free_is_available', 100 );

/*
    ===================================
        CHECKOUT PAGE
    ===================================
*/

//BEFORE CHECKOUT FORM 
function ss_before_checkout_form() {
  
   echo '<div class="breadcrumbs">
        <div class="container">
          <nav class="transparent no-shadows">
            <div class="nav-wrapper">
              <div class="col s12">'. ss_get_breadcrumbs() .'</div>
            </div>
          </nav>
        </div> 
      </div>';
  
  echo '<section class="main-content"><div class="container"><div class="row">';
}

add_filter('woocommerce_before_checkout_form', 'ss_before_checkout_form', 5);

//AFTERCHECKOUT FORM 
function ss_after_checkout_form() {
 echo '</section></div></div>'; 
}

add_filter('woocommerce_after_checkout_form', 'ss_after_checkout_form');

//BEFORE CUSTOMER DETAILS
function ss_checkout_before_customer_details() {
  echo '<div class="col s12 m12 l8 xl8"><div class="checkout-details-container">';
}

add_filter('woocommerce_checkout_before_customer_details', 'ss_checkout_before_customer_details');

//AFTER CUSTOMER DETAILS
function ss_checkout_after_customer_details() {
  echo '</div></div>';
  
  echo '<div class="col s12 m12 l3 xl3 offset-xl1 offset-l1"><div class="order-review-container">';
}

add_filter('woocommerce_checkout_after_customer_details', 'ss_checkout_after_customer_details');

//AFTER ORDER REVIEW
function ss_checkout_after_order_review() {
  echo '</div></div>';
}

add_filter('woocommerce_checkout_after_order_review', 'ss_checkout_after_order_review');

//ADD PLACEHOLDER TO CHECKOUT FIELDS
function ss_default_address_checkout_fields( $address_fields ) {
    $address_fields['first_name']['placeholder'] = 'First Name*';
    $address_fields['last_name']['placeholder'] = 'Last Name*';
    $address_fields['address_1']['placeholder'] = ' Street Address*';
    $address_fields['state']['placeholder'] = 'State*';
    $address_fields['postcode']['placeholder'] = 'Postal Code/Zip*';
    $address_fields['city']['placeholder'] = 'Town/City*';
    return $address_fields;
}

add_filter('woocommerce_default_address_fields', 'ss_default_address_checkout_fields', 20, 1);

function ss_checkout_fields( $fields ) {
    $fields['billing']['billing_phone']['placeholder'] = 'Phone*';
    $fields['billing']['billing_email']['placeholder'] = 'Email Address*';
    $fields['billing']['billing_company']['placeholder'] = 'Company Name (optional)';
    $fields['shipping']['shipping_company']['placeholder'] = 'Company Name (optional)';
    return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'ss_checkout_fields', 20, 1 );

//UPDATE CART COUNT AFTER AJAX
function ss_cart_count_fragments( $fragments ) {    
  $fragments['span.header-cart-count'] = '<span class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';

  return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'ss_cart_count_fragments', 10, 1 );