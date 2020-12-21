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

	acf_add_options_page(array(
		'page_title' 	=> 'Footer Options',
		'menu_title'	=> 'Footer Options',
		'menu_slug' 	=> 'theme-footer-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_shortcode('home_products', 'HomeProducts');
function HomeProducts() { ?>
	<div class="home-product__items">
		<div class="home-product__items-item">
			<div class="home-product-title-des">
				<a href="/c60-oil/c60-mct-coconut-oil/">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-product-1.png" alt="C60 in Coconut Oil">
				</a>
				<div class="home-product-title">
					<label><a href="/c60-oil/c60-olive-oil/">C60 in Organic Extra Virgin Olive Bundle</a></label>
					<div class="home-product-content">
						<div class="home-product-content-left">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/star_5.png" alt="C60 Purple Power Rating">
							<a href="/c60-oil/c60-mct-coconut-oil/"><span>Starting at $49</span></a>
						</div>
						<div class="home-product-content-right">
							<div class="home-product-select-btn">
								<label>Select Option</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="home-product-cart">
				<div class="home-cart-block">
					<div class="home-cart-item">
						<label>2 oz - $49 / $39.20 mo</label>
						<a data-product_id="9275" data-variation_id="152113" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
					<div class="home-cart-item">
						<label>4 oz - $97 / $77.60 mo</label>
						<a data-product_id="9275" data-variation_id="150913" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
					<div class="home-cart-item">
						<label>8 oz - $190 / $152.00 mo</label>
						<a data-product_id="9275" data-variation_id="150915" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
					<div class="home-cart-item">
						<label>16 oz - $370 / $296.00 mo</label>
						<a data-product_id="9275" data-variation_id="150917" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
				</div>
			</div>
		</div>
		<div class="home-product__items-item">
			<div class="home-product-title-des">
				<a href="/c60-oil/c60-avocado-oil/">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-product-2.png" alt="Organic C60 Avocado Oil">
				</a>
				<div class="home-product-title">
					<label><a href="/c60-oil/c60-avocado-oil/">C60 in Organic Avocado Oil Bundle</a></label>
					<div class="home-product-content">
						<div class="home-product-content-left">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/star_5.png" alt="C60 Purple Power Rating">
							<a href="/c60-oil/c60-avocado-oil/"><span>Starting at $49</span></a>
						</div>
						<div class="home-product-content-right">
							<div class="home-product-select-btn">
								<label>Select Option</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="home-product-cart">
				<div class="home-cart-block">
					<div class="home-cart-item">
						<label>2 oz - $49 / $39.20 mo</label>
						<a data-product_id="9272" data-variation_id="152104" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
					<div class="home-cart-item">
						<label>4 oz - $97 / $77.60 mo</label>
						<a data-product_id="9272" data-variation_id="150948" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
					<div class="home-cart-item">
						<label>8 oz - $190 / $152.00 mo</label>
						<a data-product_id="9272" data-variation_id="150950" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
					<div class="home-cart-item">
						<label>16 oz - $370 / $296.00 mo</label>
						<a data-product_id="9272" data-variation_id="150952" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
				</div>
			</div>
		</div>
		<div class="home-product__items-item">
			<div class="home-product-title-des">
				<a href="/c60-oil/c60-olive-oil/">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/home-product-3.png" alt="C60 Extra Virgin Olive Oil">
				</a>
				<div class="home-product-title">
					<label><a href="/c60-oil/c60-olive-oil/">C60 in Organic Extra Virgin Olive Bundle</a></label>
					<div class="home-product-content">
						<div class="home-product-content-left">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/star_5.png" alt="C60 Purple Power Rating">
							<a href="/c60-oil/c60-olive-oil/"><span>Starting at $49</span></a>
						</div>
						<div class="home-product-content-right">
							<div class="home-product-select-btn">
								<label>Select Option</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="home-product-cart">
				<div class="home-cart-block">
					<div class="home-cart-item">
						<label>2 oz - $49 / $39.20 mo</label>
						<a data-product_id="114057" data-variation_id="152093" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
					<div class="home-cart-item">
						<label>4 oz - $97 / $77.60 mo</label>
						<a data-product_id="114057" data-variation_id="152074" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
					<div class="home-cart-item">
						<label>8 oz - $190 / $152.00 mo</label>
						<a data-product_id="114057" data-variation_id="152076" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
					<div class="home-cart-item">
						<label>16 oz - $370 / $296.00 mo</label>
						<a data-product_id="114057" data-variation_id="152078" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
						<a href="" class="home-product-cart-btn">Subscribe</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php }

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
