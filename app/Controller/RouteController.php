<?php

namespace Controller;

use \W\Controller\Controller;

class RouteController extends Controller
{

	/**
	 * Page d'accueil
	 */
	public function index()
	{
		// TRAITEMENT DU FORMULAIRE
		// CONTROLLER POUR GERER LE FORMULAIRE
		$objIdForm = new FormController;
		
		$idForm = $objIdForm->verifierInput("idForm");
		
		if ($idForm == "contact")
		{
			$objContact = new ContactController;
			$objContact->contactTraiter();
		}
		
		
		if ($idForm == "proposition")
		{
			$objProposition = new PropositionController;
			$objProposition->propositionTraiter();
		}
		
		$this->show('page/index');
	}
	
	/**
	 * Page projets
	 */
	public function projetsProposes ($pageActive = 1)
	{
		// TRAITEMENT DU FORMULAIRE
		// CONTROLLER POUR GERER LE FORMULAIRE
		$objIdForm = new FormController;
		
		$idForm = $objIdForm->verifierInput("idForm");
		if ($idForm == "contact")
		{
			$objContact = new ContactController;
			$objContact->contactTraiter();
		}
		
	
		if ($idForm == "proposition")
		{
			$objProposition = new PropositionController;
			$objProposition->propositionTraiter();
		}
		
		
		$this->show('page/projets-proposes',["pageActive" => $pageActive]);
	}
	
	/**
	 * Page projets
	 */
	public function projetsValides ($pageActive = 1)
	{
		// TRAITEMENT DU FORMULAIRE
		// CONTROLLER POUR GERER LE FORMULAIRE
		$objIdForm = new FormController;
		
		$idForm = $objIdForm->verifierInput("idForm");
		if ($idForm == "contact")
		{
			$objContact = new ContactController;
			$objContact->contactTraiter();
		}
		
	
		if ($idForm == "proposition")
		{
			$objProposition = new PropositionController;
			$objProposition->propositionTraiter();
		}
		
		
		$this->show('page/projets-valides',["pageActive" => $pageActive]);
	}

	public function ajaxVote () {
		
		$objVote = new VoteController;
		$textVote = $objVote->updateVote();
		echo $textVote;
	}
	
	public function ajaxComment () {
		
		$objComment = new CommentController;
		$textComment = $objComment->addComment();
		echo $textComment;
		
	}
	
	public function ajaxListComment () {
		
		$objComment = new CommentController;
		$textComment = $objComment->listComment();
		echo $textComment;
		
	}
	
	public function ajaxSignalement () {
		
		$objComment = new PropositionController;
		$textComment = $objComment->SignalementTraiter();
		echo $textComment;
		
	}
}