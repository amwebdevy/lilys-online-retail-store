<?php

/*
    Template Name: About Template
*/

get_header(); ?>

  <section class="page-section-1">
    
    <div id="about-banner" class="page-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/page-assets/about/about-banner.jpeg);">
      
      <div class="banner-content right-wrap">
        <h3>About Us</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
nonummy nibh euismod tincidunt ut laoreet dolore magna</p>
      </div>
    
    </div><!-- .page-banner -->
    
    <div class="breadcrumbs">
      
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

  </section><!-- .page-section-1 -->

  <section class="page-section-2">
    
    <div class="container">
    
      <div class="row">
        
        <div class="col s12 l5">
          
          <div class="about-info">
          
            <h2>Our Story</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
            <br/><br/> 
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>    
          
          </div><!-- .about-info -->

        </div>
        
        <div class="col s12 l6 offset-l1">
          
          <div class="about-img">
            <img src="<?php echo get_template_directory_uri(); ?>/img/page-assets/about/our-story.jpeg" alt="" class="responsive-img materialboxed">
          </div>
          
        </div>

      </div><!-- .row-->
    
    </div><!-- .container -->

  </section><!-- .page-section-2 -->

  <section class="page-section-3">
    
    <div class="info-container grey lighten-3">
    
      <div class="container">
        
        <div class="row">
        
          <div class="col s12 l4">
            <h3>Our Mission</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a Finibus Bonorum et Malorum,</p>
          </div>
        
          <div class="col s12 l4">
            <h3>Our Vision</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a Finibus Bonorum et Malorum,</p>
          </div>
          
          <div class="col s12 l4">
            <h3>Our Value</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a Finibus Bonorum et Malorum,</p>
          </div>
          
        </div><!-- .row -->
      
      </div><!-- .container -->
    
    </div><!-- .info-container -->

  </section><!-- .page-section-3 -->

  <section class="page-section-4">
    
    <div class="container">
      
      <div class="row">
      
        <div class="our-team">
          
          <h2>Our Team</h2>
          
          <div class="col s12 m6 l3">
            
            <div class="team">
              <div class="team-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/page-assets/about/team-1.jpeg);">
                
              </div>
              
              <div class="team-info">
                <h3>Example Name</h3>
                <h4>Creative Director</h4>
              </div>
            </div>
            
          </div><!-- .l3 -->
          
          <div class="col s12 m6 l3">
            
            <div class="team">
              <div class="team-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/page-assets/about/team-2.jpeg); background-position: right;">
                
              </div>
              
              <div class="team-info">
                <h3>Example Name</h3>
                <h4>Creative Director</h4>
              </div>
            </div>
            
          </div><!-- .l3 -->
          
          <div class="col s12 m6 l3">
            
            <div class="team">
              <div class="team-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/page-assets/about/team-3.jpeg);">
                
              </div>
              
              <div class="team-info">
                <h3>Example Name</h3>
                <h4>Creative Director</h4>
              </div>
            </div>
            
          </div><!-- .l3 -->
          
          <div class="col s12 m6 l3">
            
            <div class="team">
              <div class="team-img" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/page-assets/about/team-4.jpg); background-position: 15%;">
                
              </div>
              
              <div class="team-info">
                <h3>Example Name</h3>
                <h4>Creative Director</h4>
              </div>
            </div>
            
          </div><!-- .l3 -->
      
        </div><!-- .our-team -->
      
      </div><!-- .row -->

    </div><!-- .container -->

  </section><!-- .page-section-4 -->

  <section class="section-banner">
      
    <div class="hori-banner grey">
      
      <div class="banner-wrap">
      
        <div class="banner-text">
          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
        </div>

        <a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" class="ss-btn-alt">Shop Now</a>
         
      </div><!-- .banner-wrap -->

      <div class="overlay"></div>

    </div><!-- .hori-banner -->
        
  </section><!-- .section-banner -->

  <?php echo do_shortcode("[instagram-feed]"); ?>

<?php get_footer(); ?>