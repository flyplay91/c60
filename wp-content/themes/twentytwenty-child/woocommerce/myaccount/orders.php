<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
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

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>


<?php if ( $has_orders ) : 
	$completed_order_count = 0;
	$orders = get_posts( array(
	    'numberposts' => -1,
	    'meta_key'    => '_customer_user',
	    'meta_value'  => get_current_user_id(),
	    'post_type'   => 'shop_order',
	    // 'date_query' => array(
        //     'after' => date('Y-m-d', strtotime('05/01/2020')),
        //     'before' => date('Y-m-d', strtotime('today')) 
        // ),
	    'post_status' => array_keys( wc_get_order_statuses() )
	) );
	$current_user = wp_get_current_user();
	$userName = $current_user->display_name;
	$acf_repeater_count = 0;

	foreach($orders as $order) {
		if ( ($order->post_status == 'wc-approved') || ($order->post_status == 'wc-completed') || ($order->post_status == 'wc-rebill')  || ($order->post_status == 'wc-processing') ) {
			$order_obj = wc_get_order( $order );
			
			$items = $order_obj->get_items();
			
			foreach ( $items as $item ) {
				$product_id = $item['product_id'];

				if ( have_rows('bundle_product_group', $product_id) ): 
					while( have_rows('bundle_product_group',  $product_id)) : the_row();
						if( have_rows('product_repeater') ) :
							while( have_rows('product_repeater') ) : the_row();
								$acf_repeater_count++;
							endwhile;
						endif;	
					endwhile;
				endif;
			}
			
			if ($order_obj != '0.00') {
			    $item_count = $order_obj->get_item_count() - $order_obj->get_item_count_refunded();
			    $completed_order_count += $item_count;    
			}
		}
	}

	$completed_order_count = $completed_order_count + $acf_repeater_count;

	$dividedOrder = $completed_order_count % 13;
	$remainItem = 12 - $dividedOrder;
	
	if ($completed_order_count < 12 AND $completed_order_count > 0 AND $completed_order_count <= 0) {
		echo "<h3>You're " .  $remainItem . " items away from getting your free item!</h3>";
	} 
	
	if ($completed_order_count == 0) {
		echo "<h3>You're 12 items away from receiving your free item!</h3>";
	} else {
	    if ($completed_order_count % 13 == 0 OR $completed_order_count == 12 OR $remainItem == 0) {
			echo '<h3>Hurry! you earned a free item!</h3>';
		} else {
			
			echo "<h3>You're " . $remainItem . " more items away from receiving your free item!</h3>";
		}
	}
	?>

	<h4 class="order-loyalty-msg">Just add items to your cart and proceed to checkout for the discount to be applied automatically to non-subscription items only.</h4>

	<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>
			<tr>
				<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
					<th class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php
			$orders = [];
			foreach ( $customer_orders->orders as $customer_order ) {
				$order      = wc_get_order( $customer_order ); // phpcs:ignore 	WordPress.WP.GlobalVariablesOverride.OverrideProhibited
				// $orders[$customer_order] = [];

				// $totalCount = $order->get_item_count();
				// foreach ( $order->get_items() as $item_id => $item ) {
				// 	$product_id = $item->get_product_id();
				// 	$variation_id = $item->get_variation_id();
				// 	$product = $item->get_product();
				// 	$name = $item->get_name();
				// 	$quantity = $item->get_quantity();
				// 	$subtotal = $item->get_subtotal();
				// 	$total = $item->get_total();
				// 	$tax = $item->get_subtotal_tax();
				// 	$taxclass = $item->get_tax_class();
				// 	$taxstat = $item->get_tax_status();
				// 	$allmeta = $item->get_meta_data();
				// 	$somemeta = $item->get_meta( '_whatever', true );
				// 	$type = $item->get_type();

				//    	if ($total == 0) {
				//    		$totalCount--;
				   		
				//    	}
				// }

				// $orders[$customer_order]['total_count'] = $totalCount;

				$item_count = $order->get_item_count() - $order->get_item_count_refunded();
                    if(wcs_order_contains_subscription($order) && empty($order->get_meta('order_konnektive_order_id'))){continue;}
                    //if(wcs_order_contains_subscription($order)){continue;}
                    
				// $item_count = $totalCount - $order->get_item_count_refunded();
				
				$statusName = wc_get_order_status_name( $order->get_status() );
				if($order->get_status() == "rebill" || $order->get_status() == "crebill"){
				    $statusName = "Renewal";
				} elseif(wcs_order_contains_subscription($order)) {
				     $statusName = "Subscription";
				}
				?>
				<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order <?php echo $order->get_status(); ?>">
					<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
				
						<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

							<?php elseif ( 'order-number' === $column_id ) : ?>
								<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
									<?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
								</a>

							<?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

							<?php elseif ( 'order-status' === $column_id ) : ?>
								<?php echo esc_html($statusName ); ?>

							<?php elseif ( 'order-total' === $column_id ) : ?>
								<?php
								/* translators: 1: formatted order total 2: total order items */
								echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ) );
								?>

							<?php elseif ( 'order-actions' === $column_id ) : ?>
								<?php
								$actions = wc_get_account_orders_actions( $order );

								if ( ! empty( $actions ) ) {
									foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
										echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
									}
								}
								?>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php esc_html_e( 'Browse products', 'woocommerce' ); ?>
		</a>
		<?php esc_html_e( 'No order has been made yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>