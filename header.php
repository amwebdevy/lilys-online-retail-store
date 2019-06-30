<?php
    
    /*  
        @package simpleshoptheme
    */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <title><?php bloginfo( 'name' ); wp_title(); ?></title>

        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="profile" href="https://gmpg.org/xfn/11">
        <?php 
            if( is_singular() && pings_open( get_queried_object() ) ): ?>
                <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
      
      <header>
        <nav class="nav-wrapper upper-nav hide-on-med-and-down no-shadows">
          <div class="container">
            <ul class="left-upper">
             <li>
               <a><i class="material-icons">phone_iphone</i>123-45-789</a>
              </li>
              <li>
                <a><i class="material-icons">email</i>temporary@email.com</a>
              </li>
            </ul>
            <ul class="right">
              <li><a href="#" class="transparent">
                <i class="ss-icon ss-icon-facebook" aria-hidden="true"></i>  
              </a></li>
              <li><a href="#" class="transparent">
                <i class="ss-icon ss-icon-twitter" aria-hidden="true"></i>  
              </a></li>
              <li><a href="#" class="transparent">
                <i class="ss-icon ss-icon-pinterest" aria-hidden="true"></i>  
              </a></li>
              <li><a href="#" class="transparent">
                <i class="ss-icon ss-icon-instagram" aria-hidden="true"></i>  
              </a></li>
            </ul>
          </div><!-- container -->
        </nav><!-- upper-nav -->
        
        <nav class="nav-extended lower-nav no-shadows">
          <div class="container">
            <div class="nav-wrapper">
              
              <div class="alt-nav">
                
                <ul class="right">
                  <li class="open-sidenav">
                    <a href="#" class="sidenav-trigger" data-target="mobile-menu">
                      <i class="material-icons">menu</i>
                    </a>
                  </li>
                  <li class="search">
                    <a href="#" class="dropdown-trigger btn-lrg transparent" data-target='dropdown-search-alt'>
                      <i class="material-icons">search</i>
                    </a>
                    <ul id='dropdown-search-alt' class='dropdown-content dropdown-search arrow_box'>
                      <li class="nav-search">
                          <?php echo get_search_form(); ?>
                      </li>
                    </ul>
                  </li>
                  <li class="current-cart">
                    <a href="<?php echo get_permalink( woocommerce_get_page_id( 'cart' ) ); ?>" class="cart-trigger btn-lrg transparent" data-target='dropdown-cart-alt'>
                      <i class="material-icons">shopping_cart</i>

                       <span class="header-cart-count"><span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></span>
                    </a>
                    <ul id='dropdown-cart-alt' class='dropdown-content dropdown-cart arrow_box'>
                      <li class="nav-cart">
                          <?php woocommerce_mini_cart(); ?>
                      </li>
                    </ul>
                  </li>
                </ul>
                <ul class="sidenav grey lighten-2" id="mobile-menu">
                  <?php
                      wp_nav_menu( array(
                          'theme_location' => 'primary',
                          'container' => false,
                          'menu_class' => 'nav-center',
                          'walker' => new SS_Walker_Nav_Primary()

                      ) );
                  ?>
                </ul>
                <div class="left">
                  <div class="brand-container">
                     <a href="<?php echo home_url(); ?>" class="brand-logo left"><?php bloginfo( 'name' ); ?></a>
                  </div>
                </div><!-- .left --> 
              </div><!-- .alt-nav -->

              <div class="main-nav hide-on-med-and-down">
                
                <div class="row">
                  <div class="brand-container">
                     <a href="<?php echo home_url(); ?>" class="brand-logo center"><?php bloginfo( 'name' ); ?></a>
                  </div>
                </div><!-- .row -->    
                <div class="row">
                  <div class="brand-description">
                     <p class="center-align"><?php bloginfo( 'description' ); ?></p>
                  </div>
                </div><!-- .row --> 
                <div class="row" style="margin: 0;">
                  
                  <?php
                      wp_nav_menu( array(
                          'theme_location' => 'primary',
                          'container' => false,
                          'menu_class' => 'nav-center',
                          'walker' => new SS_Walker_Nav_Primary()

                      ) );
                  ?>
                  
                  <ul class="right right-lower">
                    <li class="search">
                      <a href="#" class="dropdown-trigger btn-lrg transparent" data-target='dropdown-search'>
                        <i class="material-icons">search</i>
                      </a>
                      
                    </li>
                     <li class="current-cart">
                      <a href="<?php echo get_permalink( woocommerce_get_page_id( 'cart' ) ); ?>" class="cart-trigger btn-lrg transparent" data-target='dropdown-cart'>
                        <i class="material-icons">shopping_cart</i>

                         <span class="header-cart-count"><span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></span>
                      </a>
                    </li>
                  </ul>
                  
                  <ul id='dropdown-search' class='dropdown-content dropdown-search arrow_box'>
                    <li class="nav-search">
                        <?php echo get_search_form(); ?>
                    </li>
                  </ul>
                  
                  <ul id='dropdown-cart' class='dropdown-content dropdown-cart arrow_box'>
                    <li class="nav-cart">
                        <?php woocommerce_mini_cart(); ?>
                    </li>
                  </ul>
                </div><!-- .row -->
              
              </div><!-- .main-nav -->
            </div><!-- .nav-wrapper -->
          </div><!-- .container -->
        </nav><!-- .nav-extended -->
        
        <nav class="scroll-nav lower-nav no-shadows hide-on-med-and-down">
          
          <div class="container">
            
            <div class="nav-wrapper">
              
              <div class="alt-nav-2">
                
                  <?php
                      wp_nav_menu( array(
                          'theme_location' => 'primary',
                          'container' => false,
                          'menu_class' => 'nav-center',
                          'walker' => new SS_Walker_Nav_Primary()

                      ) );
                  ?>
                
                <ul class="right">

                  <li class="search">
                    <a href="#" class="dropdown-trigger btn-lrg transparent" data-target='dropdown-search-alt-2'>
                      <i class="material-icons">search</i>
                    </a>
                    <ul id='dropdown-search-alt-2' class='dropdown-content dropdown-search scroll-search arrow_box'>
                      <li class="nav-search">
                          <?php echo get_search_form(); ?>
                      </li>
                    </ul>
                  </li>
                  <li class="current-cart">
                    <a href="<?php echo get_permalink( woocommerce_get_page_id( 'cart' ) ); ?>" class="cart-trigger btn-lrg transparent" data-target='dropdown-cart-alt-2'>
                      <i class="material-icons">shopping_cart</i>

                       <span class="header-cart-count"><span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span></span>
                    </a>
                    <ul id='dropdown-cart-alt-2' class='dropdown-content dropdown-cart scroll-cart arrow_box'>
                      <li class="nav-cart">
                          <?php woocommerce_mini_cart(); ?>
                      </li>
                    </ul>
                  </li>
                </ul>
                <div class="left">
                  <div class="brand-container">
                     <a href="<?php echo home_url(); ?>" class="brand-logo left"><?php bloginfo( 'name' ); ?></a>
                  </div>
                </div><!-- .left --> 
                
              </div><!-- .alt-nav-2 -->
              
            </div><!-- .nav-wrapper -->
            
          </div><!-- .container -->
          
        </nav><!-- .scroll-nav -->
        
      </header>
