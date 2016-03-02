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

/**
 * Generate responsive image code.
 * @return string The resulting HTML. 
 */
function sb_responsive_image_helper($image_id, $class_name = "") {
	return '<img class="' . $class_name . '" alt="' . get_post_meta($image_id, "_wp_attachment_image_alt", true) . '" src="' . wp_get_attachment_image_src($image_id, "banner-large")[0] . '" srcset="' . wp_get_attachment_image_src($image_id, "banner-large")[0] . ' 1000w, ' . wp_get_attachment_image_src($image_id, "banner-medium")[0] . ' 600w, ' . wp_get_attachment_image_src($image_id, "banner-small")[0] . ' 1w" sizes="(min-width: 1000px) 100vw, (min-width: 600px) 100vw, (min-width: 0px) 100vw, 100vw">';
}