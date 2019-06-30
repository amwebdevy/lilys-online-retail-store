<?php 

//CONTACT FORM [contact_form]
function ajax_newsletter_form( $atts, $content = null ) {
    $atts = shortcode_atts(
        array(),
        $atts,
        'a_newsletter_form'
    );
    
    ob_start();
    
    include 'templates/newsletterForm.php';
    
    return ob_get_clean();
}

add_shortcode( 'a_newsletter_form', 'ajax_newsletter_form' );