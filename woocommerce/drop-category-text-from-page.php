<?php

add_filter( 'get_the_archive_title', function( $title ) {
    // Check if it's a WooCommerce product category page.
    if ( is_product_category() ) {
        // Remove the prefix "Category:" or any other taxonomy term prefix.
        $title_parts = explode( ': ', $title );
        if ( count( $title_parts ) > 1 ) {
            array_shift( $title_parts ); // Remove the first element, which is the prefix.
            $title = implode( ': ', $title_parts );
        }
    }

    return $title;
});

?>