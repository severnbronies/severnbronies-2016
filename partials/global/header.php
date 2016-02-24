<div class="wrapper">

	<header class="masthead" role="banner">
		<div class="masthead__branding">
			<a href="/">Severn Bronies</a>
		</div>
		<div class="masthead__menu">
			<a class="masthead__link" href="#navigation">
				<span class="masthead__icon"></span>
				<span class="masthead__label">Menu</span>
			</a>
		</div>
		<div class="masthead__alert">
			<a class="masthead__link" href="#alerts">
				<span class="masthead__icon"></span>
				<span class="masthead__label">Alerts</span>
			</a>
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
				<p><strong>We're legally obliged to tell you that this website uses cookies</strong>, some of which may stalk you relentlessly into the night. For more information see our <a href="#">page about cookies</a>. That's it. You can carry on with your life now, sleeping soundly, safe in the knowledge that this website uses cookies.</p>
			</div>
			<a class="banner-message__close" data-close-banner="sbCookieMessage" href="#">&times;</a>
		</div>
	<?php 
		endif;
	?>