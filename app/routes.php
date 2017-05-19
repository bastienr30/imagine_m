<?php
	
	$w_routes = array(
		//['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/', 'Route#index', 'route_index'],  // devient page d'accueil
		['GET|POST', '/projets-proposes/[:pageActive]?/', 'Route#projetsProposes', 'route_projetsProposes'],
		['GET|POST', '/projets-valides/[:pageActive]?/', 'Route#projetsValides', 'route_projetsValides'],
		['GET|POST', '/ajaxVote/', 'Route#ajaxVote', 'route_ajaxVote'],
		['GET|POST', '/ajaxComment/', 'Route#ajaxComment', 'route_ajaxComment'],
		['GET|POST', '/ajaxListComment/', 'Route#ajaxListComment', 'route_ajaxListComment'],
		['GET|POST', '/ajaxSignalement/', 'Route#ajaxSignalement', 'route_ajaxSignalement'],
	);