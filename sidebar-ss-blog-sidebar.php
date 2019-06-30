<?php /*

@package simpleshoptheme

*/

if( !is_active_sidebar('ss-blog-sidebar') ) { 
    return; 
}

?>

<div id="archive-sidebar" class="ss-sidebar col s12 m12 l3 xl3 offset-l1 offset-xl1">
    <aside id="secondary" class="widget-area" role="complementary">
        
        <?php dynamic_sidebar('ss-blog-sidebar'); ?>

    </aside> 
</div><!-- #ss-footer-sidebar -->