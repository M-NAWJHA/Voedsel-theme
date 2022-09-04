<?php

function Products_custom_post() {
	$labels = array(
		'name'               => _x( 'products', 'post type general name' ),
		'singular_name'      => _x( 'products', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Products' ),
		'add_new_item'       => __( 'Add New product' ),
		'edit_item'          => __( 'Edit product' ),
		'new_item'           => __( 'New product' ),
		'all_items'          => __( 'All products' ),
		'view_item'          => __( 'View products' ),
		'search_items'       => __( 'Search products' ),
		'not_found'          => __( 'not found' ),
		'not_found_in_trash' => __( 'not found in trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'products'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => '',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'thumbnail','editor' ),
		'has_archive'   => true,
		'exclude_from_search'   => false,
		'show_in_menu'   => true,
		'show_in_nav_menus'   => false
	);
	register_post_type( 'Products', $args );	
}
add_action( 'init', 'Products_custom_post' );

function Products_updated_messages( $messages ) {
	global $post, $post_ID;
	$messages['Products'] = array(
		0 => '', 
		1 => sprintf( __('updated  <a href="%s">view product</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('updated item'),
		3 => __('deleted item'),
		4 => __('updated Product'),
		5 => isset($_GET['revision']) ? sprintf( __('restored product from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('published <a href="%s">view product</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Product saved.'),
		8 => sprintf( __('sented Product <a target="_blank" href="%s">view product</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Dated Product for publication: <strong>%1$s</strong>. <a target="_blank" href="%2$s">view product</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Product saved . <a target="_blank" href="%s"> view product </a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $messages;
}
add_filter( 'Products_post_updated_messages', 'Products_updated_messages' );

?>