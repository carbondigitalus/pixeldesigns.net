<?php

if( function_exists('oxygen_vsb_register_condition') ) {

    global $oxy_condition_operators;

    oxygen_vsb_register_condition('Has Results', array('options'=>array('true', 'false'), 'custom'=>false), array('=='), 'search_has_results_callback', 'Search');

    function search_has_results_callback($value, $operator) {
        global $wp_query;
        $posts_found = $wp_query->found_posts;

        if( $value == "true" && $posts_found > 0) {
            return true;
        } else if( $value == "false" && $posts_found == 0 ) {
            return true;
        }
    }
}

?>