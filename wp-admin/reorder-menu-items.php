<?php 

function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    
    return array(
        // CORE AREAS
        'index.php',                                // Dashboard
        'themes.php',                               // Appearance
        'edit.php',                                 // Blog Posts
        'upload.php',                               // Media
        'edit.php?post_type=page',                  // Pages
        'plugins.php',                              // Plugins
        'options-general.php',                      // Settings
        'tools.php',                                // Tools
        'users.php',                                // Users
        // BUILDER SECTION
        'ct_dashboard_page',                        // Oxygen
        // CPT SECTION
        'cptui_main_menu',                          // CPT UI
        'edit.php?post_type=acf-field-group',       // ACF
        'edit.php?post_type=links',                 // Affiliate Links CPT
        'edit.php?post_type=locations',             // Locations CPT
        'edit.php?post_type=products',              // Products CPT
        'edit.php?post_type=projects',              // Projects CPT
        'edit.php?post_type=services',              // Services CPT
        'edit.php?post_type=tools',                 // Web Tools CPT
        // OTHER PLUGINS
        'cookie-law-info',                          //Cookie Yes
        'gf_edit_forms',                            // Gravity Forms
        'link_whisper_license',                     // Link Whisper
        'schedulepress',                            // Schedule Press
        'seopress-option'                           // SEO Press
        );
}
    
add_filter('menu_order', 'custom_menu_order', 100);
add_filter('custom_menu_order', 'custom_menu_order', 100);

?>