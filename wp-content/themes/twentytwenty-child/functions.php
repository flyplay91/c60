<?php

// Disable default color setting
add_filter( 'theme_mod_accent_accessible_colors', 'op_change_default_colours', 10, 1 );

/**
 * Override the colours added in the customiser.
 *
 * @param array $default An array of the key colours being used in the theme.
 */
function op_change_default_colours( $default ) {

    $default = array(
        'content'       => array(
            'text'      => '#2F024A',
            'accent'    => '#6b2c90',
            'secondary' => '#6d6d6d',
            'borders'   => '#dcd7ca',
        )
    );

    return $default;
}

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

	acf_add_options_page(array(
		'page_title' 	=> 'Footer Options',
		'menu_title'	=> 'Footer Options',
		'menu_slug' 	=> 'theme-footer-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

add_shortcode('home_blogs', 'HomeBlogs');
function HomeBlogs() { ?>
	<div class="home-blog__block">
		<div class="home-blog__block-item" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-blog-1.png);">
			<a href="">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-blog-player.png">
			</a>
		</div>
		<div class="home-blog__block-item" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-blog-2.jpg);">
			<a href="">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-blog-player.png">
			</a>
		</div>
		<div class="home-blog__block-item" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-blog-3.jpg);">
			<a href="">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-blog-player.png">
			</a>
		</div>
		<div class="home-blog__block-item" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-blog-4.jpg);">
			<a href="">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-blog-player.png">
			</a>
		</div>
		<div class="home-blog__block-item" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-blog-5.jpeg);">
			<a href="">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-blog-player.png">
			</a>
		</div>
		
	</div>
<?php }

// Homepage proudct add to cart action
add_action( 'wp_ajax_nopriv_variation_to_cart', 'product_variation_add_to_cart' );
add_action( 'wp_ajax_variation_to_cart', 'product_variation_add_to_cart' );
function product_variation_add_to_cart() {
    if( isset($_POST['pid']) && $_POST['pid'] > 0 ){
        $product_id   = (int) $_POST['pid'];
        $variation_id = (int) $_POST['vid'];
        $quantity     = (int) $_POST['qty'];
        $variation    = '';
        WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation );
        echo true;
    }
    die();
}

// Disable product page image zoom
add_action( 'after_setup_theme', 'remove_pgz_theme_support', 100 );
function remove_pgz_theme_support() { 
	remove_theme_support( 'wc-product-gallery-zoom' );
}

// Delete additional information tab on product page.
add_filter( 'woocommerce_product_tabs', 'bbloomer_remove_product_tabs', 9999 );
function bbloomer_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}

// Remove short description in product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
function woocommerce_template_single_excerpt() {
	return;
}

// Remove price in product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

// Change Choose your option to Size in variant dropdown
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'cinchws_filter_dropdown_args', 10 );
function cinchws_filter_dropdown_args( $args ) {
    $args['show_option_none'] = 'Size';
    return $args;
}

// Customize subscription variant in product page
function wc_all_the_products_modify_subscription_option( $description ) {
	$description = 'Subscribe & Save: <br />' . $description;

	return $description;
}
function wc_all_the_products_modify_single_option( $description, WC_Product $product ) {
    $description .= ': <br />' . wc_price( $product->get_price() );

	return $description;
}

add_filter( 'wcsatt_single_product_subscription_option_description', 'wc_all_the_products_modify_subscription_option' );
add_filter( 'wcsatt_single_product_one_time_option_description', 'wc_all_the_products_modify_single_option', 10, 2 );

// Remove product meta in product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Remove related product in product page
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
