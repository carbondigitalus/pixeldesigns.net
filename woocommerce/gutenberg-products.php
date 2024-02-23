<?php

function pixel_designs_activate_gutenberg_products($can_edit, $post_type){
	if($post_type == 'product'){
		$can_edit = true;
	}
	
	return $can_edit;
}
add_filter('use_block_editor_for_post_type', 'pixel_designs_activate_gutenberg_products', 10, 2);

?>