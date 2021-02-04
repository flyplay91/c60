<?php
/**
 * Subscription details table
 *
 * @author  Prospress
 * @package WooCommerce_Subscription/Templates
 * @since 2.2.19
 * @version 2.6.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php 
					    $nextBillDate = "";
					    $lastBillDate = "";
					    $orderStatus = wcs_get_subscription_status_name( $subscription->get_status() );
					    $order = method_exists( $subscription, 'get_parent' ) ? $subscription->get_parent() : $subscription->order;
         
		                    $konnektiveOrderId = $order->get_meta('order_konnektive_order_id');
		                    $konnektiveImport = $order->get_meta('order_imported_from_konnektive');
            			    
            			    if($konnektiveOrderId) {
            			        if (  function_exists( 'loadKonnektiveOrder' ) ) {
                			        $kOrder = loadKonnektiveOrder($konnektiveOrderId);
                			        $purchases = queryPurchases($konnektiveOrderId);
                			        
                			        if ($purchases['result'] == 'SUCCESS' && !empty($purchases['message'])) {
                                        if (isset($purchases['message']['data']) && !empty($purchases['message']['data'])) {
                                            if(!empty($purchases['message']['data'][0]['transactions'])){
                                                $lastTransaction = end($purchases['message']['data'][0]['transactions']);
                                                if(!empty($lastTransaction)) {
                                                    $lastBillDate = $lastTransaction['txnDate'];
                                                }
                                            }
                                        }
                                    }
                			        
                			        if($kOrder){
                			            foreach ($kOrder['items'] as $orderItem){
                                            $orderStatus = ucfirst(strtolower($orderItem['purchaseStatus']));

                                            if (/*$orderItem['purchaseStatus'] == "ACTIVE" &&*/ !empty($orderItem['nextBillDate'])) {
                                                $nextBillDate = $orderItem['nextBillDate'];
                                                break;
                                            } else {
                                               
                                            }
                                        }
                			        }
                			    }
            			    }

					?>
<table class="shop_table subscription_details">
	<tbody>
		<tr>
			<td><?php esc_html_e( 'Status', 'woocommerce-subscriptions' ); ?></td>
			<td><?php echo esc_html( $orderStatus ); ?></td>
		</tr>
		 <?php if(!empty($konnektiveOrderId)) { ?>

		<tr>
		    <!--
		    <td>
		        Action
		    </td>     
		    <td>
		        <?php
                /*
		        if (($order->get_status() == 'approved' || $order->get_status() ==  'rebill') &&  !empty($konnektiveOrderId)){
                    $order_id = method_exists($order, 'get_id') ? $order->get_id() : $order->id;
                    // Set the action button
                             $url =  wp_nonce_url(admin_url('admin-ajax.php?action=konnektive_pause_subscription&order_id=' . $order_id."&kk=".$konnektiveOrderId), 'konnektive_pause_subscription_nonce');
                    echo('<a href="'.$url.'" class="woocommerce-button button">Cancel</a>');
                }
            
                if ($order->get_status() == 'crebill' &&  !empty($konnektiveOrderId) ){
                    $order_id = method_exists($order, 'get_id') ? $order->get_id() : $order->id;
                    $url =  wp_nonce_url(admin_url('admin-ajax.php?action=konnektive_reactivate_subscription&order_id=' . $order_id."&kk=".$konnektiveOrderId), 'konnektive_reactivate_subscription_nonce');
                    echo('<a href="'.$url.'" class="woocommerce-button button">Re-activate</a>');
                    
                }*/
                
		        ?>
                
		    </td>     
		    -->
		    <td><?php esc_html_e( 'Auto renew', 'woocommerce-subscriptions' ); ?></td>
		    <td>
		        <div class="wcs-auto-renew-toggle-mod">
						<?php

						$toggle_classes = array( 'subscription-auto-renew-toggle-mod', 'subscription-auto-renew-toggle--hidden-mod' );
                        if ($order->get_status() == 'crebill' ){
                            $order_id = method_exists($order, 'get_id') ? $order->get_id() : $order->id;
                            $url =  wp_nonce_url(admin_url('admin-ajax.php?action=konnektive_reactivate_subscription&order_id=' . $order_id."&kk=".$konnektiveOrderId), 'konnektive_reactivate_subscription_nonce');
                            $toggle_label     = __( 'Enable auto renew', 'woocommerce-subscriptions' );
							$toggle_classes[] = 'subscription-auto-renew-toggle--off';
                            
                        } else {
							$toggle_label     = __( 'Disable auto renew', 'woocommerce-subscriptions' );
							$toggle_classes[] = 'subscription-auto-renew-toggle--on';
							$order_id = method_exists($order, 'get_id') ? $order->get_id() : $order->id;
                    
                            $url =  wp_nonce_url(admin_url('admin-ajax.php?action=konnektive_pause_subscription&order_id=' . $order_id."&kk=".$konnektiveOrderId), 'konnektive_pause_subscription_nonce');
						}?>
						<a href="<?php echo($url); ?>" class="<?php echo esc_attr( implode( ' ' , $toggle_classes ) ); ?>" aria-label="<?php echo esc_attr( $toggle_label ) ?>"><i class="subscription-auto-renew-toggle__i" aria-hidden="true"></i></a>
					</div>
                
		    </td>  
		</tr>
		<?php } ?>
		<?php do_action( 'wcs_subscription_details_table_after_dates', $subscription ); ?>
		<?php if ( WCS_My_Account_Auto_Renew_Toggle::can_user_toggle_auto_renewal( $subscription ) ) : ?>
			<tr>
				<td><?php esc_html_e( 'Auto renew', 'woocommerce-subscriptions' ); ?></td>
				<td>
					<div class="wcs-auto-renew-toggle">
						<?php

						$toggle_classes = array( 'subscription-auto-renew-toggle', 'subscription-auto-renew-toggle--hidden' );

						if ( $subscription->is_manual() ) {
							$toggle_label     = __( 'Enable auto renew', 'woocommerce-subscriptions' );
							$toggle_classes[] = 'subscription-auto-renew-toggle--off';

							if ( WC_Subscriptions::is_duplicate_site() ) {
								$toggle_classes[] = 'subscription-auto-renew-toggle--disabled';
							}
						} else {
							$toggle_label     = __( 'Disable auto renew', 'woocommerce-subscriptions' );
							$toggle_classes[] = 'subscription-auto-renew-toggle--on';
						}?>
						<a href="#" class="<?php echo esc_attr( implode( ' ' , $toggle_classes ) ); ?>" aria-label="<?php echo esc_attr( $toggle_label ) ?>"><i class="subscription-auto-renew-toggle__i" aria-hidden="true"></i></a>
						<?php if ( WC_Subscriptions::is_duplicate_site() ) : ?>
								<small class="subscription-auto-renew-toggle-disabled-note"><?php echo esc_html__( 'Using the auto-renewal toggle is disabled while in staging mode.', 'woocommerce-subscriptions' ); ?></small>
						<?php endif; ?>
					</div>
				</td>
			</tr>
		<?php endif; ?>
		<?php do_action( 'wcs_subscription_details_table_before_dates', $subscription ); ?>
		<?php
		$dates_to_display = apply_filters( 'wcs_subscription_details_table_dates_to_display', array(
			'start_date'              => _x( 'Start date', 'customer subscription table header', 'woocommerce-subscriptions' ),
			'last_order_date_created' => _x( 'Last order date', 'customer subscription table header', 'woocommerce-subscriptions' ),
			'next_payment'            => _x( 'Next payment date', 'customer subscription table header', 'woocommerce-subscriptions' ),
			'end'                     => _x( 'End date', 'customer subscription table header', 'woocommerce-subscriptions' ),
			'trial_end'               => _x( 'Trial end date', 'customer subscription table header', 'woocommerce-subscriptions' ),
		), $subscription );
		foreach ( $dates_to_display as $date_type => $date_title ) : ?>
			<?php $date = $subscription->get_date( $date_type ); ?>
			<?php if ( ! empty( $date ) ) : ?>
				<tr>
					<td><?php echo esc_html( $date_title ); ?></td>
					<?php if ( $date_type == 'next_payment' && ((!empty($nextBillDate) || $order->get_status() == 'crebill')) ) { ?>
					<td><?php echo((empty($nextBillDate) || $order->get_status() == 'crebill') ? "-" : date("F j, Y",strtotime($nextBillDate))); ?></td>
					<?php } elseif( $date_type == 'last_order_date_created' ) { ?>
					<td><?php echo(empty($lastBillDate) ? esc_html( $subscription->get_date_to_display( $date_type ) ) : date("F j, Y",strtotime($lastBillDate))); ?></td>
					<?php } else { ?>
					<td><?php echo esc_html( $subscription->get_date_to_display( $date_type ) ); ?></td>
					<?php } ?>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
				   
		<?php do_action( 'wcs_subscription_details_table_before_payment_method', $subscription ); ?>
		<?php if ( $subscription->get_time( 'next_payment' ) > 0 ) : ?>
			<tr>
				<td><?php esc_html_e( 'Payment', 'woocommerce-subscriptions' ); ?></td>
				<td>
					<span data-is_manual="<?php echo esc_attr( wc_bool_to_string( $subscription->is_manual() ) ); ?>" class="subscription-payment-method"><?php echo esc_html( $subscription->get_payment_method_to_display( 'customer' ) ); ?></span>
				</td>
			</tr>
		<?php endif; ?>
		<?php do_action( 'woocommerce_subscription_before_actions', $subscription ); ?>
		<?php $actions = wcs_get_all_user_actions_for_subscription( $subscription, get_current_user_id() ); ?>
		<?php if ( ! empty( $actions ) ) : ?>
			<tr>
				<td><?php esc_html_e( 'Actions', 'woocommerce-subscriptions' ); ?></td>
				<td>
					<?php foreach ( $actions as $key => $action ) : ?>
						<a href="<?php echo esc_url( $action['url'] ); ?>" class="button <?php echo sanitize_html_class( $key ) ?>"><?php echo esc_html( $action['name'] ); ?></a>
					<?php endforeach; ?>
				</td>
			</tr>
		<?php endif; ?>
		<?php do_action( 'woocommerce_subscription_after_actions', $subscription ); ?>
	</tbody>
</table>

<?php if ( $notes = $subscription->get_customer_order_notes() ) : ?>
	<h2><?php esc_html_e( 'Subscription updates', 'woocommerce-subscriptions' ); ?></h2>
	<ol class="woocommerce-OrderUpdates commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="woocommerce-OrderUpdate comment note">
			<div class="woocommerce-OrderUpdate-inner comment_container">
				<div class="woocommerce-OrderUpdate-text comment-text">
					<p class="woocommerce-OrderUpdate-meta meta"><?php echo esc_html( date_i18n( _x( 'l jS \o\f F Y, h:ia', 'date on subscription updates list. Will be localized', 'woocommerce-subscriptions' ), wcs_date_to_time( $note->comment_date ) ) ); ?></p>
					<div class="woocommerce-OrderUpdate-description description">
						<?php echo wp_kses_post( wpautop( wptexturize( $note->comment_content ) ) ); ?>
					</div>
	  				<div class="clear"></div>
	  			</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
<?php endif; ?>
