<?php
	$helper = new Helper();
	$menuCategoryList = $helper -> getCategoriesForUrl();
	$getSocialInformation = $helper -> getSocial();
	$siteMapLinks = $helper -> getSiteMap();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="Schönheitszimmer WIP">
		<meta name="author" content="David J. D.">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Schönheitszimmer</title>
		
		<script src="/public/dist/js/jquery.min.js"></script>
		<script src="/public/dist/js/history.min.js"></script>
		<script src="/public/dist/js/bootstrap.min.js"></script>
		<script src="/public/js/main.js"></script>
		<link rel="stylesheet" href="/public/dist/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="/public/dist/css/dropdownonhoover.css">
	</head>
	<body>
		<?php include(dirname(__FILE__).'/menu.php') ?>
		<div class="container">
			<div id="pageContent">
		