<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$productId = $product->get_id();

if ( ! $product->is_in_stock() ) { ?>
	<a href="javascript:void(0)" class="btn-shop-add-cart-no-qty" data-product_id="<?php echo $productId ?>">Out of Stock</a>
<?php } else {
	if( $product->has_child() ) { ?>
		<div class="shop-variant-select">
			<a href="javascript: void(0)" class="button product_type_variable add_to_cart_button shop-add-cart">Select options</a>
			<div class="shop-variant-items">
				<?php
					if ( ( $variations = $product->get_children() ) ) {
						foreach ( $variations as $variationId ) {
							$variation = new WC_Product_Variation($variationId);
							$variationName = implode(" / ", $variation->get_variation_attributes());
							$variationPrice = $variation->get_price();
						?>
							<div class="shop-variant-item">
								<label><?php echo $variationName . ' - $' . $variationPrice; ?></label>
								<a href="javascript:void(0)" class="btn-shop-add-cart" data-product_id="<?php echo $productId ?>" data-variant_id="<?php echo $variationId ?>">Add to cart</a>
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


