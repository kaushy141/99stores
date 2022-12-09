<?=doctype();?>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title><?= esc($title) ?> - <?=APP_NAME?></title>
    <meta name="description" content="<?= esc($description) ?>" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="<?= esc($title) ?>" />
	<meta name="twitter:description" content="<?= esc($description) ?>" />
	<meta name="twitter:image" content="<?= esc($image) ?>" />
	<meta name="msapplication-TileImage" content="<?= esc($image) ?>" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:site_name" content="<?= esc($site_name) ?>" />
	<meta property="og:title" content="<?= esc($title) ?>" />
	<meta property="og:url" content="<?= esc($url) ?>" />
	<meta property="og:type" content="<?= esc($type) ?>" />
	<meta property="og:description" content="<?= esc($description) ?>" />
	<meta property="og:image" content="<?= esc($image) ?>" />
	<meta property="og:image:url" content="<?= esc($image) ?>" />
	<meta property="og:image:secure_url" content="<?= esc($image) ?>" />
	<meta itemprop="name" content="<?= esc($page_name) ?>" />
	<meta itemprop="headline" content="<?= esc($title) ?>" />
	<meta itemprop="description" content="<?= esc($description) ?>" />
	<meta itemprop="image" content="<?= esc($image) ?>" />
	<meta itemprop="author" content="<?= esc($author) ?>" />
	<meta name="twitter:title" content="<?= esc($title) ?>" />
	<meta name="twitter:url" content="<?= esc($url) ?>" />
	<meta name="twitter:description" content="<?= esc($description) ?>" />
	<meta name="twitter:image" content="<?= esc($image) ?>" />

    <!-- Favicon -->
	<?php echo link_tag('favicon.ico', 'image/x-icon', 'img/favicon/favicon.ico'); ?>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
	<?php echo link_tag('public/vendor/fonts/boxicons.css'); ?>

    <!-- Core CSS -->	
	<?php echo link_tag('public/vendor/css/core.css'); ?>
	<?php echo link_tag('public/vendor/css/theme-default.css'); ?>
	<?php echo link_tag('public/css/demo.css'); ?>

    <!-- Vendors CSS -->
	<?php echo link_tag('public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>
    <!-- Page CSS -->
	<?php echo link_tag('public/vendor/libs/apex-charts/apex-charts.css'); ?>
    <!-- Page -->
	<?php echo link_tag('public/vendor/css/pages/page-auth.css'); ?>
	<?php echo link_tag('public/css/jquery-confirm.min.css'); ?>
    <!-- Helpers -->
	<?php echo script_tag('public/vendor/js/helpers.js'); ?>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<?php echo script_tag('public/js/config.js'); ?>
	<script src="https://kit.fontawesome.com/957a43b0fe.js" crossorigin="anonymous"></script>
  </head>
  <body>