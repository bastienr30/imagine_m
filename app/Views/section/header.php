<!DOCTYPE html>
<html lang="fr">
<head>

	<title>Imagine Marseille - Accueil</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/normalize.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/slider-pro.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/main.css') ?>">
	
	<script>
		var routeVote = "<?php echo $this->url("route_ajaxVote"); ?>";
		var routeComment = "<?php echo $this->url("route_ajaxComment"); ?>";
		var routeListComment = "<?php echo $this->url("route_ajaxListComment"); ?>";
		var routeSignalement = "<?php echo $this->url("route_ajaxSignalement"); ?>";
	</script>
	<script src="<?= $this->assetUrl('js/less.min.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/jquery-3.1.0.min.js') ?>"></script>


</head>
<body>

	<!-- Entête contenant un logo, une Navigation -->
	
	
	<header id="header">
		
		<div id="menuPrincipal">
			<div id="menu">
				<div class="buttonMenu"></div>
			</div>
	
			<nav class="navbar">
				<ul>
					<li><a href="<?php echo $this->url("route_index") ?>">Accueil</a></li>
					<li><a href="<?php echo $this->url("route_projetsValides"); ?>">Vos annonces</a></li>
					<li class="last-li"><a href="<?php echo $this->url("route_projetsProposes"); ?>">Vos propositions</a></li>
				</ul>
	
			</nav>
		</div>
		

		<!--
		<nav class ="navbar">
            <ul class="topnav" id="myTopnav">
				<li><a href="<?php // echo $this->url("route_index") ?>">Accueil</a></li>
				<li><a href="<?php // echo $this->url("route_projetsValides"); ?>">Vos annonces</a></li>
				<li class="last-li"><a href="<?php // echo $this->url("route_projetsProposes"); ?>">Vos propositions</a></li>
				
				<li class="icon">
                	<a href="#" onclick="return false;" style="font-size:15px;" class="btnMenu">☰</a>
                </li>
			</ul>

		</nav>
		
		-->
		<!--

		--><h2 id="logo">Imagine Marseille</h2><br><br>
		<h2>Quoi de neuf à Marseille et ses environs ? </h3>
		<h3>Découvrez nos annonces et mettez-les en haut de l'affiche !</h3>
	</header>
	
	<main>