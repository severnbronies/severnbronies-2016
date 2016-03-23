<!-- 	<aside class="search-overlay">
		<form class="search-form" role="search" method="get" action="/search">
			<input class="search-form__input" type="search" placeholder="Type to search&hellip;">
			<span class="search-form__buttons">
				<button class="search-form__submit" type="submit">Search</button>
			</span>
		</form>
	</aside>
 -->
	<footer class="footer" id="bottom" role="contentinfo">
		<div class="footer__inner">
			<div class="footer__section footer__section--social">
				<h6 class="footer__title"><?php bloginfo("name"); ?></h6>
				<?php
					wp_nav_menu(array(
						"theme_location" => "social",
						"menu_class" => "social-links__list",
						"container_class" => "social-links",
						"items_wrap" => '<ul class="%2$s">%3$s</ul>',
						"walker" => new sb_social_links_walker
					));
				?>
			</div>
			<div class="footer__section">
				<h6 class="footer__title">The Big Bits</h6>
				<?php
					wp_nav_menu(array(
						"theme_location" => "primary",
						"menu_class" => "footer__list",
						"container" => false,
						"items_wrap" => '<ul class="%2$s">%3$s</ul>',
						"walker" => new sb_footer_walker
					));
				?>
			</div>
			<div class="footer__section">
				<h6 class="footer__title">Nice to Know</h6>
				<?php
					wp_nav_menu(array(
						"theme_location" => "secondary",
						"menu_class" => "footer__list",
						"container" => false,
						"items_wrap" => '<ul class="%2$s">%3$s</ul>',
						"walker" => new sb_footer_walker
					));
				?>
			</div>
			<div class="footer__section">
				<h6 class="footer__title">Helpful Things</h6>
				<?php
					wp_nav_menu(array(
						"theme_location" => "secondary",
						"menu_class" => "footer__list",
						"container" => false,
						"items_wrap" => '<ul class="%2$s">%3$s</ul>',
						"walker" => new sb_footer_walker
					));
				?>
			</div>
			<div class="footer__section footer__section--boilerplate">
				&copy;<?php echo date("Y"); ?> <?php bloginfo("name"); ?>. All rights reserved. 
				All copyrights belong to their their respective owners.
			</div>
		</div>
	</footer>

</div><!-- /.wrapper -->
