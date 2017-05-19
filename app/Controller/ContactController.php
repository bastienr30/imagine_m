<?php

namespace Controller;

use \W\Controller\Controller;

class ContactController extends FormController {
    
    public function contactTraiter ()
	{
		// IL FAUT TRAITER LE FORMULAIRE DE CONTACT
		// RECUPERER LES INFOS DU FORMULAIRE
		$email        = $this->verifierInput("email");
		$objetMessage = $this->verifierInput("objetMessage");
		$message      = $this->verifierInput("message");
		
		// IL FAUT AVOIR UN EMAIL VALIDE
		if ($this->verifierEmail($email) && $objetMessage != "" && $message != "")
		{
    			$objetContactModel = new \Model\ContactModel;
    			
    			// ON CONSTRUIT UN TABLEAU ASSOCIATIF POUR INDIQUER
    			// LA VALEUR DE CHAQUE COLONNE
    			$tabLigne = [ "email"        => $email ,  
    			              "objetMessage" => $objetMessage ,  
    			              "message"      => $message, 
    			              "date"         => date("Y-m-d H:i:s") 
    			            ];
    			// REMARQUE: 
    			// IL FAUT UNE CLASSE AVEC LE NOM ContactModel
    			// POUR ECRIRE DANS LA TABLE MYSQL contact
    			$objetContactModel->insert($tabLigne);
    
    			//$this->tabInfoPage = [ "contactFeedback" => "MERCI POUR VOTRE MESSAGE ($titre)" ];
           
		}
		else
		{
			// KO
		}
		
	}
}