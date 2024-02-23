<?php

// Add SVG, AI, EPS, Corel Draw, and Photoshop files mime type to WordPress.
add_filter( 'upload_mimes', function( $mime_types ) {
    $mime_types['ai']  = 'application/pdf';             // Adding .ai extension
    $mime_types['svg'] = 'image/svg+xml';               // Adding .svg extension
    $mime_types['psd'] = 'image/vnd.adobe.photoshop';   // Adding .psd extension

    return $mime_types;
}, 1, 1 );

?>