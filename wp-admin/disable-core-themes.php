<?php

function prevent_default_theme_install($upgrader_object, $options) {
    // Check if it's an update to core
    if ($options['action'] == 'update' && $options['type'] == 'core') {
        // Remove the filter that adds the default themes
        remove_action('upgrader_post_install', array($upgrader_object, 'install_default_maintenance_page'));
    }
}

add_action('upgrader_process_complete', 'prevent_default_theme_install', 10, 2);

?>