</div><!-- /.wrapper -->

<div class="menu" id="navigation">
	<div class="menu__top">
		<form class="search-form menu__search-form" role="search">
			<input class="search-form__input" type="search" placeholder="Search&hellip;">
			<span class="search-form__buttons">
				<button class="search-form__submit" type="submit">Search</button>
			</span>
		</form>
		<nav class="navigation navigation--primary menu__navigation" role="navigation" aria-label="Primary">
			<?php
				wp_nav_menu(array(
					"theme_location" => "primary",
					"menu_class" => "navigation__list",
					"container" => false,
					"items_wrap" => '<ul class="%2$s">%3$s</ul>',
					"walker" => new sb_navigation_walker
				));
			?>
		</nav>
		<nav class="navigation navigation--secondary menu__subnavigation" role="navigation" aria-label="Secondary">
			<?php
				wp_nav_menu(array(
					"theme_location" => "secondary",
					"menu_class" => "navigation__list",
					"container" => false,
					"items_wrap" => '<ul class="%2$s">%3$s</ul>',
					"walker" => new sb_navigation_walker
				));
			?>
		</nav>
	</div>
	<div class="menu__bottom">
		<nav class="social-links menu__social-links" role="navigation" aria-label="Social Media Links">
			<?php
				wp_nav_menu(array(
					"theme_location" => "social",
					"menu_class" => "social-links__list",
					"container" => false,
					"items_wrap" => '<ul class="%2$s">%3$s</ul>',
					"walker" => new sb_social_links_walker
				));
			?>
		</nav>
		<div class="menu__boilerplate" role="contentinfo">
			<small>
				&copy;<?php echo date("Y"); ?> <?php bloginfo("name"); ?>. All rights reserved. <br>
				All copyrights belong to their their respective owners.
			</small>
		</div>
	</div>
</div>
