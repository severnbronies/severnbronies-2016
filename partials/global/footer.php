	<footer class="footer" id="bottom" role="contentinfo">
		<div class="footer__inner">
			<div class="footer__social-links">
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
			<div class="footer__navigation footer__navigation--primary">
				<h6 class="footer__title"><?php bloginfo("name"); ?></h6>
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
			<div class="footer__navigation footer__navigation--secondary">
				<h6 class="footer__title">Other stuff</h6>
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
			<div class="footer__boilerplate">
				<p>
					&copy;<?php echo date("Y"); ?> Severn Bronies Ltd. All rights reserved. 
					Severn Bronies Ltd. is a registered company in England and Wales. Company number: 10718261.
					Registered office: Flat 3, 9 Manilla Road, Bristol, BS8 4ED, United Kingdom.
					<em>My Little Pony: Friendship is Magic</em> is &copy; Hasbro. 
					Severn Bronies Ltd. is not affiliated in any way with Hasbro or DHX Media. 
					No copyright infringement intended. All copyrights belong to their their respective owners.
					Website designed and developed by <a href="http://greysadventures.com/">Grey's Adventures</a>.
				</p>
				<?php
					wp_nav_menu(array(
						"theme_location" => "legalese",
						"menu_class" => "footer__boilerplate-links",
						"container" => false,
						"items_wrap" => '<ul class="%2$s">%3$s</ul>',
						"walker" => new sb_naked_navigation_walker
					));
				?>
			</div>
		</div>
	</footer>
</div><!-- /.wrapper -->
