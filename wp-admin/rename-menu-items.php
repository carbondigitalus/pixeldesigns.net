<?php

function rename_core_menu_item() {
    global $menu;
    
    foreach ($menu as $key => $item) {
        // Rename Posts menu item
        if ($item[2] == 'edit.php') {
            $menu[$key][0] = 'Blog Posts';  // New name for the menu item
        }
        // Rename ACF menu item
        if ($item[2] == 'edit.php?post_type=acf-field-group') {
            $menu[$key][0] = 'Custom Fields'; // New name for the ACF menu item
        }
        // Rename Forms menu item
        if ($item[2] == 'gf_edit_forms') {
            $menu[$key][0] = 'Gravity Forms';  // New name for the menu item
        }
        // Rename SEO menu item
        if ($item[2] == 'seopress-option') {
            $menu[$key][0] = 'SEO Press';  // New name for the menu item
        }
        // Rename WC Analytics menu item
        if ($item[2] == 'wc-admin&path=/analytics/overview') {
            $menu[$key][0] = 'WC Analytics';  // New name for the menu item
        }
        // Rename WC Marketing menu item
        if ($item[2] == 'woocommerce-marketing') {
            $menu[$key][0] = 'WC Marketing';  // New name for the menu item
        }
        // Rename WC Marketing menu item
        if ($item[2] == 'wc-admin&path=/wc-pay-welcome-page') {
            $menu[$key][0] = 'WC Payments';  // New name for the menu item
        }        
        // Rename WC Products menu item
        if ($item[2] == 'edit.php?post_type=product') {
            $menu[$key][0] = 'WC Products';  // New name for the menu item
        }
    }
}

add_action( 'admin_menu', 'rename_core_menu_item', 999 );
?>