<?php

namespace Controller;

use \W\Controller\Controller;

class FormController {
	// AJOUTER LA METHODE verifierInput
	// FONCTION QUI RECUPERE LES INFOS DU FORMULAIRE
	function verifierInput ($nameInput)
	{
		// JE VERIFIE SI L'INFO EST PRESENTE
		if (isset($_REQUEST[$nameInput]))
		{
			// ALORS JE LA RECUPERE
			$resultat = $_REQUEST[$nameInput];
		}
		else
		{
			// SINON, JE METS UNE VALEUR PAR DEFAUT (CHAINE VIDE)
			$resultat = "";
		}
	
		// AJOUTER DE LA SECURITE
		// FILTRE QUI ENLEVE LES BALISES HTML
		// http://php.net/manual/en/function.strip-tags.php
		$resultat = strip_tags($resultat);
		// http://php.net/manual/en/function.trim.php
		$resultat = trim($resultat);
		
		// RENVOIE LA VALEUR TROUVEE
		return $resultat;
	}

	function verifierEmail ($email)
	{
	    $resultat = false;  // MODE PARANO
	    
	    // VERIFIER SI $email EST DANS LE BON FORMAT
	    $resultat = (filter_var($email, FILTER_VALIDATE_EMAIL) !== false);
	    // $email OK => $email !== false => true
	    // $email KO => false  !== false => false
	    
	    return $resultat;
	}    
}