<?php
add_action( 'wp_enqueue_scripts', 'twentytwenty_parent_styles' );
function twentytwenty_parent_styles() {
	wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri().'/slick.css' );
 	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

add_action( 'wp_enqueue_scripts', 'twentytwenty_child_scripts' );
function twentytwenty_child_scripts() {
	wp_enqueue_script( 'jqery', get_stylesheet_directory_uri() . '/js/jquery.min.js', array( 'jquery' ), false, true );
 	wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/js/slick.min.js', array( 'jquery' ), false, true );
 	wp_enqueue_script( 'twentytwenty-child', get_stylesheet_directory_uri() . '/js/custom-js.js', array( 'jquery' ), false, true );
}



add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
  $path = get_stylesheet_directory() . '/acf-json';
  return $path;
}


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Header & Footer Logo',
		'menu_title'	=> 'Header & Footer Logo',
		'menu_slug' 	=> 'theme-header-footer-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Social Menu',
		'menu_title'	=> 'Social Menu',
		'menu_slug' 	=> 'theme-social-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Top Banner',
		'menu_title'	=> 'Top Banner',
		'menu_slug' 	=> 'theme-banner-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

