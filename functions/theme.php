<?php 

/**
 * Allow article images and image resizing
 */
add_theme_support("post-thumbnails");

/**
 * Define desired image resizes
 */
add_image_size("article-large", 1400, 9999);
add_image_size("article-medium", 1000, 9999);
add_image_size("article-small", 600, 9999);
add_image_size("banner-large", 1400, 1400, true);
add_image_size("banner-medium", 1000, 1000, true);
add_image_size("banner-small", 600, 600, true);

/**
 * Determine and output the CSS classes for the <body> tag based on some magic or something.
 * @return string List of classes.
 */
function sb_body_attributes() {
	$classes = array();
	$classes[] = 'data-month="' . date("m") . '"'; 
	$classes[] = 'data-date="' . date("d") . '"';
	if(is_single() && get_post_type() == "meet") {
		$meet_location = sb_meet_location(get_field("meet_location"));
		$classes[] = 'data-theme="' . strtolower($meet_location["locality"]) . '"';
	}
	else {
		$classes[] = 'data-theme="severn"';
	}
	return implode(" ", $classes);
}