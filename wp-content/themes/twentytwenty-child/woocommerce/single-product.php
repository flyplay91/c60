<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<main class="product-page">

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		// do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>
		
		<?php
			if (get_field('related_product_group') != null) {
				$related_product_group = get_field('related_product_group');
				$related_product_sub_heading = $related_product_group['sub_heading'];
				$related_product_heading = $related_product_group['heading'];
				$related_first_product_img_url = $related_product_group['first_product_image']['url'];
				$related_first_product_img_alt = $related_product_group['first_product_image']['alt'];
				$related_first_product_title = $related_product_group['first_product_title'];
				$related_first_product_link = $related_product_group['first_product_link'];
				$related_first_product_id = $related_product_group['first_product_id'];
				$related_second_product_img_url = $related_product_group['second_product_image']['url'];
				$related_second_product_img_alt = $related_product_group['second_product_image']['alt'];
				$related_second_product_title = $related_product_group['second_product_title'];
				$related_second_product_link = $related_product_group['second_product_link'];
				$related_second_product_id = $related_product_group['second_product_id'];
				$related_third_product_img_url = $related_product_group['third_product_image']['url'];
				$related_third_product_img_alt = $related_product_group['third_product_image']['alt'];
				$related_third_product_title = $related_product_group['third_product_title'];
				$related_third_product_link = $related_product_group['third_product_link'];
				$related_third_product_id = $related_product_group['third_product_id'];

				$related_first_product = wc_get_product( $related_first_product_id );
				$related_first_product_type = $related_first_product->get_type();


				if ($related_first_product_type == 'variable') {
					$related_first_product_available_variations = $related_first_product->get_available_variations();
					$fromRelated_first_product_price = $related_first_product_available_variations[0]['display_price']; 
					$toRelated_first_product_price = end($related_first_product_available_variations)['display_price'];
					$related_first_product_price = wc_price($fromRelated_first_product_price) . ' - '. wc_price($toRelated_first_product_price);
				} else {
					$related_first_product_price = wc_price($related_first_product->get_price());
				}

				$related_second_product = wc_get_product( $related_second_product_id );
				$related_second_product_type = $related_second_product->get_type();
				if ($related_second_product_type == 'variable') {
					$related_second_product_available_variations = $related_second_product->get_available_variations();
					$fromRelated_second_product_price = $related_second_product_available_variations[0]['display_price']; 
					$toRelated_second_product_price = end($related_second_product_available_variations)['display_price'];
					$related_second_product_price = wc_price($fromRelated_second_product_price) . ' - ' . wc_price($toRelated_second_product_price);
				} else {
					$related_second_product_price = wc_price($related_second_product->get_price());
				}

				$related_third_product = wc_get_product( $related_third_product_id );
				$related_third_product_type = $related_third_product->get_type();
				
				if ($related_third_product_type == 'variable') {
					$related_third_product_available_variations = $related_third_product->get_available_variations();
					$fromRelated_third_product_price = $related_third_product_available_variations[0]['display_price']; 
					$toRelated_third_product_price = end($related_third_product_available_variations)['display_price'];
					$related_third_product_price = wc_price($fromRelated_third_product_price) . ' - ' . wc_price($toRelated_third_product_price);
				} else {
					$related_third_product_price = wc_price($related_third_product->get_price());
				}

			}
			
		?>

        <!-- <section class="home-more">
			<div class="home-more__inner inner-section-1366">
				<h2 class="home-more__title">Learn More</h2>
				<?php echo do_shortcode('[home_blogs]'); ?>
			</div>
        </section> -->

		<?php if( have_rows('related_product_group')) : ?>
			<?php while ( have_rows('related_product_group')): the_row(); ?>
			<section class="related-products">
				<div class="inner-section-1220 related-products__inner">
					<h4 class="related-product__sub_heading"><?php echo $related_product_sub_heading ?></h4>
					<h2 class="related-product__title"><?php echo $related_product_heading ?></h2>
					<div class="related-product__items">
						<div class="related-product__items-item">
							<div class="related-product-title-des">
								<a href="<?php echo $related_first_product_link ?>">
									<img src="<?php echo $related_first_product_img_url ?>" alt="<?php echo $related_first_product_img_alt ?>">
								</a>
								<div class="related-product-title">
									<label><a href="<?php echo $related_first_product_link ?>"><?php echo $related_first_product_title ?></a></label>
									<span class="related-product-price"><?php echo $related_first_product_price ?></span>
									
									<div class="related-product-content">
										<div class="related-product-content-left">
											<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/star_5.png" alt="C60 Purple Power Rating">
										</div>
										<div class="related-product-content-right">
											<!-- <a href="<?php echo $related_first_product_link ?>">
												<div class="related-product-select-btn">
													<label>Add To Cart</label>
												</div>
											</a> -->
											<?php
											if ( ! $related_first_product->is_in_stock() ) { ?>
												<a href="javascript:void(0)" class="btn-shop-add-cart-no-qty" data-product_id="<?php echo $related_first_product_id ?>">Out of Stock</a>
											<?php } else {
												if( $related_first_product->has_child() ) { ?>
													<div class="shop-variant-select">
														<a href="javascript: void(0)" class="button product_type_variable add_to_cart_button shop-add-cart">Select options</a>
														<div class="shop-variant-items">
															<?php
																if ( ( $variations = $related_first_product->get_children() ) ) {
																	foreach ( $variations as $variationId ) {
																		$variation = new WC_Product_Variation($variationId);
																		$variationName = implode(" / ", $variation->get_variation_attributes());
																		$variationPrice = $variation->get_price();
																	?>
																		<div class="shop-variant-item">
																			<label><?php echo $variationName . ' - $' . $variationPrice; ?></label>
																			<a href="javascript:void(0)" class="btn-shop-add-cart" data-product_id="<?php echo $related_first_product_id ?>" data-variant_id="<?php echo $variationId ?>">Add to cart</a>
																		</div>
																	<?php    
																	}
																}
															?>
														</div>
													</div>
													
												<?php } else { ?>
													<a href="javascript:void(0)" class="btn-shop-add-cart-no-variant" data-product_id="<?php echo $productId ?>">Add to cart</a>
												<?php }
											}
											?>

										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="related-product__items-item">
							<div class="related-product-title-des">
								<a href="<?php echo $related_second_product_link ?>">
									<img src="<?php echo $related_second_product_img_url ?>" alt="<?php echo $related_second_product_img_alt ?>">
								</a>
								<div class="related-product-title">
									<label><a href="<?php echo $related_second_product_link ?>"><?php echo $related_second_product_title ?></a></label>
									<span class="related-product-price"><?php echo $related_second_product_price ?></span>
									<div class="related-product-content">
										<div class="related-product-content-left">
											<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/star_5.png" alt="C60 Purple Power Rating">
										</div>
										<div class="related-product-content-right">
											<!-- <a href="<?php echo $related_second_product_link ?>">
												<div class="related-product-select-btn">
													<label>Add To Cart</label>
												</div>
											</a>	 -->
											<?php
											if ( ! $related_second_product->is_in_stock() ) { ?>
												<a href="javascript:void(0)" class="btn-shop-add-cart-no-qty" data-product_id="<?php echo $related_second_product_id ?>">Out of Stock</a>
											<?php } else {
												if( $related_second_product->has_child() ) { ?>
													<div class="shop-variant-select">
														<a href="javascript: void(0)" class="button product_type_variable add_to_cart_button shop-add-cart">Select options</a>
														<div class="shop-variant-items">
															<?php
																if ( ( $variations = $related_second_product->get_children() ) ) {
																	foreach ( $variations as $variationId ) {
																		$variation = new WC_Product_Variation($variationId);
																		$variationName = implode(" / ", $variation->get_variation_attributes());
																		$variationPrice = $variation->get_price();
																	?>
																		<div class="shop-variant-item">
																			<label><?php echo $variationName . ' - $' . $variationPrice; ?></label>
																			<a href="javascript:void(0)" class="btn-shop-add-cart" data-product_id="<?php echo $related_second_product_id ?>" data-variant_id="<?php echo $variationId ?>">Add to cart</a>
																		</div>
																	<?php    
																	}
																}
															?>
														</div>
													</div>
													
												<?php } else { ?>
													<a href="javascript:void(0)" class="btn-shop-add-cart-no-variant" data-product_id="<?php echo $related_second_product_id ?>">Add to cart</a>
												<?php }
											}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="related-product__items-item">
							<div class="related-product-title-des">
								<a href="<?php echo $related_third_product_link ?>">
									<img src="<?php echo $related_third_product_img_url ?>" alt="<?php echo $related_third_product_img_alt ?>">
								</a>
								<div class="related-product-title">
									<label><a href="<?php echo $related_third_product_link ?>"><?php echo $related_third_product_title ?></a></label>
									<span class="related-product-price"><?php echo $related_third_product_price ?></span>
									<div class="related-product-content">
										<div class="related-product-content-left">
											<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/star_5.png" alt="C60 Purple Power Rating">
											<a href="<?php echo $related_third_product_link ?>"></a>
										</div>
										<div class="related-product-content-right">
										<!-- <a href="<?php echo $related_third_product_link ?>">
											<div class="related-product-select-btn">
												<label>Add To Cart</label>
											</div>
										</a> -->
										<?php
											if ( ! $related_third_product->is_in_stock() ) { ?>
												<a href="javascript:void(0)" class="btn-shop-add-cart-no-qty" data-product_id="<?php echo $related_third_product_id ?>">Out of Stock</a>
											<?php } else {
												if( $related_third_product->has_child() ) { ?>
													<div class="shop-variant-select">
														<a href="javascript: void(0)" class="button product_type_variable add_to_cart_button shop-add-cart">Select options</a>
														<div class="shop-variant-items">
															<?php
																if ( ( $variations = $related_third_product->get_children() ) ) {
																	foreach ( $variations as $variationId ) {
																		$variation = new WC_Product_Variation($variationId);
																		$variationName = implode(" / ", $variation->get_variation_attributes());
																		$variationPrice = $variation->get_price();
																	?>
																		<div class="shop-variant-item">
																			<label><?php echo $variationName . ' - $' . $variationPrice; ?></label>
																			<a href="javascript:void(0)" class="btn-shop-add-cart" data-product_id="<?php echo $related_third_product_id ?>" data-variant_id="<?php echo $variationId ?>">Add to cart</a>
																		</div>
																	<?php    
																	}
																}
															?>
														</div>
													</div>
													
												<?php } else { ?>
													<a href="javascript:void(0)" class="btn-shop-add-cart-no-variant" data-product_id="<?php echo $related_third_product_id ?>">Add to cart</a>
												<?php }
											}
											?>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<?php endwhile;
		endif; ?>

</main>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
