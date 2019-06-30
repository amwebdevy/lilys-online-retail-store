<?php /*

@package simpleshoptheme

*/

if( !is_active_sidebar('shop') ) { 
    return; 
}

?>

<div id="ss-shop-sidebar" class="ss-sidebar col s12 m12 l3 xl3">
    <aside id="secondary" class="widget-area" role="complementary">
        
        <?php dynamic_sidebar('shop'); ?>

    </aside> 
</div><!-- #ss-footer-sidebar -->