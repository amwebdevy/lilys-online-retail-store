<?php /*

@package simpleshoptheme

*/

if( !is_active_sidebar('ss-footer-sidebar') ) { 
    return; 
}

?>

<div id="ss-footer-sidebar" class="ss-sidebar">
    <aside id="secondary" class="widget-area" role="complementary">
        
        <?php dynamic_sidebar('ss-footer-sidebar'); ?>

    </aside> 
</div><!-- #ss-footer-sidebar -->