<?php

add_filter('manage_gallery-page_posts_columns', 'add_acf_columns_to_gallery_page');
function add_acf_columns_to_gallery_page($columns) {
    // Add custom columns
    $new_columns = [
        'cb' => $columns['cb'], // Keep the checkbox
        'linked_product_column' => 'Linked Product Title',
        'image_column' => 'Image',
    ];

    // Optionally, add back any specific columns you want to retain
    // For example, to keep the date column, uncomment the line below
    // $new_columns['date'] = $columns['date'];

    return $new_columns;
}

add_action('manage_gallery-page_posts_custom_column', 'gallery_page_custom_column', 10, 2);
function gallery_page_custom_column($column, $post_id) {
    switch ($column) {
        case 'image_column':
            $image = get_field('image', $post_id);
            if ($image) {
                // Assuming you want to display the thumbnail size
                echo wp_get_attachment_image($image['ID'], 'thumbnail');
            }
            break;
        case 'linked_product_column':
            $post_object = get_field('linked_product', $post_id);
            if ($post_object) {
                // Display the title of the linked product
                echo esc_html($post_object->post_title);
            }
            break;
    }
}

?>