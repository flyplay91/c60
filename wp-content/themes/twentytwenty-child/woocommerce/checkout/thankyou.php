<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e( 'Date:', 'woocommerce' ); ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
<!-- datalayer event transaction for gtm -->
<script>
 var dataLayer = window.dataLayer || [];            
    dataLayer.push({
        'event': 'transaction',
      'ecommerce': {
        'purchase': {
          'actionField': {
            'id': '<?php echo $order->get_order_number(); ?>',
            'affiliation': 'Online Store',
            'revenue': '<?php echo number_format($order->get_total(),2,'.',''); ?>',
            'tax':'<?php echo number_format($order->get_total_tax(),2,'.',''); ?>',
            'shipping': '<?php echo number_format($order->calculate_shipping(),2,'.',''); ?>',
            'coupon': '<?php echo implode("-",$order->get_used_coupons()); ?>'
          },
          'products': [<?php 
            $item_count = count($order->get_items()); $i=1;
            foreach( $order->get_items() as $key => $item ) {                         
                if( $item->get_quantity() > 0 ){
                    $product_id = $item->get_product_id();                           
                    $product = wc_get_product($product_id);
                    $variant_name = ($item->get_variation_id())?wc_get_product($item->get_variation_id()):'';
                 ?>{  
                'name': '<?php echo $item->get_name(); ?>',
                'id': '<?php echo $item->get_product_id(); ?>',
                'price': '<?php echo $item->get_total(); ?>',
                'brand': '[Client Name]',
                'category': '<?php echo strip_tags($product->get_categories(", ", "","")); ?>',
                'variant': '<?php echo ($variant_name)?implode("-",$variant_name->get_variation_attributes()):""; ?>',
                'quantity': <?php echo $item->get_quantity();?>,
                'coupon': ''
               }<?php if($i < $item_count){?>,<?php }?><?php 
                    $i++; }
                } ?>]
        }
      }
    });
    </script>





<?php add_action( 'woocommerce_thankyou', 'my_custom_tracking' );

function my_custom_tracking( $order_id ) {
// Lets grab the order
    $order = wc_get_order( $order_id );

    //Everflow order objects
    $efOrder = array();
    $efOrder['items'] = array();
    $efOrder['oid'] = $order_id;
    $efOrder['amt'] = $order->get_total();
    $efOrder['bs'] = $order->get_billing_state();
    $efOrder['bc'] = $order->get_billing_country();

    // Determine if any coupons were used for this transaction
    $coupons = "";
    $couponCount = 0;
    foreach ($order->get_used_coupons() as $coupon) {
        $couponCount++;
        if($couponCount > 1) { // do not add comma unless more than one coupon
            $coupons .= ',';
        }
        $coupons .= $coupon;
    }
    $efOrder['cc'] = $coupons;

    // This is how to grab line items from the order
    $line_items = $order->get_items();

    // This loops over line items
    $efItems = array();
    foreach ( $line_items as $item ) {
        //Init Everflow item
        $efItem = array();
        // This will be a product
        $product = $order->get_product_from_item( $item );
        // This is the products SKU (variant or parent)
        $efItem['vs'] = '';
        $efItem['ps'] = '';
        if ( $product->get_type() === 'variation' )
            { $efItem['vs'] = $product->get_sku(); }
        else
            { $efItem['ps'] = $product->get_sku(); }
        // This is the qty purchased
        $efItem['qty'] = $item['qty'];
        // Line item total cost including taxes and rounded
        $efItem['p'] = $order->get_line_total( $item, true, true );
        // Add this to Everflow items
        $efItems[] = $efItem;
    }
    $efOrder['items'] = $efItems;

    $javascriptCode = '
    <script type="text/javascript"
    src="https://www.mon8tkr.com/scripts/sdk/everflow.js"></script>

<script type="text/javascript">
EF.conversion({
    aid: 1,
    amount: '.$order->get_total().',
    adv1: "", //Optional
    adv2: "", //Optional
    adv3: "", //Optional
    adv4: "", //Optional
    adv5: "", //Optional
    order: '.json_encode($efOrder).',
});
</script>';
        echo $javascriptCode;
    }
?>