<?php
/**
 * Related Subscriptions section beneath order details table
 *
 * @author   Prospress
 * @category WooCommerce Subscriptions/Templates
 * @version  2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<header>
	<h2><?php esc_html_e( 'Related subscription', 'woocommerce-subscriptions' ); ?></h2>
</header>

<table class="shop_table shop_table_responsive my_account_orders woocommerce-orders-table woocommerce-MyAccount-subscriptions woocommerce-orders-table--subscriptions">
	<thead>
		<tr>
			<th class="subscription-id order-number woocommerce-orders-table__header woocommerce-orders-table__header-order-number woocommerce-orders-table__header-subscription-id"><span class="nobr"><?php esc_html_e( 'Subscription', 'woocommerce-subscriptions' ); ?></span></th>
			<th class="subscription-status order-status woocommerce-orders-table__header woocommerce-orders-table__header-order-status woocommerce-orders-table__header-subscription-status"><span class="nobr"><?php esc_html_e( 'Status', 'woocommerce-subscriptions' ); ?></span></th>
			<th class="subscription-next-payment order-date woocommerce-orders-table__header woocommerce-orders-table__header-order-date woocommerce-orders-table__header-subscription-next-payment"><span class="nobr"><?php echo esc_html_x( 'Next payment', 'table heading', 'woocommerce-subscriptions' ); ?></span></th>
			<th class="subscription-total order-total woocommerce-orders-table__header woocommerce-orders-table__header-order-total woocommerce-orders-table__header-subscription-total"><span class="nobr"><?php echo esc_html_x( 'Total', 'table heading', 'woocommerce-subscriptions' ); ?></span></th>
			<th class="subscription-actions order-actions woocommerce-orders-table__header woocommerce-orders-table__header-order-actions woocommerce-orders-table__header-subscription-actions">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	    <?php
	    
	    //we don't need to list the renewals from kk
	    if(false && !empty($order_id->get_meta('order_konnektive_order_id'))) {

	        $fulfillments = getKKOrders($order_id->get_meta('order_konnektive_order_id') );


	        $orders = array();
	        
	        foreach($fulfillments as $fulfillment){

	            //$order = findWooOrder($fulfillment['clientFulfillmentId']);
                $order = findDataByMeta($fulfillment['trackingNumber'], "konnektive_tracking_id_0", "shop_order");
                $order = wc_get_order($order->ID);
	            if($order){
         
	            if($order->get_meta('order_konnektive_order_id') === $order_id->get_meta('order_konnektive_order_id')) {
	                    continue;
	                }
	                
	                $orders[$order->get_id()] = $order;
	            }
	        }
	    }

	        if(!empty($orders)) {
	            
    	         foreach($orders as $myOrder){
    	             $nextBillDate = "-";
    	             if (  function_exists( 'loadKonnektiveOrder' ) ) {
    	                 $konnektiveOrderId = $myOrder->get_meta('order_konnektive_order_id');
    		            if($konnektiveOrderId) {
        			        $kOrder = loadKonnektiveOrder($konnektiveOrderId);
        			        if($kOrder){
        			            foreach ($kOrder['items'] as $orderItem){
                                    if (!empty($orderItem['nextBillDate'])) {
                                        $nextBillDate = $orderItem['nextBillDate'];
                                        break;
                                    }
                                }
        			        }
    		            }
    			    }
    			    
    			        $timeNextBillDate  =strtotime($nextBillDate);
            		    $fakeFutureDate = strtotime("2050-01-01");
            		    
            		    if($timeNextBillDate > $fakeFutureDate) {
            		        $nextBillDate = "-";
            		    }
            		    
            		        $statusName = wc_get_order_status_name( $myOrder->get_status() );
            				if($myOrder->get_status() == "rebill" || $myOrder->get_status() == "crebill"){
            				    $statusName = "Renewal";
            				} elseif(wcs_order_contains_subscription($myOrder)) {
            				     $statusName = "Subscription";
            				}
    	             ?>
    	            			<tr class="order woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $myOrder->get_status() ); ?>">
        				<td class="subscription-id order-number woocommerce-orders-table__cell woocommerce-orders-table__cell-subscription-id woocommerce-orders-table__cell-order-number" data-title="<?php esc_attr_e( 'ID', 'woocommerce-subscriptions' ); ?>">
        					<a href="<?php echo esc_url( $myOrder->get_view_order_url() ); ?>">
        						<?php echo sprintf( esc_html_x( '#%s', 'hash before order number', 'woocommerce-subscriptions' ), esc_html( $myOrder->get_order_number() ) ); ?>
        					</a>
        				</td>
        				<td class="subscription-status order-status woocommerce-orders-table__cell woocommerce-orders-table__cell-subscription-status woocommerce-orders-table__cell-order-status" style="white-space:nowrap;" data-title="<?php esc_attr_e( 'Status', 'woocommerce-subscriptions' ); ?>">
        					<?php echo esc_html($statusName); ?>
        				</td>
        				<td class="subscription-next-payment order-date woocommerce-orders-table__cell woocommerce-orders-table__cell-subscription-next-payment woocommerce-orders-table__cell-order-date" data-title="<?php echo esc_attr_x( 'Next payment', 'table heading', 'woocommerce-subscriptions' ); ?>">
        					<?php echo esc_html( $nextBillDate ); ?>
        				</td>
        				<td class="subscription-total order-total woocommerce-orders-table__cell woocommerce-orders-table__cell-subscription-total woocommerce-orders-table__cell-order-total" data-title="<?php echo esc_attr_x( 'Total', 'Used in data attribute. Escaped', 'woocommerce-subscriptions' ); ?>">
        					<?php echo wp_kses_post( $myOrder->get_formatted_order_total() ); ?>
        				</td>

        				<td class="subscription-actions order-actions woocommerce-orders-table__cell woocommerce-orders-table__cell-subscription-actions woocommerce-orders-table__cell-order-actions">
        					<a href="<?php echo esc_url( $myOrder->get_view_order_url() ) ?>" class="woocommerce-button button view"><?php echo esc_html_x( 'View', 'view a subscription', 'woocommerce-subscriptions' ); ?></a>
        				</td>
        			</tr>
        			<?php
    	         }
	        
	        
	    } else {
                            $statusName = wc_get_order_status_name( $order_id->get_status() );
            				if($order_id->get_status() == "rebill"){
            				    $statusName = "Active";
            				} elseif($order_id->get_status() == "crebill"){
            				    $statusName = "Inactive";
            				} elseif(wcs_order_contains_subscription($order_id)) {
            				     $statusName = "Subscription";
            				}
	    ?>
    		<?php foreach ( $subscriptions as $subscription_id => $subscription ) : ?>
    		
    		<?php 
    		
                $order = method_exists( $subscription, 'get_parent' ) ? $subscription->get_parent() : $subscription->order;
                $nextBillDate = "-";
                $konnektiveOrderId = $order->get_meta('order_konnektive_order_id');
    		    if($konnektiveOrderId) {
    		        if (  function_exists( 'loadKonnektiveOrder' ) ) {
    			        $kOrder = loadKonnektiveOrder($konnektiveOrderId);
    			        if($kOrder){
    			            foreach ($kOrder['items'] as $orderItem){
                                if (/*$orderItem['purchaseStatus'] == "ACTIVE" &&*/ !empty($orderItem['nextBillDate'])) {
                                    $nextBillDate = $orderItem['nextBillDate'];
                                    break;
                                }
                            }
    			        }
    			    }
    		    }
    		        		    
    		    $timeNextBillDate  =strtotime($nextBillDate);
    		    $fakeFutureDate = strtotime("2050-01-01");
    		    
    		    if($timeNextBillDate > $fakeFutureDate) {
    		        $nextBillDate = "-";
    		    }
    		?>
    			<tr class="order woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $subscription->get_status() ); ?>">
    				<td class="subscription-id order-number woocommerce-orders-table__cell woocommerce-orders-table__cell-subscription-id woocommerce-orders-table__cell-order-number" data-title="<?php esc_attr_e( 'ID', 'woocommerce-subscriptions' ); ?>">
    					<a href="<?php echo esc_url( $subscription->get_view_order_url() ); ?>">
    						<?php echo sprintf( esc_html_x( '#%s', 'hash before order number', 'woocommerce-subscriptions' ), esc_html( $subscription->get_order_number() ) ); ?>
    					</a>
    				</td>
    				<td class="subscription-status order-status woocommerce-orders-table__cell woocommerce-orders-table__cell-subscription-status woocommerce-orders-table__cell-order-status" style="white-space:nowrap;" data-title="<?php esc_attr_e( 'Status', 'woocommerce-subscriptions' ); ?>">
    					<?php echo esc_html( /*wcs_get_subscription_status_name( $subscription->get_status() )*/ $statusName ); ?>
    				</td>
    				<td class="subscription-next-payment order-date woocommerce-orders-table__cell woocommerce-orders-table__cell-subscription-next-payment woocommerce-orders-table__cell-order-date" data-title="<?php echo esc_attr_x( 'Next payment', 'table heading', 'woocommerce-subscriptions' ); ?>">
    					<?php echo esc_html( /*$subscription->get_date_to_display( 'next_payment' )*/ $nextBillDate ); ?>
    				</td>
    				<td class="subscription-total order-total woocommerce-orders-table__cell woocommerce-orders-table__cell-subscription-total woocommerce-orders-table__cell-order-total" data-title="<?php echo esc_attr_x( 'Total', 'Used in data attribute. Escaped', 'woocommerce-subscriptions' ); ?>">
    					<?php echo wp_kses_post( $subscription->get_formatted_order_total() ); ?>
    				</td>
    				<td class="subscription-actions order-actions woocommerce-orders-table__cell woocommerce-orders-table__cell-subscription-actions woocommerce-orders-table__cell-order-actions">
    					<a href="<?php echo esc_url( $subscription->get_view_order_url() ) ?>" class="woocommerce-button button view"><?php echo esc_html_x( 'View', 'view a subscription', 'woocommerce-subscriptions' ); ?></a>
    				</td>
    			</tr>
    		<?php endforeach; ?>
    		<?php } ?>
	</tbody>
</table>

<?php do_action( 'woocommerce_subscription_after_related_subscriptions_table', $subscriptions, $order_id ); ?>
