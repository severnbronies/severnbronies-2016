<?php 

/**
 * Detach then re-attach autop after shortcodes have been processed to prevent conflicting tags.
 */
remove_filter("the_content", "wpautop");
add_filter("the_content", "wpautop", 99);

/**
 * Make image attachments 'link to' setting default to 'none'.
 */
function sb_set_image_linking() {
	$image_set = get_option("image_default_link_type");
	if ($image_set !== "none") {
		update_option("image_default_link_type", "none");
	}
}
add_action("admin_init", "sb_set_image_linking", 10);

/**
 * Override WP's default image embedding code
 * @param  string $html    The image HTML to send.
 * @param  int    $id      The attachment ID.
 * @param  string $caption The image caption.
 * @param  string $title   The image title.
 * @param  string $align   The image alignment.
 * @param  string $url     The image source URL.
 * @param  string $size    The image size.
 * @param  string $alt     The image alt text.
 * @return string          The HTML to output.
 */
function sb_image_insertion($html, $id, $caption, $title, $align, $url, $size, $alt) {
	return "[image id='$id' align='$align']";
}
add_filter("image_send_to_editor", "sb_image_insertion", 10, 9);

/**
 * Build responsive image sources.
 * @param  int    $image    The attachment ID.
 * @param  array  $mappings Array of defined image sizes.
 * @return string           The image source HTML.
 */
function sb_responsive_image($image, $mappings) {
	$array = array();
	foreach($mappings as $size => $type) {
		$image_src = wp_get_attachment_image_src($image, $type);
		$array[] = '<source srcset="' . $image_src[0] . '" media="(min-width: ' . $size . 'px)">';
	}
	return implode(array_reverse($array));
}

/**
 * Image alt text
 * @param  int    $image The attachment ID.
 * @return string        The attachment's alt text.
 */
function sb_responsive_image_alt($image) {
	$image_alt = trim(strip_tags(get_post_meta($image, "_wp_attachment_image_alt", true)));
	if(!$image_alt) {
		$image_alt = "Image";
	}
	return $image_alt;
}

/**
 * Shortcode for responsive images in content. 
 * @param  array  $attributes Attributes passed into shortcode.
 * @return string             The resultant HTML when the shortcode is parsed.
 */
function sb_responsive_image_shortcode($attributes) {
	extract(shortcode_atts(array(
		"id" => 1,
		"size1" => 0,
		"size2" => 600,
		"size3" => 1024,
		"align" => "none"
	), $attributes));
	$mappings = array(
		$size1 => "article-small",
		$size2 => "article-medium",
		$size3 => "article-large"
	);
	$return = '<picture><!--[if IE 9]><video style="display:none;"><[endif]-->' . sb_responsive_image($id, $mappings) . '<!--[if IE 9]></video><![endif]--><img srcset="' . wp_get_attachment_image_src($id)[0] . '" alt="' . sb_responsive_image_alt($id) . '"><noscript>' . wp_get_attachment_image($id, $mappings[0]) . '</noscript></picture>';
	if(isset($align) && $align != "none") {
		$return = sb_aside_shortcode(
			array("align" => $align),
			$return
		);
	}
	return $return;
}
add_shortcode("image", "sb_responsive_image_shortcode");

/**
 * Shortcode for article asides
 * @param  array  $attributes Attributes passed into shortcode.
 * @param  string $content    The content contained in the shortcode.
 * @return string             The resultant HTML when the shortcode is parsed.
 */
function sb_aside_shortcode($attributes, $content = null) {
	extract(shortcode_atts(
		array(
			"align" => "right",
		), $attributes)
	);
	if($align === "centre") { $align = "center"; }
	return '<aside class="article__aside article__aside--' . $align . '">' . $content . '</aside>';
}
add_shortcode("aside", "sb_aside_shortcode");

/**
 * Better excerpts, without images and shortcodes.
 * @param  string $text        The content of the post to make an excerpt of. 
 * @param  string $raw_excerpt The raw (markupless) excerpt text.
 * @return string              The resulting HTML.
 */	
// function sb_excerpts($text, $raw_excerpt) {
// 	if(!$raw_excerpt) {
// 		$content = apply_filters("the_content", strip_shortcodes(get_the_content()));
// 		$text = substr($content, 0, strpos($content, "</p>") + 4);
// 	}
// 	$text = preg_replace("/<img[^>]+\>/i", "", $text); 
// 	return $text;
// }
// add_filter("wp_trim_excerpt", "sb_excerpts", 10, 2);