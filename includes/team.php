<?php
/********** Team Post types ***********/


add_action('init', 'wp_team_init');

function wp_team_init(){

	$labels = array(
	'name' => _x('Team', 'post type general name'),
	'singular_name' => _x('Team', 'post type singular name'),
	'add_new' => _x('Add New', 'Team'),
	'add_new_item' => __('Add New Team'),
	'edit_item' => __('Edit Team'),
	'new_item' => __('New Team'),
	'all_items' => __('All Team'),
	'view_item' => __('View Team'),
	'search_items' => __('Search Team'),
	'not_found' =>  __('No Team found'),
	'not_found_in_trash' => __('No Team found in Trash'), 
	'parent_item_colon' => '',
	'menu_name' => 'Team/Advisors'

	);
	$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true, 
	'show_in_menu' => true, 
	'query_var' => true,
	'rewrite' => array(
			'slug' => 'cfe-team'
			),
	'capability_type' => 'post',
	'has_archive' => true, 
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','excerpt','thumbnail')
	); 
	register_post_type('cfe_team',$args);
}
?>