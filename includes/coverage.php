<?php
/********** Coverage Post types ***********/


add_action('init', 'wp_coverage_init');

function wp_coverage_init(){

	$labels = array(
	'name' => _x('Coverage', 'post type general name'),
	'singular_name' => _x('Coverage', 'post type singular name'),
	'add_new' => _x('Add New', 'Coverage'),
	'add_new_item' => __('Add New Coverage'),
	'edit_item' => __('Edit Coverage'),
	'new_item' => __('New Coverage'),
	'all_items' => __('All Coverage'),
	'view_item' => __('View Coverage'),
	'search_items' => __('Search Coverage'),
	'not_found' =>  __('No Coverage found'),
	'not_found_in_trash' => __('No Coverage found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => 'Coverage'

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => array(
			'slug' => 'cfe-coverage'
			),
	'capability_type' => 'page',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','excerpt','thumbnail','page-attributes')
	); 
	register_post_type('wp_coverage',$args);
	
	
  	register_taxonomy(
		"coverage_category", 
		array("wp_coverage"), 
		array("hierarchical" => true, 
		"label" => "Coverage Categories", 
		"singular_label" => "Coverage Category", 
		"rewrite" => true,
		"sort" => true,
		"args" => array("orderby" => "term_order"))
	); 
}

?>