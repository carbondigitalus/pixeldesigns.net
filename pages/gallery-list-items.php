<?php 

// Args for the WP_Query
$args = array(
    'post_type' => 'gallery-page', // Make sure this is your correct CPT slug
    'posts_per_page' => -1, // Show all posts
    // Any other arguments you need
);

// The Query
$the_query = new WP_Query($args);

// The Loop
if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
        $the_query->the_post();

        // Initialize variables
        $category_names = [];
        
        // Retrieve the linked WooCommerce product post object
        $linked_product = get_field('linked_product');
        $product_url = '';
        
        // Get all categories of the WooCommerce product
        if ($linked_product) {
            $categories = get_the_terms($linked_product->ID, 'product_cat');
            if ($categories && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    $category_names[] = $category->name;
                }
            }
        
            $category_names_string = implode(', ', $category_names); // Concatenate category names into a string
        
            // Get the URL of the linked product
            $product_url = get_permalink($linked_product->ID);
        }
?>

<div class='card' <?php echo 'data-gallery-page-filter="' . esc_attr($category_names_string) . '"'; ?>>
    <a href='<?php echo esc_url($product_url); ?>' target="_blank" rel="noreferrer">
        <div class='card-image' style='background-image: url(<?php echo esc_url(get_field('image')['url']); ?>)'>
        </div>

        <?php if ($linked_product) : ?>
            <div class='card-product-title'>
                <?php echo esc_html($linked_product->post_title); // Display the title of the linked WooCommerce product ?>
            </div>
        <?php endif; ?>

    </a>
</div>

<?php 
    }
    wp_reset_postdata(); // Reset post data
    wp_reset_query(); // Reset the query
} else {
    // No posts found
    echo '<div style="margin-left:auto;margin-right:auto;width:50%;color:#333">No Items Found</div>';
}
?>
