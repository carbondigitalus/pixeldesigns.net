<?php

/**
* add custom post types to main rss feed
**/

function pixel_designs_feeds($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array('post', 'page', 'custom-product');
    return $qv;
}

add_filter('request', 'pixel_designs_feeds');

?>