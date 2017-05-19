<!-- ANNONCES SOUMISES AUX VOTES -->

<section id="projetsValides" class="page current sectionValide">
<?php
$quantite = 4;
$indiceDepart = ($pageActive -1) * $quantite;
$indexMax = $indiceDepart + $quantite;

$objetPropositionModel = new \Model\PropositionModel;
$tabProposition = $objetPropositionModel->findAll();

$indexMax = $indiceDepart + $quantite;

$nbrAffichage = 0;

foreach($tabProposition as $tabLigne){
	
	$id 		 = $tabLigne["id"];
	$titreAnnonce= $tabLigne["titreAnnonce"];
	$description = $tabLigne["description"];
    $photo       = $tabLigne["photo"];
    $url         = $tabLigne["url"];
    $categorie   = $tabLigne["categorie"];
    $signalement = $tabLigne["signalement"];
    $pseudo      = $tabLigne["pseudo"];
    $date        = $tabLigne["date"];
    $adresse     = $tabLigne["adresse"];
    $dateHTML    = date("d/m/Y", strtotime($date));
    $dateEntree  = date("Y-m-d", strtotime($date));
    
	//$dateAnnonce = '2016-12-13';
	
	//calcul de la différence entre la date d'entrée et la date actuelle
	$datetime1 = new DateTime($dateEntree);
	$datetime2 = new DateTime(date('Y-m-d'));
	$interval = $datetime1->diff($datetime2)->days; //nombre de jours de l'interval
	
	// dans projets-valides
	//si interval = 30 à 20, icone timer5 (vert)
	//si interval = 19 à 10, icone timer4 (orange)
	//si interval = 9 à 0, icone timer1 (rouge)

    
    $delai = 30 - ($interval - 15);
    
    $vert   = $this->assetUrl('/img/timer5.png');
    $orange = $this->assetUrl('/img/timer4.png');
	$rouge  = $this->assetUrl('/img/timer1.png');
	
	if ($delai <=9)
	{
		$chemin = $rouge;
		
	} elseif ($delai <= 19 || $delai >= 10) 
	{
		$chemin = $orange;
		
	} elseif ($delai >= 20) 
	{
		$chemin = $vert;
		
	} else 
	{
		$chemin = "";
	}
	
	
	$objetVoteModel = new \Model\VoteModel;
	$tabProposition = $objetVoteModel->search(["idProposition" => $id]); 
	
	
	$votesPositifs = $tabProposition[0]["votesPositifs"];
	$votesNegatifs = $tabProposition[0]["votesNegatifs"];
	
	
	if($signalement < 10 && $votesPositifs >= 200 && $votesNegatifs < 50 && $interval < 45 && $interval > 15) {
		$nbrAffichage++;
		if($nbrAffichage > $indiceDepart && $nbrAffichage <= $indexMax)
		{
			$cheminImage = $this->url("route_index");  // on revient à la racine
			$cheminImageBackground = $this->assetUrl('img/annonce'.$categorie.'.png');
			
			$cheminBoutonCom = $this->assetUrl('img/comment.png');
			$cheminBoutonPlus = $this->assetUrl('img/infos-plus.png');

$codeHTML    =

<<<CODEHTML
<article class="valides" data-interval="$interval">

	<div class="enteteAnnonce">
		<div class="pseudo"><div class="couleur$categorie">Proposée par</div> $pseudo</div>
	</div>
	
	<div>
		<div class="date"><div class="couleur$categorie">Le</div> $dateHTML (il vous reste $delai jour(s))
		<img src ="$chemin" alt="$chemin" class="timer" />
		</div>
	</div>
			
	<div class="annonceValide">
	
		<div class="front">
		
			<div class="$categorie">
				<div class="image">
					<img src="$cheminImage$photo" alt="$titreAnnonce" />
				</div>
				
				<div class="description$categorie descriptionCat">
					<h3 class="titreAnnonce">$titreAnnonce</h3>
					<p>$description</p>
					
					<div class="infosArticle">
						<a href="" onclick="return false;" class="infosCom"><img src="$cheminBoutonCom"/></a>
						<a href="" class="infosPlus" onclick="return false;"><img src="$cheminBoutonPlus"/></a>
					</div><!--
					--><a href="$url" target="_blank" class="visite">Visiter le site</a>
					
					
				</div>
		
				<div class="popUp">
					
					<input type="hidden" value="$id" class="idComment"/>
									
				</div>
			</div>
		</div>
		
			
		<div class="back">
			<div id="map$id" class="map"></div>
			<div class="description$categorie">
				<div id="address$id" class="adresse">$adresse</div>
				<a href="" class="infosClose" onclick="return false;"></a>
				<div class="infosArticle"><a href="" class="infosClose" onclick="return false;"><img src="$cheminBoutonPlus"/></a></div>
			</div>
			
			
		</div>
			
		
	</div>
	
</article>
CODEHTML;


	
// on reconstitue le chemin pour aller jusqu'à la photo


			echo $codeHTML;
		}
	}
}

$objetPropositionModel = new \Model\PropositionModel;
$tabProposition = $objetPropositionModel->findAll();

foreach($tabProposition as $tabLigne){
	$id = $tabLigne["id"];
    $signalement = $tabLigne["signalement"];
    $date        = $tabLigne["date"];
    $dateEntree    = date("Y-m-d", strtotime($date));
    
    $datetime1 = new DateTime($dateEntree);
	$datetime2 = new DateTime(date('Y-m-d'));
	$interval = $datetime1->diff($datetime2)->days; //nombre de jours de l'interval
    
    $objetVoteModel = new \Model\VoteModel;
	$tabProposition = $objetVoteModel->search(["idProposition" => $id]); 
	
	
	$votesPositifs = $tabProposition[0]["votesPositifs"];
	$votesNegatifs = $tabProposition[0]["votesNegatifs"];


	
	if($signalement < 10 && $votesPositifs >= 200 && $votesNegatifs < 50 && $interval < 45 && $interval > 15) {
		$nbAnnonce++;
	}
	
}	

$nbPage = ceil($nbAnnonce / $quantite);

if ($pageActive >= 1 && $nbPage > 1  && $pageActive < $nbPage) {
	$pagePlus = $pageActive + 1;
}
else {
	$pagePlus = $nbPage;
}

if ($pageActive > 1) {
	$pageMoins = $pageActive - 1;
}
else {
	$pageMoins = $pageActive;
}

?>




	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApu39P2J22Umw4pUlZ0iFop5a4GdUDTfI"
	async defer></script>
	<script src="<?= $this->assetUrl('js/map.js') ?>"></script>
    


</section>
	<div class="paginationAnnonce">
		<a href="<?= $this->url('route_projetsValides', ['pageActive' => $pageMoins]) ?>">Page précédente</a> |
		<a href="<?= $this->url('route_projetsValides', ['pageActive' => $pagePlus]) ?>">Page suivante</a>
	</div>