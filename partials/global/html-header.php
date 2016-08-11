<!doctype html>
<html lang="en-gb" dir="ltr" prefix="og: http://ogp.me/ns#" class="no-js">
<head>

	<!-- Technical metadata -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="all, noydir, noodp">
	<link rel="pingback" href="<?php bloginfo("pingback_url"); ?>">

	<!-- Content metadata -->
	<meta name="author" content="<?php bloginfo("name"); ?>">
	<meta name="copyright" content="<?php echo date("Y"); ?> <?php bloginfo("name"); ?>">
	<meta name="description" content="<?php bloginfo("description"); ?>">

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo sb_asset("images/favicon/apple-touch-icon.png"); ?>">
	<link rel="icon" type="image/png" href="<?php echo sb_asset("images/favicon/favicon-32x32.png"); ?>" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo sb_asset("images/favicon/favicon-16x16.png"); ?>" sizes="16x16">
	<link rel="manifest" href="<?php echo sb_asset("images/favicon/manifest.json"); ?>">
	<link rel="mask-icon" href="<?php echo sb_asset("images/favicon/safari-pinned-tab.svg"); ?>" color="<?php echo sb_theme_color(); ?>">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo("name"); ?>">
	<meta name="application-name" content="<?php bloginfo("name"); ?>">
	<meta name="theme-color" content="<?php echo sb_theme_color(); ?>">

	<!-- OpenGraph -->
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>">
	<meta name="twitter:site" content="@severnbronies">
<?php 
	if(have_posts()): 
		while(have_posts()):
			the_post();
		endwhile;
	endif;
	if(is_single()):
?>
	<meta name="twitter:card" content="summary_large_image">
	<meta property="og:type" content="article">
	<meta property="og:url" content="<?php the_permalink(); ?>">
	<meta property="og:title" content="<?php single_post_title(""); ?>">
	<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>">
	<meta property="og:image" content="<?php if (function_exists("wp_get_attachment_thumb_url")) { echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>">
<?php 
	else:
?>
	<meta name="twitter:card" content="summary">
	<meta property="og:type" content="website">
	<meta property="og:description" content="<?php bloginfo('description'); ?>">
	<meta property="og:image" content="<?php echo sb_asset("images/favicon/apple-touch-icon-180x180.png"); ?>">
<?php 
	endif;
?>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo sb_asset("css/stylesheet.css"); ?>">

	<!-- Preload JavaScript -->
	<script>
		GOOGLE_MAPS_API_KEY = "<?php echo GOOGLE_MAPS_API_KEY; ?>";
		var h =document.querySelector("html");
		h.classList.remove("no-js"); h.classList.add("js");
	</script>

	<!-- Page title -->
	<title><?php echo sb_page_title(); ?></title>

	<!-- Injected stuff -->
	<?php wp_head(); ?>

</head>
<body class="" <?php echo sb_body_attributes(); ?>>

	<ul class="accessibility-links">
		<li><a href="#bottom">Skip to navigation</a></li>
		<li><a href="#content">Skip to content</a></li>
	</ul>