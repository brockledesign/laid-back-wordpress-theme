<?php
/**
 * Custom Post Types
 *
 * @package laid_back
 */

 /*
 * POST TYPE - Project
 */
function laid_back_projects_post_type() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'laid-back' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'laid-back' ),
		'menu_name'             => __( 'Projects', 'laid-back' ),
		'name_admin_bar'        => __( 'Project', 'laid-back' ),
		'archives'              => __( 'Project Archives', 'laid-back' ),
		'attributes'            => __( 'Project Attributes', 'laid-back' ),
		'parent_item_colon'     => __( 'Parent Project:', 'laid-back' ),
		'all_items'             => __( 'All Projects', 'laid-back' ),
		'add_new_item'          => __( 'Add New Project', 'laid-back' ),
		'add_new'               => __( 'Add New', 'laid-back' ),
		'new_item'              => __( 'New Project', 'laid-back' ),
		'edit_item'             => __( 'Edit Project', 'laid-back' ),
		'update_item'           => __( 'Update Project', 'laid-back' ),
		'view_item'             => __( 'View Project', 'laid-back' ),
		'view_items'            => __( 'View Projects', 'laid-back' ),
		'search_items'          => __( 'Search Project', 'laid-back' ),
		'not_found'             => __( 'Not found', 'laid-back' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'laid-back' ),
		'featured_image'        => __( 'Featured Image', 'laid-back' ),
		'set_featured_image'    => __( 'Set featured image', 'laid-back' ),
		'remove_featured_image' => __( 'Remove featured image', 'laid-back' ),
		'use_featured_image'    => __( 'Use as featured image', 'laid-back' ),
		'insert_into_item'      => __( 'Insert into item', 'laid-back' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'laid-back' ),
		'items_list'            => __( 'Projects list', 'laid-back' ),
		'items_list_navigation' => __( 'Projects list navigation', 'laid-back' ),
		'filter_items_list'     => __( 'Filter items list', 'laid-back' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'laid-back' ),
		'description'           => __( 'Project post type', 'laid-back' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions'),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'           	=> 'dashicons-media-spreadsheet',
		'rewrite'				=> array('slug' => 'projects', )
	);
	register_post_type( 'property_projects', $args );

}
add_action( 'init', 'laid_back_projects_post_type', 0 );
