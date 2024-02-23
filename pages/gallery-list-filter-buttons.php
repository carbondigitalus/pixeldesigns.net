<?php
function get_product_categories_list() {

    // Replace these with the IDs of the categories you want to exclude
    // 15 = General
    // 19 = Accessories
    $exclude_ids = [15, 19];

    $args = array(
        'taxonomy'   => 'product_cat',
        'orderby'    => 'name',
        'order'      => 'ASC',
        'hide_empty' => false,
        'exclude'    => $exclude_ids,
        'parent'     => 0
    );

    $product_categories = get_terms($args);
    
    if (!empty($product_categories)) {
        echo '<ul>';
        echo '<li data-filter-button="All">All</li>';
        foreach ($product_categories as $category) {
            echo '<li data-filter-button="' . $category->name . '">' . $category->name . '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No categories found';
    }
}
?>

<?php get_product_categories_list(); ?>
