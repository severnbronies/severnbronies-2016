<?php

/**
 * Prettify search URLs because WordPress doesn't do that by default.
 */
function sb_search_url_rewrite_rule() {
	if(is_search() && !empty($_GET['s'])) {
		wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
		exit();
	} 
}
add_action("template_redirect", "sb_search_url_rewrite_rule");

/**
 * Register navigation menus
 */
register_nav_menus(array(
	"primary" => "Primary navigation", 
	"secondary" => "Useful links",
	"legalese" => "Legalese links",
	"social" => "Social links"
));

/**
 * Custom navigation walkers
 */
class sb_navigation_walker extends Walker_Nav_Menu {
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$attributes = 'class="navigation__link"';
		$classes = "navigation__item";
		if(!empty($item->attr_title) && $item->attr_title !== $item->title) {
			$attributes .= ' title="' . esc_attr($item->attr_title) . '"';
		}
		if(!empty($item->url)) {
			$attributes .= ' href="' . esc_attr($item->url) . '"';
		}
		if($item->classes[0] != "") {
			$classes .= " " . $item->classes[0];
		}
		if($item->current) {
			$classes .= " navigation__item--current";
		}
		$output .= "<li class=\"$classes\">";
		$attributes = trim( $attributes );
		$title = apply_filters("the_title", $item->title, $item->ID);
		$item_output = "$args->before<a $attributes>$args->link_before$title$args->link_after</a>$args->after";
		$output .= apply_filters(
			'walker_nav_menu_start_el',
			$item_output,
			$item,
			$depth,
			$args
		);
	}
	public function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= '</li>';
	}
	public function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '<ul>';
	}
	public function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '</ul>';
	}
}

class sb_footer_walker extends Walker_Nav_Menu {
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$attributes = 'class="footer__link"';
		$classes = "footer__item";
		if(!empty($item->attr_title) && $item->attr_title !== $item->title) {
			$attributes .= ' title="' . esc_attr($item->attr_title) . '"';
		}
		if(!empty($item->url)) {
			$attributes .= ' href="' . esc_attr($item->url) . '"';
		}
		if($item->classes[0] != "") {
			$classes .= " " . $item->classes[0];
		}
		$output .= "<li class=\"$classes\">";
		$attributes = trim( $attributes );
		$title = apply_filters("the_title", $item->title, $item->ID);
		$item_output = "$args->before<a $attributes>$args->link_before$title$args->link_after</a>$args->after";
		$output .= apply_filters(
			'walker_nav_menu_start_el',
			$item_output,
			$item,
			$depth,
			$args
		);
	}
	public function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= '</li>';
	}
	public function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '<ul>';
	}
	public function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '</ul>';
	}
}

class sb_social_links_walker extends Walker_Nav_Menu {
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$attributes = 'class="social-links__link social-links__link--' . strtolower($item->title) . '"';
		$classes = "social-links__item";
		if(!empty($item->attr_title) && $item->attr_title !== $item->title) {
			$attributes .= ' title="' . esc_attr($item->attr_title) . '"';
		}
		if(!empty($item->url)) {
			$attributes .= ' href="' . esc_attr($item->url) . '"';
		}
		$output .= "<li class=\"$classes\">";
		$attributes = trim( $attributes );
		$title = apply_filters("the_title", $item->title, $item->ID);
		$item_output = "$args->before<a $attributes>$args->link_before<span class=\"social-links__label\">$title</span>$args->link_after</a>$args->after";
		$output .= apply_filters(
			'walker_nav_menu_start_el',
			$item_output,
			$item,
			$depth,
			$args
		);
	}
	public function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= '</li>';
	}
	public function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '<ul>';
	}
	public function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '</ul>';
	}
}

class sb_naked_navigation_walker extends Walker_Nav_Menu {
	public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$attributes = '';
		if(!empty($item->url)) {
			$attributes .= ' href="' . esc_attr($item->url) . '"';
		}
		$output .= "<li>";
		$attributes = trim( $attributes );
		$title = apply_filters("the_title", $item->title, $item->ID);
		$item_output = "$args->before<a $attributes>$args->link_before$title</a>$args->link_after$args->after";
		$output .= apply_filters(
			'walker_nav_menu_start_el',
			$item_output,
			$item,
			$depth,
			$args
		);
	}
	public function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '<ul>';
	}
	public function end_lvl(&$output, $depth = 0, $args = array()) {
		$output .= '</ul>';
	}
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= '</li>';
	}
}