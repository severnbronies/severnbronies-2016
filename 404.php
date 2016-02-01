<?php
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
?>

	<main class="body" id="content" role="main">
		<div class="template-error-page">
			<div class="template-error-page__image">
				<img alt="" src="<?php echo get_template_directory_uri(); ?>/dst/images/error-derpy.png">
			</div>
			<h1 class="template-error-page__title">We just don't know what went wrong!</h1>
			<div class="content template-error-page__body">
				<p>The page you were looking for doesn't exist. It might be that you clicked on a broken link, this page has been removed, or you simply typed gibberish into the address bar. Either way, this is probably not the page you were looking for.</p>
				<p>Try <a href="javascript:history.go(-1)">going back</a> where you came from, <a href="/search">searching</a> for what you're looking for, or head to <a href="/">the homepage</a> and starting again.</p>
				<p><small>Derpy image by <a href="http://datnaro.deviantart.com/art/Derpy-280765527">datNaro on DeviantArt</a>.</small></p>
			</div>
		</div>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>