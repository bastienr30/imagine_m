<?php

namespace Controller;

use \W\Controller\Controller;

class VoteController extends FormController {
	
	
    
    public function updateVote () {
    	

		$type     = $this->verifierInput("type");
		$id       = $this->verifierInput("id");
		
		if ($type != "" && $id != "")
		{
    			$objetVoteModel = new \Model\VoteModel;
    			
    			$tabVote = $objetVoteModel->find($id);
    			
    			$votesPositifs = $tabVote["votesPositifs"];
    			$votesNegatifs = $tabVote["votesNegatifs"];
    	
    			
				if($type == "votesPositifs") {
					$votesPositifs++;
					$valeurVote = $votesPositifs;
				}
				
				if($type == "votesNegatifs") {
					$votesNegatifs++;
				    $valeurVote = $votesNegatifs;
				}
				
				
        		$tabVote = $objetVoteModel->update([$type => $valeurVote], $id);
        		
        		if($tabVote == false) {
        			return 'erreur';	
        		}
        		else {
        			return json_encode($tabVote);
        		}
		}
		else
		{
			// KO
		}
    }
  
}