<?php 

/**
 * Disable WP admin bar.
 */
add_filter("show_admin_bar", "__return_false");

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
	$theme = "severn";
	$classes[] = 'data-month="' . date("m") . '"'; 
	$classes[] = 'data-date="' . date("d") . '"';

	if(is_single() && get_post_type() == "meet") {
		$meet_location = sb_meet_location(get_field("meet_location"));
		$theme = strtolower($meet_location["locality"]);
	}
	$classes[] = 'data-theme="' . $theme . '"';
	return implode(" ", $classes);
}

/**
 * Determine the current page's theme and return the appropriate theme colour. 
 * @return string The (hash-prefixed) hexadecimal colour code. 
 */
function sb_theme_color() {
	$theme_color = "#2b2e4a";
	if(is_single() && get_post_type() == "meet") {
		$meet_location = sb_meet_location(get_field("meet_location"));
		if(isset($meet_location["locality"]) && !empty($meet_location["locality"])) {
			switch(strtolower($meet_location["locality"])) {
				case "bristol": 
					$theme_color = "#f44336"; 
					break;
				case "cardiff": 
					$theme_color = "#3f51b5"; 
					break;
				case "weston-super-mare": 
					$theme_color = "#ffc107"; 
					break;
				case "newport": 
					$theme_color = "#009688"; 
					break;
			}
		}
	}
	return $theme_color;
}
