<!doctype html>
<html lang="en-gb" dir="ltr" class="no-js">
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
	<meta name="geo.region" content="GB-BST">
	<meta name="geo.placename" content="Bristol">
	<meta name="geo.position" content="51.454513;-2.58791">
	<meta name="ICBM" content="51.454513, -2.58791">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dst/css/stylesheet.css">

	<!-- Preload JavaScript -->
	<script src="<?php echo get_template_directory_uri(); ?>/dst/js/preload.js"></script>
	<script>
		GOOGLE_MAPS_API_KEY = "<?php echo GOOGLE_MAPS_API_KEY; ?>";
	</script>

	<!-- Page title -->
	<title><?php echo sb_page_title(); ?></title>

</head>
<body class="" <?php echo sb_body_attributes(); ?>>

	<ul class="accessibility-links">
		<li><a href="#bottom">Skip to navigation</a></li>
		<li><a href="#content">Skip to content</a></li>
	</ul>