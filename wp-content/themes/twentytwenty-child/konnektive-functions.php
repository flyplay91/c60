<?php

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
    function cappedoutmedia_save_affiliate_data() {
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
