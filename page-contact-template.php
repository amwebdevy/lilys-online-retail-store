<?php

/*
    Template Name: Contact Template
*/

get_header(); ?>

  <section class="page-section-1">
    
    <div id="contact-banner" class="page-banner" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/page-assets/contact/contact-banner.jpeg);">
      
      <div class="banner-content right-wrap">
        <h3>Contact Us</h3>
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
        
        <div class="contact-wrap">
          
          <h2>Get In Touch</h2>
        
          <div class="col s12 l5">

            <div class="faq">
                
                <h2>FREQUENTLY ASKED QUESTIONS</h2>
              
                <ul class="collapsible no-shadows">
                  <li>
                    <div class="collapsible-header">Will I receive the same product that I see in the picture?<span class="ss-icon ss-icon-down-arrow"></span></div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                  </li>
                  <li>
                    <div class="collapsible-header">Where can I view my sales receipt?<span class="ss-icon ss-icon-down-arrow"></span></div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                  </li>
                  <li>
                    <div class="collapsible-header">How can I return an item?<span class="ss-icon ss-icon-down-arrow"></span></div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                  </li>                 
                  <li>
                    <div class="collapsible-header">Will you restock items indicated as "out of stock"?<span class="ss-icon ss-icon-down-arrow"></span></div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                  </li>                  
                  <li>
                    <div class="collapsible-header">Where can I ship my order?<span class="ss-icon ss-icon-down-arrow"></span></div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                  </li>
                  
                </ul>
            </div><!-- .faq-->
            
            <ul>
              <li style="display: inline; font-size: 24px; margin-right: 5px;">
                  <a href="#" class="transparent grey-text text-darken-3">
                      <i class="fab fa-facebook"></i>  
                  </a>
              </li>
              <li style="display: inline; font-size: 24px; margin-right: 5px;">
                  <a href="#" class="transparent grey-text text-darken-3">
                      <i class="fab fa-twitter"></i>  
                  </a>
              </li>
              <li style="display: inline; font-size: 24px; margin-right: 5px;">
                  <a href="#" class="transparent grey-text text-darken-3">
                      <i class="fab fa-pinterest"></i>  
                  </a>
              </li>
              <li style="display: inline; font-size: 24px; margin-right: 5px;">
                  <a href="#" class="transparent grey-text text-darken-3">
                      <i class="fab fa-instagram"></i>  
                  </a>
              </li> 
            </ul>

          </div>

          <div class="col s12 l6 offset-l1">

            <div class="contact-info">

              <ul>
                <li>
                  <i class="material-icons">location_on</i> 
                  Address: 1234 Street Name, City Name, United States
                </li>
                <li>
                  <i class="material-icons">phone</i> 
                  Phone: (123) 456-7890
                </li>
                <li>
                  <i class="material-icons">email</i> 
                  Email: temporary@email.com
                </li>
              </ul>

            </div><!-- .contact-info -->

            <div class="contact-form">

            <form id="ssContactForm" class="ss-contact-form" action="" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
              <div class="input-field form-group col s12 m6">
                <input type="text" class="validate" placeholder="Name" id="name" name="name">
                <small class="text-danger form-control-msg">Your Name is Required</small> 
              </div>
              <div class="input-field form-group col s12 m6">
                <input type="email" class="validate" placeholder="Email" id="email" name="email">
                <small class="text-danger form-control-msg">Your Email is Required</small>
              </div>

              <div class="input-field form-group col s12">
                <textarea name="message" id="message" class="validate" placeholder="Message"></textarea>
                <small class="text-danger form-control-msg">A Message is Required</small>
              </div>
              
              <div class="submit-container">
                
                <button type="submit" class="ss-btn ss-submit">Send</button>
                
                <small class="text-info form-control-msg js-form-submission">Submission in process, please wait..</small>
                <small class="text-success form-control-msg js-form-success">Message successfully submitted, thank you!</small>
                <small class="text-danger form-control-msg js-form-error">There was a problem with the Contact Form, please try again!</small>
          
              </div>
              
            </form>

            </div><!-- .contact-form -->

          </div>
        
        </div><!-- .contact-wrap -->   

      </div><!-- .row-->
    
    </div><!-- .container -->

  </section><!-- .page-section-2 -->

  <section class="page-section-3">

  </section><!-- .page-section-3 -->

  <?php echo do_shortcode("[wpgmza id='1']"); ?>

  <?php echo do_shortcode("[instagram-feed]"); ?>

<?php get_footer(); ?>