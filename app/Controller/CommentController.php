<?php

namespace Controller;

use \W\Controller\Controller;

class CommentController extends FormController {
    
    public function addComment () {
    	
    $idProposition = $this->verifierInput("idProposition");
	$pseudoCom     = $this->verifierInput("pseudoCom");
	$comment       = $this->verifierInput("comment");
		

		if ($idProposition != "" && $pseudoCom != ""  && $comment != "")
		{
    	    $objetCommentModel = new \Model\CommentModel;
    			
	
			$tabLigne = [ "idProposition" => $idProposition,  
			              "pseudoCom"     => $pseudoCom ,  
			              "comment"       => $comment, 
			              "dateCom"          => date("Y-m-d H:i:s") 
			            ];
			            
			

			$tabComment = $objetCommentModel->insert($tabLigne);
			
			if($tabComment == false) {
        			return 'erreur';	
        	}
        	else {
        		return json_encode($tabComment);
        	}
			
		}	
		else
		{
			// KO
		}
    }   
    
    public function ListComment () {
        	
        $idProposition = $this->verifierInput("idProposition");
        
    	if ($idProposition != "")
		{
			
        $objetCommentModel = new \Model\CommentModel;
	
		$tabComment = $objetCommentModel->search(["idProposition" => $idProposition]); 
		
		return json_encode($tabComment);
		}
		else
		{
			// KO
		}
    }  
    
}