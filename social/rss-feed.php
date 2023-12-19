<?php

/**
* add custom post types to main rss feed
**/

function myfeed_request($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array('post', 'page', 'services', 'projects', 'tools', 'locations');
    return $qv;
}

add_filter('request', 'myfeed_request');

?>