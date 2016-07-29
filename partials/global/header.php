<div class="wrapper" id="top">

	<?php 
		if(is_home()):
	?>
		homepage
	<?php 
		endif;
	?>

	<header class="masthead" role="banner">
		<div class="masthead__inner">
			<a class="masthead__branding" href="/">
				<img class="masthead__logo" src="<?php echo sb_asset("images/logo.svg"); ?>" alt="<?php bloginfo("name"); ?>">
			</a>
			<div class="masthead__nav-toggle">
				<a class="masthead__nav-toggle__link" href="#bottom">
					<span class="masthead__nav-toggle__label">Menu</span>
				</a>
			</div>
			<nav class="navigation masthead__nav" role="navigation">
				<div class="navigation__inner">
					<?php
						wp_nav_menu(array(
							"theme_location" => "primary",
							"menu_class" => "navigation__list",
							"container" => false,
							"items_wrap" => '<ul class="%2$s">%3$s</ul>',
							"walker" => new sb_navigation_walker
						));
					?>
				</div>
			</nav>
		</div>
	</header>

	

	<!--[if lt IE 9]>
		<div class="banner-message banner-message--warning">
			<div class="content banner-message__body">
				<p><strong>Your browser is old. Really old. Old as balls.</strong> It's so old that not only does it not support modern web technologies properly, it's not even supported by Microsoft anymore and is probably a risk to your safety. You should really <a href="http://browsehappy.org/">upgrade to a better browser</a>, like, right now. Seriously, we'll wait for you.</p>
			</div>
		</div>
	<![endif]-->

	<?php 
		if(!isset($_COOKIE["sbCookieMessage"])) :
	?>
		<div class="banner-message">
			<div class="content banner-message__body">
				<p><strong>We're legally obliged to tell you that this website uses cookies</strong>, some of which may stalk you relentlessly across the internet. For more information see our <a href="/privacy-policy">page about cookies</a>. That's it. You can carry on with your life now, sleeping soundly, safe in the knowledge that this website uses cookies.</p>
			</div>
			<a class="banner-message__close" data-close-banner="sbCookieMessage" href="#">&times;</a>
		</div>
	<?php 
		endif;
	?>