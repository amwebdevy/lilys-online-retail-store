<?php
/*

@package simpleshoptheme

    ===================================
        WALKER NAV CLASS
    ===================================
*/

class SS_Walker_Nav_Primary extends Walker_Nav_menu {
	
	function start_lvl( &$output, $depth = 0, $args = array() ){ //ul
		$indent = str_repeat("\t",$depth);
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul id=\"dropdown$depth\" class=\"dropdown-menu$submenu dropdown-content no-shadows depth_$depth\">\n";
	}
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span
		
		$indent = ( $depth ) ? str_repeat("\t",$depth) : '';
		
		$li_attributes = '';
		$class_names = $value = '';
		
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		// $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if( $depth && $args->walker->has_children ){
			$classes[] = 'dropdown-submenu';
		}
		
		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr($class_names) . '"';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
		
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
		
		$attributes .= ( $args->walker->has_children ) ? ' class="dropdown-trigger" data-target="dropdown' . $depth . '"' : '';
		
		$item_output = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <i class="material-icons right">arrow_drop_down</i></a>' : '</a>';
		$item_output .= $args->after;
		
		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}	
}
  
/*
    ===================================
        WC CATEGORY LIST WALKER
    ===================================
*/

include_once get_template_directory() . '/woocommerce/includes/walkers/class-wc-product-cat-list-walker.php';
  
class SS_Product_Cat_List_Walker extends SO_Product_Cat_List_Walker {
  
  public $tree_type = 'product_cat';
  public $db_fields = array ( 'parent' => 'parent', 'id' => 'term_id', 'slug' => 'slug' );

  public function start_el( &$output, $cat, $depth = 0, $args = array(), $current_object_id = 0 ) {
      $parent_toggle = '';
      $output .= '<li class="cat-item cat-item-' . $cat->term_id;

      if ( $args['current_category'] == $cat->term_id ) {
          $output .= ' current-cat';
      }

      if ( $args['has_children'] && $args['hierarchical'] ) {
          $output .= ' cat-parent';
        
          $parent_toggle .= '<span class="sub-toggle right"><i class="material-icons">add</i></span>';
      }

      if ( $args['current_category_ancestors'] && $args['current_category'] && in_array( $cat->term_id, $args['current_category_ancestors'] ) ) {
          $output .= ' current-cat-parent';
      }

      $output .=  '"><a href="' . get_term_link( (int) $cat->term_id, $this->tree_type ) . '">' . __( $cat->name, 'woocommerce' ) . '</a>';

      if ( $args['show_count'] ) {
          $output .= ' <span class="count">(' . $cat->count . ')</span>' . $parent_toggle;
      }
  }
}

//Filter Walker 
function ss_product_categories_widget_args($args) {
    $args['walker'] = new SS_Product_Cat_List_Walker;
    return $args;
}
  
add_filter('woocommerce_product_categories_widget_args', 'ss_product_categories_widget_args', 10, 1);
