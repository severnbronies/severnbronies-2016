
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
				<h6 class="footer__title">The big bits</h6>
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
				<h6 class="footer__title">Helpful stuff</h6>
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
				<h6 class="footer__title">Nice to know</h6>
				<?php
					wp_nav_menu(array(
						"theme_location" => "legalese",
						"menu_class" => "footer__list",
						"container" => false,
						"items_wrap" => '<ul class="%2$s">%3$s</ul>',
						"walker" => new sb_footer_walker
					));
				?>
			</div>
			<div class="footer__section footer__section--boilerplate">
				&copy;<?php echo date("Y"); ?> <?php bloginfo("name"); ?>. All rights reserved. 
				My Little Pony: Friendship is Magic is &copy; Hasbro. 
				Severn Bronies is not affiliated in any way with Hasbro or DHX Media. 
				No copyright infringement intended. All copyrights belong to their their respective owners.
				Website designed and developed by <a href="http://greysadventures.com/">Grey's Adventures</a>. 
			</div>
		</div>
	</footer>

</div><!-- /.wrapper -->
