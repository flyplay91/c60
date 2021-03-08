<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );

?>
<main class="product-category-page">
	<div class="product-category__inner">
		<div class="shop-products__inner inner-section-1120">
			<?php echo do_action( 'woocommerce_before_shop_loop' ); ?>
		</div>

		<section class="product-category__title-short-des">
			<div class="product-category__title-short-des__inner inner-section-1120">
				<?php if( is_product_category('c60-oil') ) : ?>
					<h1>C60 Oil</h1>
					<p>If you are looking for the very best organic C60 oils, look no further than C60 Purple Power. Our C60 products are made with 99.99% pure sublimated carbon fullerenes (never exposed to solvents), and 100% Certified Organic, healthy, farm-direct oils, ensuring the best possible C60 in the industry today. <br> <br>
					C60 is believed to be one of the most powerful antioxidants ever discovered due to its natural benefits that protect the body from oxidative stress. By scavenging free radicals and reducing oxidative stress, Carbon 60 oil tackles the main cause of aging and cellular damage, protecting the body and allowing it to heal naturally.</p>
				<?php elseif(is_product_category('c60-pets')) : ?>
					<h1>C60 Pets</h1>
					<p>Our C60 oil for pets has been specifically formulated for the wellness needs of the furriest members of your family. Our C60 products are made with 99.99% pure sublimated carbon fullerenes (never exposed to solvents), and 100% Certified Organic, healthy, farm-direct oils, ensuring the best possible C60 in the industry today. <br><br>
					If you are looking to supplement your pet’s health with natural, scientifically-backed methods, look no further than C60 Purple Power. We encourage you to explore our site to learn more about the unique benefits of C60 and what makes our company the best manufacturer and retailer of organic C60 for pets today.</p>
				<?php elseif(is_product_category('bundles')) : ?>
					<h1>Bundles</h1>
				<?php elseif(is_product_category('merchandise')) : ?>
					<h1>Merchandise</h1>
				<?php endif; ?>
			</div>
		</section>

		<section class="product-category__products">
			<?php
			if ( woocommerce_product_loop() ) { ?>
				<div class="product-category__products__inner inner-section-1120">				
				<?php
				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();
						do_action( 'woocommerce_shop_loop' );
						wc_get_template_part( 'content', 'product' );
					}
				} ?>
				</div>
				<?php
			} else {
				do_action( 'woocommerce_no_products_found' );
			}
			?>
		</section>
	</div>
</main>

<?php
get_footer( 'shop' );
