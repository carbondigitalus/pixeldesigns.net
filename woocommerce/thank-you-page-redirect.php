<?php

add_action( 'woocommerce_thankyou', 'custom_thankyou_redirect', 10, 1 );

function custom_thankyou_redirect( $order_id ) {
    if ( ! $order_id ) {
        return;
    }

    // Add the order ID to a page slug string
    $redirect_url = site_url( '/checkout/thank-you/?order=' . $order_id );

    // Redirect the user to the new slug
    wp_redirect( $redirect_url );
    exit;
}

?>