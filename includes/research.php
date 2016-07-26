<?php
/********** Research Post types ***********/


add_action('init', 'wp_research_init');

function wp_research_init(){

	$labels = array(
	'name' => _x('Research', 'post type general name'),
	'singular_name' => _x('Research', 'post type singular name'),
	'add_new' => _x('Add New', 'Research'),
	'add_new_item' => __('Add New Research'),
	'edit_item' => __('Edit Research'),
	'new_item' => __('New Research'),
	'all_items' => __('All Research'),
	'view_item' => __('View Research'),
	'search_items' => __('Search Research'),
	'not_found' =>  __('No Research found'),
	'not_found_in_trash' => __('No Research found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => 'Research'

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => array(
			'slug' => 'cfe-research'
			),
	'capability_type' => 'post',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','excerpt','thumbnail','page-attributes')
	); 
	register_post_type('wp_research',$args);
	
	
  	register_taxonomy(
		"research_category", 
		array("wp_research"), 
		array("hierarchical" => true, 
		"label" => "Research Categories", 
		"singular_label" => "Research Category", 
		"rewrite" => true,
		"sort" => true,
		"args" => array("orderby" => "term_order"))
	); 
}
?>