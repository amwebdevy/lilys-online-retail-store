jQuery(document).ready(function($){
  
  //WAYPOINTS
  var firstSection = $('header').next('section, div.content-area, div.woocommerce');
  var scrollNav = $('.scroll-nav');
  
  firstSection.waypoint(function (direction) {
    if(direction == 'down') {
      scrollNav.addClass('content-appear');
    } else {
      scrollNav.removeClass('content-appear');
    }
  });
  
  //WAYPOINTS + ANIMATE.CSS
  var categories = $('.categories-grid');
    
  categories.waypoint(function() {
    categories.addClass('fadeInUp');

  }, { offset: '80%'});
  
  //WAYPOINTS + ANIMATE.CSS
  var newArrivals = $('.landing-new');
    
  newArrivals.waypoint(function() {
    newArrivals.addClass('fadeInUp');

  }, { offset: '90%'});
  
  //WAYPOINTS + ANIMATE.CSS
  var landingBanner = $('.landing-banner');
    
  landingBanner.waypoint(function() {
    landingBanner.addClass('fadeInUp');

  }, { offset: '90%'});
  
  //WAYPOINTS + ANIMATE.CSS
  var latestBlog = $('.landing-blog');
    
  latestBlog.waypoint(function() {
    latestBlog.addClass('fadeInUp');

  }, { offset: '100%'});
  
  
  //MATERIALIZE SLIDER
  $('#landing').slider( {
    indicators: false,
    height: 500,
    interval: 9000
  });
  
  //GALLERY POST CAROUSEL
  $('#gallery-carousel').carousel();
  
  //MATERIAL BOX (LIGHTBOX)
  $('.materialboxed').materialbox();
  
  //MATERIALIZE DROPDOWN
  $(".dropdown-trigger").dropdown({
    hover: true,
    coverTrigger: false
  });
  
  //MATERIALIZE COLLAPSIBILE ELEMENT
  $('.collapsible').collapsible();
  
  //MATERIALIZE DROPDOWN
  $('.dropdown-trigger').dropdown({
    constrainWidth: false,
    coverTrigger: false,
    closeOnClick : false,
    alignment: 'right',
    autoTrigger : false,
  });
  
  $('.cart-trigger').dropdown({
    constrainWidth: false,
    coverTrigger: false,
    closeOnClick : false,
    alignment: 'right',
    hover : true,
    autoTrigger : false,
    
  });
  
    //MATERIALIZE DROPDOWN
  $('.dropdown-trigger-alt').dropdown({
    constrainWidth: false,
    coverTrigger: false,
    closeOnClick : false,
    alignment: 'right',
    autoTrigger : false,
  });
  
  $('.cart-trigger-alt').dropdown({
    constrainWidth: false,
    coverTrigger: false,
    closeOnClick : false,
    alignment: 'right',
    hover : true,
    autoTrigger : false,
    
  });
  
  //MATERIALIZE DROPDOWN
  $('.dropdown-trigger-alt-2').dropdown({
    constrainWidth: false,
    coverTrigger: false,
    closeOnClick : false,
    alignment: 'right',
    autoTrigger : false,
  });
  
  $('.cart-trigger-alt-2').dropdown({
    constrainWidth: false,
    coverTrigger: false,
    closeOnClick : false,
    alignment: 'right',
    hover : true,
    autoTrigger : false,
    
  });
  
  //MATERIALIZE SIDENAV
  $('.sidenav').sidenav();
  
  //CATEGORY DROPDOWN TOGGLE
  	$( ".widget_product_categories .product-categories .sub-toggle" ).click(function () {
		$(this).toggleClass("sub-open");
      
        if ( $(this).hasClass('sub-open') ) {
          $(this).children( 'i' ).text('remove');
        } else {
          $(this).children( 'i' ).text('add');
        }
        
	});
  
  	$('.widget_product_categories .product-categories > .cat-item.cat-parent').each(function(){
		if($(this).is('.current-cat, .current-cat-parent')) {
			$(this).children('.sub-toggle').toggleClass("sub-open");
		} 
	});
  
      //SINGLE PRODUCT QUANTITY BUTTONS
      if ( $('body').hasClass('single-product') ) {
        
        $('form.cart').on( 'click', 'button.plus, button.minus', function() {

          // Get current quantity values
          var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
          var val = parseFloat(qty.val());
          var max = parseFloat(qty.attr( 'max' ));
          var min = parseFloat(qty.attr( 'min' ));
          var step = parseFloat(qty.attr( 'step' ));

          // Change the value if plus or minus
          if ( $( this ).is( '.plus' ) ) {
              if ( max && ( max <= val ) ) {
                  qty.val( max );
              } else {
                  qty.val( val + step );
              }
          } else {
              if ( min && ( min >= val ) ) {
                  qty.val( min );
              } else if ( val > 1 ) {
                  qty.val( val - step );
              }
          }

      });
    }
  
      //CART PAGE QUANTITY BUTTONS
      if ( $('body').hasClass('woocommerce-cart') ) {
          
        $('td.product-quantity button.plus, td.product-quantity button.minus').on( 'click', function() {

          // Get current quantity values
          var qty = $( this ).closest('.quantity').find( '.qty' );
          var val = parseFloat(qty.val());
          var max = parseFloat(qty.attr( 'max' ));
          var min = parseFloat(qty.attr( 'min' ));
          var step = parseFloat(qty.attr( 'step' ));

          // Change the value if plus or minus
          if ( $( this ).is( '.plus' ) ) {
              if ( max && ( max <= val ) ) {
                  qty.val( max );
              } else {
                  qty.val( val + step );
              }
            $('.actions button[name="update_cart"]').removeAttr('disabled');
          } else {
              if ( min && ( min >= val ) ) {
                  qty.val( min );
              } else if ( val > 1 ) {
                  qty.val( val - step );
              }
            $('.actions button[name="update_cart"]').removeAttr('disabled');
          }
          
      });
      //CART PAGE QUANTITY BUTTONS (AJAX UPDATE FIX)
      $(document).ajaxComplete(function(){
        
        $('.quantity').off('click', '.plus').on('click', '.plus', function(e) {        
          $input = $(this).prev('input.qty');
          var val = parseInt($input.val());
          $input.val( val+1 ).change();
        });

        $('.quantity').off('click', '.minus').on('click', '.minus', function(e) {       
          $input = $(this).next('input.qty');
          var val = parseInt($input.val());
          if (val > 1) {
            $input.val( val-1 ).change();
          }
        });
        
      });
        
    }
  
    //APPLY CLASS TO VIDEO IFRAME PARENT (SINGLE VIDEO POST FORMAT)
    if ($('.single-format-video .entry-content iframe').length > 0) {
      $('iframe').parent().addClass('embed-wrap');
    }

    //CONTACT FORM SUBMISSION 
    $('#ssContactForm').on('submit', function(e){
        e.preventDefault();
            
        $('.has-error').removeClass('has-error'); 
        $('.js-show-feedback').removeClass('js-show-feedback');  
        
        var form = $(this); 
        
        var name = form.find('#name').val(),
            email = form.find('#email').val(),
            message = form.find('#message').val();
        
        var ajaxurl = form.data('url'); 
        
        /* JS FORM VALIDAITON */
        if( name === '' ) {
            $('#name').parent('.form-group').addClass('has-error'); 
            return; 
        }
        
        if( email === '' ) {
            $('#email').parent('.form-group').addClass('has-error'); 
            return; 
        } 
        
        if( message === '' ) {
            $('#message').parent('.form-group').addClass('has-error'); 
            return; 
        }
      
        form.find('input, button, textarea').attr('disabled', 'disabled'); 
       
        $('.js-form-submission').addClass('js-show-feedback'); 
        
        $.ajax({ 
            
            url : ajaxurl,
            type : 'post',  
            data : { 
                
                name : name,
                email : email, 
                message : message, 
                action : 'ss_save_user_contact_form' 
                
            },
            error : function( response ) { 
                $('.js-form-submission').removeClass('js-show-feedback');
                $('.js-form-error').addClass('js-show-feedback'); 
                form.find('input, button, textarea').removeAttr('disabled'); 
            }, 
            success : function( response ) { 
                if( response == 0 ) { 
                    
                    setTimeout(function() {                      
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-error').addClass('js-show-feedback'); 
                        form.find('input, button, textarea').removeAttr('disabled');
                    }, 1500);

                } else {
                    
                   setTimeout(function(){
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-success').addClass('js-show-feedback'); 
                        form.find('input, button, textarea').removeAttr('disabled').val(''); 
                   }, 1500);        
                }
            }
            
        }); 
        
    });
  
  
});
