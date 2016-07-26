<?php
/********** Releases Post types ***********/


add_action('init', 'wp_releases_init');

function wp_releases_init(){

	$labels = array(
	'name' => _x('Releases', 'post type general name'),
	'singular_name' => _x('Releases', 'post type singular name'),
	'add_new' => _x('Add New', 'Releases'),
	'add_new_item' => __('Add New Releases'),
	'edit_item' => __('Edit Releases'),
	'new_item' => __('New Releases'),
	'all_items' => __('All Releases'),
	'view_item' => __('View Releases'),
	'search_items' => __('Search Releases'),
	'not_found' =>  __('No Releases found'),
	'not_found_in_trash' => __('No Releases found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => 'Releases'

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => array(
			'slug' => 'cfe-releases'
			),
	'capability_type' => 'page',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','excerpt','thumbnail','page-attributes')
	); 
	register_post_type('wp_releases',$args);
	
	
  	register_taxonomy(
		"releases_category", 
		array("wp_releases"), 
		array("hierarchical" => true, 
		"label" => "Releases Categories", 
		"singular_label" => "Releases Category", 
		"rewrite" => true,
		"sort" => true,
		"args" => array("orderby" => "term_order"))
	); 
}

?>