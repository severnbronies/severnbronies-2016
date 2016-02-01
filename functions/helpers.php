<?php 

/**
 * Return the formatted page title.
 * @return string The title of the page. 
 */
function sb_page_title() {
	$title = "";
	if(is_front_page()) {
		$title .= get_bloginfo('name');
		$title .=  " | "; 
		$title .= get_bloginfo('description');
	}
	else {
		$title .= wp_title('', false, 'right');
		$title .= " | ";
		$title .= get_bloginfo('name');
	}
	return $title;
}