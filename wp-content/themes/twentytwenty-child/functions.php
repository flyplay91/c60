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

add_action( 'wp_enqueue_scripts', 'c60pp_parent_styles' );
function c60pp_parent_styles() {
	wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri().'/slick.css' );
 	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

add_action( 'wp_enqueue_scripts', 'c60pp_child_scripts' );
function c60pp_child_scripts() {
	wp_enqueue_script( 'jqery', get_stylesheet_directory_uri() . '/js/jquery.min.js', array( 'jquery' ), false, true );
 	wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/js/slick.min.js', array( 'jquery' ), false, true );
 	wp_enqueue_script( 'c60pp-child', get_stylesheet_directory_uri() . '/js/custom-js.js', array( 'jquery' ), false, true );
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

// Change return to shop link
add_filter( 'woocommerce_return_to_shop_redirect', 'bbloomer_change_return_shop_url' );
function bbloomer_change_return_shop_url() {
return home_url() . '/shop/';
}

// function mytheme_add_woocommerce_support() {
// 	add_theme_support( 'woocommerce' );
// 	add_theme_support( 'wc-product-gallery-slider' );
// }
// add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );

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

// Remove description text in Description content
add_filter( 'woocommerce_product_description_heading', '__return_null' );

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

// Change product page breadcrumb
add_filter( 'woocommerce_breadcrumb_defaults', 'woo_change_breadcrumb_home_text' );
function woo_change_breadcrumb_home_text( $defaults ) {
	$defaults['home'] = 'C60 Purple Power';

	return $defaults;
}

// Set subscribe from regular price when sale
function discount_from_regular_callback() {
	return true;
}
add_filter('wcsatt_discount_from_regular', 'discount_from_regular_callback');

// My account page menu order
function my_account_menu_order() {
	$menuOrder = array(
		'dashboard'          => __( 'Dashboard', 'woocommerce' ),
		'orders'             => __( 'My Orders', 'woocommerce' ),
		'subscriptions'      => __( 'My Subscriptions', 'woocommerce' ),
		'referral-link'     => __( 'Referral Link', 'woocommerce' ),
		'edit-address'       => __( 'Addresses', 'woocommerce' ),
		'edit-account'    	 => __( 'Account Details', 'woocommerce' ),
		'customer-logout'    => __( 'Logout', 'woocommerce' ),
	);
	return $menuOrder;
}
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );

// Disable responsecrm credit card gateway for subscriptions
function theme_wc_disable_credit_card_subscriptions( $available_gateways ) {
   if ( isset( $available_gateways['responsecrm_processing_gateway'] ) && is_checkout() ) {
	   foreach ( WC()->cart->get_cart_contents() as $key => $values ) {
		   if ( 'subscription' === WC_Product_Factory::get_product_type( $values['product_id'] ) ) {
			   unset( $available_gateways['responsecrm_processing_gateway'] );
			   break;
		   }
	   }
   }

   return $available_gateways;
}
add_filter( 'woocommerce_available_payment_gateways', 'theme_wc_disable_credit_card_subscriptions' );

define("ENABLE_KONNEKTIVE_LOG", 0);

/**
 * @snippet       WooCommerce add text to the checkout page
 * @author        Cappedoutmedia.com
 * @testedwith    WooCommerce 3.3.4
 */
function cappedoutmedia_add_content_checkout() {

    if(isset($_GET['token']) && !isset($_GET['PayerID'])){
        wc_print_notice( __( 'Payment failed.', 'woocommerce' ), 'error' );
        $customer_order = new WC_Order( $_SESSION['wcOrderId'] );

        if(empty($customer_order)){
            error_log("Konnektive PayPal payment order ID missing:".$_SESSION['wcOrderId']);
            wc_print_notice( __( 'Payment failed. No order found in session.', 'woocommerce' ), 'error' );
            return;
        } else {
            $customer_order->add_order_note( __( 'Konnektive payment failed. Konnektive order ID: '.$_SESSION['orderId'].". PAYPAL token:".$_GET['token'], 'cappedout-konnektive-paypal' ) );
            error_log('Konnektive payment failed. Konnektive order ID: '.$_SESSION['orderId'].". PAYPAL token:".$_GET['token']);
            return;
        }
    }

    if(isset($_GET['token']) && isset($_GET['PayerID'])){
        confirmKonnektivePaypalOrder(trim($_GET['token']), trim($_GET['PayerID']));
    }
}
add_action( 'woocommerce_before_checkout_form_cart_notices', 'cappedoutmedia_add_content_checkout' );

//paypal payments have a unique order flow
function confirmKonnektivePaypalOrder($token,$payerId)
{
    if(!session_id()){
        session_start();
    }

    if(empty($token)||empty($payerId) || !isset($_SESSION['orderId']) || !isset($_SESSION['wcOrderId'])){
        return;
    }


    $couponCode = "";

    $customer_order = new WC_Order( $_SESSION['wcOrderId'] );

    if ($customer_order) {
        $coupons = $customer_order->get_coupon_codes();

        if(!empty($coupons) && isset($coupons[0])) {
            $couponCode = $coupons[0];
        }
    }

    $wc_gateways      = new WC_Payment_Gateways();
    $payment_gateways = $wc_gateways->get_available_payment_gateways();

    if(!isset($payment_gateways['cappedout_konnektive_paypal'])){
        error_log("Konnektive PayPal payment is not enabled");
        return;
    }

    $gatewayData = $payment_gateways['cappedout_konnektive_paypal'];

    $apiLogin           = trim($gatewayData->get_option('api_login'));
    $apiPassword        = trim($gatewayData->get_option('api_password'));
    $campaignId         = trim($gatewayData->get_option('api_campaign_id'));
    $paypal_mid         = trim($gatewayData->get_option('paypal_mid'));
    $enable_auto_confirmation = trim($gatewayData->get_option('enable_auto_confirmation'));

    $orderProductsParam = isset($_SESSION['paypalOrderItems']) ? $_SESSION['paypalOrderItems'] : array();
    
    $shippingProfileId = isset($_SESSION['shippingProfileId']) ? $_SESSION['shippingProfileId'] : "";

    $params = array(
        'token'     => $token,
        'payerId'   => $payerId,
        'paypalBillerId'   => $paypal_mid,
        "loginId"       => $apiLogin,
        "password"      => $apiPassword,
        "campaignId"    => $campaignId,
        "orderId"       => trim($_SESSION['orderId']),
        "couponCode"    => $couponCode,
        "shipProfileId" => $shippingProfileId,
        "sessionId"     => trim($_SESSION['sessionId']),
    );

    $params = array_merge($params, $orderProductsParam);

    if (ENABLE_KONNEKTIVE_LOG){
        error_log("CONFIRM ORDER REQUEST:".PHP_EOL);
        error_log(json_encode($params).PHP_EOL);
    }


    // Send this payload to Konnektive for processing
    $response = wp_remote_post( "https://api.konnektive.com/transactions/confirmPaypal/", array(
        'method'    => 'POST',
        'body'      => http_build_query( $params ),
        'timeout'   => 90,
        'sslverify' => false,
    ) );

    if ( is_wp_error( $response ) )
        throw new Exception( __( 'We are currently experiencing problems trying to connect to this payment gateway. Sorry for the inconvenience.', 'cappedout-konnektive-paypal' ) );

    if ( empty( $response['body'] ) )
        throw new Exception( __( 'Konnektive\'s Response was empty.', 'cappedout-konnektive-paypal' ) );

    // Retrieve the body's resopnse if no errors found
    $response_body = wp_remote_retrieve_body( $response );

    if (ENABLE_KONNEKTIVE_LOG) {
        error_log("CONFIRM ORDER RESPONSE:".PHP_EOL);
        error_log(json_encode($response_body).PHP_EOL);
    }

    $resp = json_decode($response_body, true);


    $customer_order = new WC_Order( $_SESSION['wcOrderId'] );

    if(empty($customer_order)){
        error_log("Konnektive PayPal payment order ID missing:".$_SESSION['wcOrderId']);
        wc_print_notice( __( 'Payment failed. No order found in session.', 'woocommerce' ), 'error' );
    }

    if($resp['result'] == 'SUCCESS' && !empty($resp['message']))  {

        global $woocommerce;

        $orderData = $resp['message'];

        $customer_order->update_meta_data( 'order_exported_to_konnektive', 1);
        $customer_order->update_meta_data( 'order_konnektive_order_id', $orderData['orderId']);

        $customer_order->save();

        // Payment has been successful
        $customer_order->add_order_note( __( 'Konnektive payment completed. Konnektive order ID: '.$orderData['orderId'], 'cappedout-konnektive-paypal' ) );

        // Mark order as Paid
        //$customer_order->payment_complete();
        $customer_order->update_status('approved');
        
        // Empty the cart (Very important step)
        $woocommerce->cart->empty_cart();

        // Redirect to thank you page
        if ( $customer_order->get_status() != 'failed' ) {

            if ( 'no' !== $enable_auto_confirmation ) {
                try{
                    $confirmParams = array(
                        "loginId" => $apiLogin,
                        "password" => $apiPassword,
                        "orderId" => $orderData['orderId']
                    );


                    // Send this payload to Konnektive for processing
                    $response = wp_remote_post("https://api.konnektive.com/order/confirm/", array(
                        'method' => 'POST',
                        'body' => http_build_query($confirmParams),
                        'timeout' => 90,
                        'sslverify' => false,
                    ));
                } catch (Exception $e){}

            }

            unset($_SESSION['orderId']);
            unset($_SESSION['sessionId']);
            unset($_SESSION['wcOrderId']);
            unset($_SESSION['paypalOrderItems']);
            unset($_SESSION['shippingProfileId']);

            wp_safe_redirect( $customer_order->get_checkout_order_received_url() );
            exit;
        }

    } else {
        // Transaction was not succesful
        $error = $resp['message'];
        if (is_array($resp['message'])){
            $error = "";
            foreach ($resp['message'] as $key=>$value){
                $error.= $key.": ".$value;
            }
        }

        // Add notice to the cart
        wc_add_notice( $error, 'error' );
        // Add note to the order for your reference

        $customer_order->add_order_note( 'Error: '. $error );

        wc_print_notice( __( 'Payment failed:'.$error, 'woocommerce' ), 'error' );
    }
}

if ( ! function_exists( 'cappedoutmedia_save_affiliate_data' ) ) {

    /*
     * Save affiliate data to session
     * */
    function cappedoutmedia_save_affiliate_data()
    {

//    if ( is_admin() ) {
//        return false;
//    }

        if (!session_id()) {
            session_start();
        }

        if (isset($_REQUEST['c1'])) {
            if (!empty($_REQUEST['c1'])) {
                $_SESSION['sourceValue1'] = $_REQUEST['c1'];
            }
        }

        if (isset($_REQUEST['c2'])) {
            if (!empty($_REQUEST['c2'])) {
                $_SESSION['sourceValue2'] = $_REQUEST['c2'];
            }
        }

        if (isset($_REQUEST['c3'])) {
            if (!empty($_REQUEST['c3'])) {
                $_SESSION['sourceValue3'] = $_REQUEST['c3'];
            }
        }
        if (isset($_REQUEST['C1'])) {
            if (!empty($_REQUEST['C1'])) {
                $_SESSION['sourceValue1'] = $_REQUEST['C1'];
            }
        }

        if (isset($_REQUEST['C2'])) {
            if (!empty($_REQUEST['C2'])) {
                $_SESSION['sourceValue2'] = $_REQUEST['C2'];
            }
        }

        if (isset($_REQUEST['C3'])) {
            if (!empty($_REQUEST['C3'])) {
                $_SESSION['sourceValue3'] = $_REQUEST['C3'];
            }
        }

        if (isset($_REQUEST['affId'])) {
            if (!empty($_REQUEST['affId'])) {
                $_SESSION['affId'] = $_REQUEST['affId'];
            }
        }

        if (isset($_REQUEST['affid'])) {
            if (!empty($_REQUEST['affid'])) {
                $_SESSION['affId'] = $_REQUEST['affid'];
            }
        }

        if (isset($_REQUEST['affID'])) {
            if (!empty($_REQUEST['affID'])) {
                $_SESSION['affId'] = $_REQUEST['affID'];
            }
        }

        if (isset($_REQUEST['AFFID'])) {
            if (!empty($_REQUEST['AFFID'])) {
                $_SESSION['affId'] = $_REQUEST['AFFID'];
            }
        }
    }

    add_action("template_redirect", "cappedoutmedia_save_affiliate_data");
}

// @snippet 20% OFF Select Variants - Automatically Add Coupon to Cart
add_action( 'woocommerce_before_cart', 'tfc_apply_matched_coupons' );
function tfc_apply_matched_coupons() {
    $coupon_code = '20OFF2OZ';
    if ( WC()->cart->has_discount( $coupon_code ) ) return;
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		// this is your variant ID
		$autocoupon = array(152104, 152113);
		if ( in_array( $cart_item['variation_id'], $autocoupon ) ) {   
			WC()->cart->apply_coupon( $coupon_code );
			wc_print_notices();
		}
    }
}

add_action('woocommerce_checkout_before_order_review', 'tfc_apply_coupon_checkout');
function tfc_apply_coupon_checkout() {
    $coupon_code = '20OFF2OZ';
    if ( WC()->cart->has_discount( $coupon_code ) ) return;
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		// this is your variant ID
		$autocoupon = array(152104, 152113);
		if ( in_array( $cart_item['variation_id'], $autocoupon ) ) {   
			WC()->cart->apply_coupon( $coupon_code );
			// wc_print_notices();
		}
 
    }
}

// R.Stern, Pirate Labs, March 30, 2020, call function that inserts GTM tags:
function add_gtm_tags_to_footer() {
	echo "<!-- GTM codes here via Google Tag Manager plugin -->";
	if (function_exists('gtm4wp_the_gtm_tag')) { 
		gtm4wp_the_gtm_tag(); 
	}
}
add_action('wp_footer','add_gtm_tags_to_footer');

function payment_gateway_disable_country( $available_gateways ) {
    
    global $woocommerce;
    
    if ( is_admin() ) return;

    if (!empty($woocommerce) && !empty($woocommerce->customer)) {
        if ( isset( $available_gateways['cappedout_konnektive_card'] ) && $woocommerce->customer->get_billing_country() <> 'US' ) {
            unset( $available_gateways['cappedout_konnektive_card'] );
        }   
    }  

    if (isset( $available_gateways['cappedout_konnektive_card'] )  && is_checkout() ){
        $subscriptionProducts = array();

        if (class_exists( 'WC_Subscriptions_Product' )) {
            foreach ( WC()->cart->cart_contents as $cart_item_key => $cart_item ) {
                if ( ( WC_Subscriptions_Product::is_subscription( $cart_item['data'] )  )) {
                    $cartData = $cart_item['data']->get_data();
                    $subscriptionProducts[] = $cartData['id'];
                }
            }
        }
        
        if (count($subscriptionProducts)) {
            unset( $available_gateways['cappedout_konnektive_card'] );

        }
    }
    
    if ( isset( $available_gateways['paypal'] )  && is_checkout()) {
            unset( $available_gateways['paypal'] );
        }   
    
    return $available_gateways;
}
add_filter( 'woocommerce_available_payment_gateways', 'payment_gateway_disable_country' );

// Add some custom order status
add_filter( 'wc_order_statuses','add_wc_order_statuses', 9,1 );
function add_wc_order_statuses( $order_statuses ) {
    $order_statuses['wc-approved'] = _x( 'Approved', 'Order status', 'woocommerce' );
    return $order_statuses;
}

// register a custom order status it so we can see it in admin
register_post_status( 'wc-approved', array(
    'label'                     => 'Approved',
    'public'                    => true,
    'exclude_from_search'       => false,
    'show_in_admin_all_list'    => true,
    'show_in_admin_status_list' => true,
    'label_count'               => _n_noop( 'Approved (%s)', 'Approved (%s)', 'woocommerce' )
) );

// Auto Complete all WooCommerce orders.
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
function custom_woocommerce_auto_complete_order( $order_id ) { 
    if ( ! $order_id ) {
        return;
    }
    $order = wc_get_order( $order_id );
    $order->update_status( 'approved' );
}

// GetEmails
add_action( 'wp_footer', 'getemails_script' );
function getemails_script(){
	?>
  	<script type="text/javascript">
		!function(){var geq=window.geq=window.geq||[];if(geq.initialize) return;if (geq.invoked){if (window.console && console.error) {console.error("GetEmails snippet included twice.");}return;}geq.invoked = true;geq.methods = ["page", "suppress", "trackOrder", "identify", "addToCart"];geq.factory = function(method){return function(){var args = Array.prototype.slice.call(arguments);args.unshift(method);geq.push(args);return geq;};};for (var i = 0; i < geq.methods.length; i++) {var key = geq.methods[i];geq[key] = geq.factory(key);}geq.load = function(key){var script = document.createElement("script");script.type = "text/javascript";script.async = true;script.src = "https://s3-us-west-2.amazonaws.com/storejs/a/" + key + "/ge.js";var first = document.getElementsByTagName("script")[0];first.parentNode.insertBefore(script, first);};geq.SNIPPET_VERSION = "1.4.1";
		geq.load("QKEHD33");}();
	</script>
	<script>geq.page()</script>
  	<?php
}

// Disable the fatal error handler.
add_filter( 'wp_fatal_error_handler_enabled', '__return_false' );

// Send Product Review Notifications
function new_comment_moderation_recipients( $emails, $comment_id ) { 
    return array( 'sierra@c60purplepower.com,adamdematteis@yahoo.com' );
}
add_filter( 'comment_moderation_recipients', 'new_comment_moderation_recipients', 24, 2 );
add_filter( 'comment_notification_recipients', 'new_comment_moderation_recipients', 24, 2 );

// Default State Checked - Klaviyo Newsletter option via checkout page
add_action( 'wp_footer', 'checkedNewsletterBox' );
function checkedNewsletterBox() { ?>
    <script type="text/javascript">
    jQuery(function($){
        $('#kl_newsletter_checkbox_field').addClass('woocommerce-validated');
        $("#kl_newsletter_checkbox").prop( "checked", true );
    })
    </script>
  <?php
}