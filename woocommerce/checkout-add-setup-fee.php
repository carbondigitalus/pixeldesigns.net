<?php

add_action('woocommerce_cart_calculate_fees', 'add_fees_based_on_category'); 

function add_fees_based_on_category() { 
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    $category_minimums = array(
        'headwear' => 36,
        'hats' => 36,
        'beanies' => 36,
        'drinkware' => 36,
        'water-bottles' => 36,
        'mugs' => 36,
        'tumblers' => 36,
        // Add more categories and their minimums as needed
    );

    foreach (WC()->cart->get_cart() as $item_keys => $item) {
        foreach ($category_minimums as $category => $minimum) {
            if (has_category_and_minimum($item['product_id'], $category, $minimum)) {
                WC()->cart->add_fee(__('Setup Fee for ' . $category), 30);
                break; // Add fee once per item, even if it belongs to multiple relevant categories
            }
        }
    }
}

function has_category_and_minimum($product_id, $category, $minimum) {
    if (has_term($category, 'product_cat', $product_id)) {
        $total_qty = 0;
        foreach (WC()->cart->get_cart() as $cart_item) {
            if ($cart_item['product_id'] == $product_id || ($cart_item['variation_id'] != 0 && $cart_item['variation_id'] == $product_id)) {
                $total_qty += $cart_item['quantity'];
            }
        }
        if ($total_qty < $minimum) {
            return true;
        }
    }
    return false;
}

?>
