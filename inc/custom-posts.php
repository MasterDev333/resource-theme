<?php
/**
 * Custom posts for use with this theme
 */

add_action( 'init', 'custom_post_type', 0 );
/**
 * Register Custom Post Type
 */
function custom_post_type() {
	// Register Work Custom Post Type
	$labels = array(
		'name'                  => _x( 'Works', 'works', 'am' ),
		'singular_name'         => _x( 'Work', 'work', 'am' ),
		'menu_name'             => __( 'Works', 'am' ),
		'name_admin_bar'        => __( 'Works', 'am' ),
		'archives'              => __( 'Works Archives', 'am' ),
		'attributes'            => __( 'Works Attributes', 'am' ),
		'parent_item_colon'     => __( 'Parent Works:', 'am' ),
		'all_items'             => __( 'All Works', 'am' ),
		'add_new_item'          => __( 'Add Work', 'am' ),
		'add_new'               => __( 'Add Work', 'am' ),
		'new_item'              => __( 'New Work', 'am' ),
		'edit_item'             => __( 'Edit Work', 'am' ),
		'update_item'           => __( 'Update Work', 'am' ),
		'view_item'             => __( 'View Work', 'am' ),
		'view_items'            => __( 'View Works', 'am' ),
		'search_items'          => __( 'Search Works', 'am' ),
		'not_found'             => __( 'Not found', 'am' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'am' ),
		'featured_image'        => __( 'Featured Image', 'am' ),
		'set_featured_image'    => __( 'Set featured image', 'am' ),
		'remove_featured_image' => __( 'Remove featured image', 'am' ),
		'use_featured_image'    => __( 'Use as featured image', 'am' ),
		'insert_into_item'      => __( 'Insert into Work', 'am' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Work', 'am' ),
		'items_list'            => __( 'Works list', 'am' ),
		'items_list_navigation' => __( 'Works list navigation', 'am' ),
		'filter_items_list'     => __( 'Filter Works list', 'am' ),
	);
	$args   = array(
		'label'               => __( 'Works', 'am' ),
		'description'         => __( 'Works post type', 'am' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'custom-fields', 'page-attributes', 'thumbnail', 'excerpt', 'category' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'work', $args );

	// Register Sector Custom Post Type
	$labels = array(
		'name'                  => _x( 'Sectors', 'sectors', 'am' ),
		'singular_name'         => _x( 'Sector', 'work', 'am' ),
		'menu_name'             => __( 'Sectors', 'am' ),
		'name_admin_bar'        => __( 'Sectors', 'am' ),
		'archives'              => __( 'Sectors Archives', 'am' ),
		'attributes'            => __( 'Sectors Attributes', 'am' ),
		'parent_item_colon'     => __( 'Parent Sectors:', 'am' ),
		'all_items'             => __( 'All Sectors', 'am' ),
		'add_new_item'          => __( 'Add Sector', 'am' ),
		'add_new'               => __( 'Add Sector', 'am' ),
		'new_item'              => __( 'New Sector', 'am' ),
		'edit_item'             => __( 'Edit Sector', 'am' ),
		'update_item'           => __( 'Update Sector', 'am' ),
		'view_item'             => __( 'View Sector', 'am' ),
		'view_items'            => __( 'View Sectors', 'am' ),
		'search_items'          => __( 'Search Sectors', 'am' ),
		'not_found'             => __( 'Not found', 'am' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'am' ),
		'featured_image'        => __( 'Featured Image', 'am' ),
		'set_featured_image'    => __( 'Set featured image', 'am' ),
		'remove_featured_image' => __( 'Remove featured image', 'am' ),
		'use_featured_image'    => __( 'Use as featured image', 'am' ),
		'insert_into_item'      => __( 'Insert into Sector', 'am' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Sector', 'am' ),
		'items_list'            => __( 'Sectors list', 'am' ),
		'items_list_navigation' => __( 'Sectors list navigation', 'am' ),
		'filter_items_list'     => __( 'Filter Sectors list', 'am' ),
	);
	$args   = array(
		'label'               => __( 'Sectors', 'am' ),
		'description'         => __( 'Sectors post type', 'am' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'custom-fields', 'page-attributes', 'thumbnail', 'excerpt' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'sector', $args );
}
