<?php
/*

@package simpleshoptheme

*/

/*
    ===================================
        FRONT-END ENQUEUE FUNCTIONS 
    ===================================
*/

function ss_load_scripts() {
  
  //REGISTER CSS
  wp_enqueue_style( 'animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css');
  
  wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css');
  
  wp_enqueue_style( 'materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css');
  
  wp_enqueue_style( 'simpleshop', get_template_directory_uri() . '/css/simpleshop.css', array(), '1.0.0', 'all' );
    
  wp_enqueue_style( 'material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons' );
  
  wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Dancing+Script:700|Poppins:400,700' );
  
  
  //REGISTER JS 
  wp_deregister_script( 'jquery' ); 
  wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, '3.3.1', true ); 
  
  wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/vendor/jquery.waypoints.min.js', array('jquery'), '1.0.0', true );
  
  wp_enqueue_script( 'materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js', array('jquery'), '1.0.0', true ); 
  
  wp_enqueue_script( 'simpleshop', get_template_directory_uri() . '/js/simpleshop.js', array('jquery'), '1.0.0', true );
  
  //Comments reply js 
  if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') ) {
    wp_enqueue_script( 'comment-reply' );
  }
  	
}

add_action( 'wp_enqueue_scripts', 'ss_load_scripts' );
