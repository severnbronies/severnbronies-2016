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

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/favicon-194x194.png" sizes="194x194">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/manifest.json">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/safari-pinned-tab.svg" color="#2b2e4a">
	<meta name="msapplication-TileColor" content="#2b2e4a">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/dst/images/favicon/mstile-144x144.png">
	<meta name="theme-color" content="<?php echo sb_theme_color(); ?>">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dst/css/stylesheet.css">

	<!-- Preload JavaScript -->
	<script>
		GOOGLE_MAPS_API_KEY = "<?php echo GOOGLE_MAPS_API_KEY; ?>";
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