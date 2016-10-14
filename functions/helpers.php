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
	return '<img itemprop="image" class="' . $class_name . '" alt="' . get_post_meta($image_id, "_wp_attachment_image_alt", true) . '" src="' . wp_get_attachment_image_src($image_id, "banner-large")[0] . '" srcset="' . wp_get_attachment_image_src($image_id, "banner-large")[0] . ' 1000w, ' . wp_get_attachment_image_src($image_id, "banner-medium")[0] . ' 600w, ' . wp_get_attachment_image_src($image_id, "banner-small")[0] . ' 1w" sizes="(min-width: 1000px) 100vw, (min-width: 600px) 100vw, (min-width: 0px) 100vw, 100vw">';
}

/**
 * Parses post content to add links and somesuch.
 * @param  string $content The content to be parsed.
 * @return string          The parsed content, now with HTML added.
 */
function sb_content_parse($content) {
	$find = array(
		'#((https?|ftp)://(\S*?\.\S*?))([\s)\[\]{},;"\':<]|\.\s|$)#i', // URLs
		'/@([a-z0-9_]+)/i' // Twitter usernames
	);
	$replace = array(
		'<a href="$1">$1</a>', // URLs
		'<a href="https://twitter.com/$1">@$1</a>' // Twitter usernames
	);
	$content = preg_replace($find, $replace, $content);
	return $content; 
}

/**
 * Fuzzy time since something.
 * @param  string $timestamp The UNIX timestamp to be fuzzified.
 * @return string            The fuzzy time string.
 */
function sb_fuzzy_date($timestamp) {
	$ago = time() - $timestamp;
	if($ago < 60) {
		$when = round($ago);
		$str = ($when === 1) ? "second" : "seconds";
	}
	else if($ago < 3600) {
		$when = round($ago / 60);
		$str = ($when === 1) ? "minute" : "minutes";
	}
	else if($ago >= 3600 && $ago < 86400) {
		$when = round($ago / 60 / 60);
		$str = ($when === 1) ? "hour" : "hours";
	}
	else if($ago >= 86400 && $ago < 2629743.83) {
		$when = round($ago / 60 / 60 / 24);
		$str = ($when === 1) ? "day" : "days";
	}
	else if($ago >= 2629743.83 && $ago < 31556926) {
		$when = round($ago / 60 / 60 / 24 / 30.4375);
		$str = ($when === 1) ? "month" : "months";
	}
	else {
		$when = round($ago / 60 / 60 / 24 / 365);
		$str = ($when === 1) ? "year" : "years";
	}
	return "$when $str ago";
}

/**
 * Highlights a given search term if it appears inside a piece of text.
 * @param  string $term   The search term to highlight.
 * @param  string $string The piece of text/HTML to highlight it in.
 * @return string         The modified text/HTML with the term highlighted.
 */
function sb_search_highlight($term, $string) {
	if(!empty($term)) {
		$keys = explode(" ", $term);
		$string = preg_replace('/('.implode('|', $keys) .')/iu', '<mark>\0</mark>', $string);
	}
	return $string;
}

/**
 * Return the HTML formatted start and end dates for a meet as an HTML5 time element.
 * @param  string $start The start date timestamp.
 * @param  mixed  $end   The end date timestamp, set to false to not output this at all.
 * @return string        HTML formatted start and end dates.
 */
function sb_meet_dates($start, $end = false) {
	$output = '<time datetime="'.date("c", $start).'" itemprop="startDate" content="'.date("c", $start).'">'.date("jS F Y, g:ia", $start).'</time>';
	if($end) {
		$output .= "&ndash;";
		if(date("Ymd", $start) === date("Ymd", $end)) {
			$output .= '<time datetime="'.date("c", $end).'" itemprop="endDate" content="'.date("c", $end).'">'.date("g:ia", $end).'</time>';
		}
		else {
			$output .= '<time datetime="'.date("c", $end).'" itemprop="endDate" content="'.date("c", $end).'">'.date("jS F Y, g:ia", $end).'</time>';
		}
	}
	return $output;
}

/** 
 * Pass it a URL, it returns the attribute-safe service name that it links to. 
 * @param  string $url The URL of the link.
 * @return string      The already sanitised version of the service name. 
 */
function sb_social_service_from_url($url) {
	switch(parse_url($url, PHP_URL_HOST)) {
		case 'twitter.com':
		case 'www.twitter.com':
			return "twitter"; 
			break;
		case 'facebook.com':
		case 'www.facebook.com':
			return "facebook"; 
			break;
		case 'tumblr.com':
		case 'www.tumblr.com':
		case 'blog.severnbronies.co.uk':
			return "tumblr"; 
			break;
		case 'telegram.me':
		case 'www.telegram.me':
			return "telegram"; 
			break;
		case 'discordapp.com':
		case 'www.discordapp.com':
		case 'discordapp.gg':
		case 'www.discordapp.gg':
			return "discord"; 
			break;
		case 'github.com':
		case 'www.github.com':
			return "github"; 
			break;
	}
}