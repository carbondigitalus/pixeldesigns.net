<?php

function get_woocommerce_category_image() {
    // Check if we are on a WooCommerce category page
    if ( is_product_category() ) {
        // Get the current term ID
        $term_id = get_queried_object_id();

        // Get the image ID from the term meta
        $thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true );

        // Get the image URL
        $image_url = wp_get_attachment_url( $thumbnail_id );

        // Return the image HTML or an empty string if no image is found
        return $image_url ? '<img src="' . esc_url( $image_url ) . '" alt="Category Image">' : '';
    }

    return ''; // Return empty if not on a product category page
}

add_shortcode( 'carbondigital_category_image', 'get_woocommerce_category_image' );

function get_woocommerce_category_description() {
    // Check if we are on a WooCommerce category page
    if ( is_product_category() ) {
        // Get the current term object
        $term = get_queried_object();

        // Get the description from the term object
        $description = isset( $term->description ) ? $term->description : '';

        return $description;
    }

    return ''; // Return empty if not on a product category page
}

add_shortcode( 'carbondigital_category_description', 'get_woocommerce_category_description' );

?>