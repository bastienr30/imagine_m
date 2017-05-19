<?php

namespace Controller;

use \W\Controller\Controller;

class PropositionController extends FormController {
    
    public function propositionTraiter ()
	{
		// IL FAUT TRAITER LE FORMULAIRE DE PROPOSITION
		// RECUPERER LES INFOS DU FORMULAIRE
		
		$pseudo = $this->verifierInput("pseudo");
		$email = $this->verifierInput("email");
		$url = $this->verifierInput("url");
		$photo = "";
		$titreAnnonce = $this->verifierInput("titreAnnonce");
		$description = $this->verifierInput("description");
		$categorie = $this->verifierInput("categorie");
		$adresse = $this->verifierInput("adresse");
	
		if (isset($_FILES["photo"]) && $pseudo !="" && $adresse !="" && $this->verifierEmail($email) && $url !="" && $titreAnnonce !="" && $description !="" && $categorie !="") {
			
			
			$photo = $this->enregistrerImage("photo");
            
			if ($photo !="")
			{
			
				$objetPropositionModel = new \Model\PropositionModel;
				// ON CONSTRUIT UN TABLEAU ASSOCIATIF POUR INDIQUER
				// LA VALEUR DE CHAQUE COLONNE
				$tabLigne = [	"pseudo" => $pseudo ,  
								"email" => $email ,  
								"url" => $url ,
								"adresse" => $adresse , 
								"photo" => $photo ,  
								"titreAnnonce" => $titreAnnonce ,  
								"description" => $description,
								"categorie" => $categorie,
								"date" => date("Y-m-d H:i:s") 
							];
				// REMARQUE: 
				// IL FAUT UNE CLASSE AVEC LE NOM PropositionModel
				// POUR ECRIRE DANS LA TABLE MYSQL proposition
				
				$tabProposition = $objetPropositionModel->insert($tabLigne);	
				// ON CONSTRUIT UN TABLEAU ASSOCIATIF POUR INDIQUER
				// LA VALEUR DE CHAQUE COLONNE
				$tabLigne = [	"idProposition" => $tabProposition["id"],  
								"votesPositifs" => "0" ,  
								"votesNegatifs" => "0" ,  
							];
							
				$objetVoteModel = new \Model\VoteModel;		
				$objetVoteModel->insert($tabLigne);
	
				//$this->tabInfoPage = [ "annonceFeedback" => "MERCI POUR VOTRE ANNONCE ($titre)" ];
		}
		else
		{
			// KO
			die('coucou');
		}
		
	}	
	else
	{
			// KO
	}
}

    public function SignalementTraiter ()
	{
	// IL FAUT TRAITER LE FORMULAIRE DE PROPOSITION
	// RECUPERER LES INFOS DU FORMULAIRE
	$id = $this->verifierInput("id");
	
	if ($id !="") {
		
			$objetPropositionModel = new \Model\PropositionModel;
			
			$tabProposition = $objetPropositionModel->find($id);
    		$signalement = $tabProposition["signalement"];
			// ON CONSTRUIT UN TABLEAU ASSOCIATIF POUR INDIQUER
			// LA VALEUR DE CHAQUE COLONNE
			
			$signalement ++;
			$tabLigne = [ "signalement" => $signalement ];
			// REMARQUE: 
			// IL FAUT UNE CLASSE AVEC LE NOM PropositionModel
			// POUR ECRIRE DANS LA TABLE MYSQL proposition
			
			$tabProposition = $objetPropositionModel->update($tabLigne, $id);

			//$this->tabInfoPage = [ "annonceFeedback" => "MERCI POUR VOTRE ANNONCE ($titre)" ];
			
			if($tabProposition == false) {
        			return 'erreur';	
        	}
        	else {
        			return json_encode($tabProposition);
        	}
	}
	else
	{
		// KO
	}
}
	
	public function enregistrerImage($fichierTransmis) {
		// AVEC PHP, ON VA TROUVER LES UPLOADS DANS UN TABLEAU $_FILES;
		// DEBUG
		//print_r($_FILES);
		
		// $_FILES EST UN TABLEAU DE TABLEAU
		//         <input type="file" name="fichierTransmis" />
		if (isset($_FILES[$fichierTransmis]))
		{
		    $tabInfoUpload = $_FILES[$fichierTransmis];
		    $error         = $tabInfoUpload["error"];
		    if ($error == 0)
		    {
		        // OK
		        // PAR SECURITE
		        // APACHE ET PHP ONT MIS LE FICHIER EN QUARANTAINE
		        // IL A ETE STOCKE DANS UN ESPACE TEMPORAIRE AVEC UN NOM ALEATOIRE
		        $tmpName    = $tabInfoUpload["tmp_name"];
		        // NOM DU FICHIER DEPUIS L'ORDINATEUR DU VISITEUR
		        $nomOrigine = $tabInfoUpload["name"];
		        
		        // JE VAIS VERIFIER L'EXTENSION DU NOM DU FICHIER D'ORIGINE
		        // ET JE VAIS VALIDER CETTE EXTENSION PAR RAPPORT A UNE LISTE D'EXTENSION AUTORISES
		        $tabExtensionOK = [ "png", "jpg", "jpeg", "gif", "svg" ];
		        
		        // http://php.net/manual/fr/function.pathinfo.php
		        $extensionUpload = pathinfo($nomOrigine, PATHINFO_EXTENSION);
		        // FILTRER EN MINUSCULES
		        // http://php.net/manual/fr/function.strtolower.php
		        $extensionUpload = strtolower($extensionUpload);
		        
		        // JE VAIS CHECKER SI L'EXTENSION FAIT PARTIE DE LA LISTE OK
		        // http://php.net/manual/fr/function.in-array.php
		        if (in_array($extensionUpload, $tabExtensionOK))
		        {
		            // OK
		            // SI JE FAIS CONFIANCE AU VISITEUR
		            // JE VAIS DEPLACER LE FICHIER EN QUARANTAINE
		            // VERS UN DOSSIER public/assets/uploads
		            // http://php.net/manual/fr/function.move-uploaded-file.php
		            $cheminDestinationFinale = "assets/uploads/$nomOrigine";
		            move_uploaded_file($tmpName, $GLOBALS["cheminWmaster"]."/public/".$cheminDestinationFinale);
		            $photo = $cheminDestinationFinale;
		            return $photo;
		        }
		        
		    }
			else 
		    {
		        // KO
		    }
		}
	}
}