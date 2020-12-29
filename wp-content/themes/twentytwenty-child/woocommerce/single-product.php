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
			}
			
		?>

		<?php if( have_rows('related_product_group')) : ?>
			<?php while ( have_rows('related_product_group')): the_row(); ?>
			<section class="home-product">
				<div class="inner-section-1220 home-prduct__inner">
					<h4 class="home-product__sub_heading"><?php echo $related_product_sub_heading ?></h4>
					<h2 class="home-product__title"><?php echo $related_product_heading ?></h2>
					<div class="home-product__items">
						<div class="home-product__items-item">
							<div class="home-product-title-des">
								<a href="<?php echo $related_first_product_link ?>">
									<img src="<?php echo $related_first_product_img_url ?>" alt="<?php echo $related_first_product_img_alt ?>">
								</a>
								<div class="home-product-title">
									<label><a href="<?php echo $related_first_product_link ?>"><?php echo $related_first_product_title ?></a></label>
									<div class="home-product-content">
										<div class="home-product-content-left">
											<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/star_5.png" alt="C60 Purple Power Rating">
											<a href="<?php echo $related_first_product_link ?>"><span>Starting at $49</span></a>
										</div>
										<div class="home-product-content-right">
											<div class="home-product-select-btn">
												<label>Select Option</label>
												<div class="home-product-cart">
													<div class="home-cart-block">
														<?php
															$related_first_product = new WC_Product_Variable( $related_first_product_id );
															$related_first_variations = $related_first_product->get_available_variations();
															foreach ($related_first_variations as $related_first_variation) {
																$related_first_variant_id = $related_first_variation["variation_id"];
															?>
																<div class="home-cart-item">
																	<label>2 oz - $49 / $39.20 mo</label>
																	<a data-product_id="<?php echo $related_first_product_id ?>" data-variation_id="<?php echo $related_first_variant_id ?>" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
																	<a href="" class="home-product-cart-btn">Subscribe</a>
																</div>
															<?php
															}
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="home-product__items-item">
							<div class="home-product-title-des">
								<a href="<?php echo $related_second_product_link ?>">
									<img src="<?php echo $related_second_product_img_url ?>" alt="<?php echo $related_second_product_img_alt ?>">
								</a>
								<div class="home-product-title">
									<label><a href="<?php echo $related_second_product_link ?>"><?php echo $related_second_product_title ?></a></label>
									<div class="home-product-content">
										<div class="home-product-content-left">
											<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/star_5.png" alt="C60 Purple Power Rating">
											<a href="<?php echo $related_second_product_link ?>"><span>Starting at $49</span></a>
										</div>
										<div class="home-product-content-right">
											<div class="home-product-select-btn">
												<label>Select Option</label>
												<div class="home-product-cart">
													<div class="home-cart-block">
														<?php
															$related_second_product = new WC_Product_Variable( $related_second_product_id );
															$related_second_variations = $related_second_product->get_available_variations();
															foreach ($related_second_variations as $related_second_variation) {
																$related_second_variant_id = $related_second_variation["variation_id"];
															?>
																<div class="home-cart-item">
																	<label>2 oz - $49 / $39.20 mo</label>
																	<a data-product_id="<?php echo $related_second_product_id ?>" data-variation_id="<?php echo $related_second_variant_id ?>" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
																	<a href="" class="home-product-cart-btn">Subscribe</a>
																</div>
															<?php
															}
														?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="home-product__items-item">
							<div class="home-product-title-des">
								<a href="<?php echo $related_third_product_link ?>">
									<img src="<?php echo $related_third_product_img_url ?>" alt="<?php echo $related_third_product_img_alt ?>">
								</a>
								<div class="home-product-title">
									<label><a href="<?php echo $related_third_product_link ?>"><?php echo $related_third_product_title ?></a></label>
									<div class="home-product-content">
										<div class="home-product-content-left">
											<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/star_5.png" alt="C60 Purple Power Rating">
											<a href="<?php echo $related_third_product_link ?>"><span>Starting at $49</span></a>
										</div>
										<div class="home-product-content-right">
											<div class="home-product-select-btn">
												<label>Select Option</label>
												<div class="home-product-cart">
													<div class="home-cart-block">
														<?php
															$related_third_product = new WC_Product_Variable( $related_third_product_id );
															$related_third_variations = $related_third_product->get_available_variations();
															foreach ($related_third_variations as $related_third_variation) {
																$related_third_variant_id = $related_third_variation["variation_id"];
															?>
																<div class="home-cart-item">
																	<label>2 oz - $49 / $39.20 mo</label>
																	<a data-product_id="<?php echo $related_third_product_id ?>" data-variation_id="<?php echo $related_third_variant_id ?>" data-quantity="1" href="javascript: void(0)" class="home-product-cart-btn">Add to Cart</a>
																	<a href="" class="home-product-cart-btn">Subscribe</a>
																</div>
															<?php
															}
														?>
													</div>
												</div>
											</div>
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

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		// do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
</main>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
