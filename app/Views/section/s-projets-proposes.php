<!-- ANNONCES SOUMISES AUX VOTES -->

<section id="projetsProposes" class="page current">
	
	
	<!--
		reprendre un système comme l'index (section = pages)
		nombre d'article total / par le nombre d'article par pages = nombre de pages maximum
		
		
		
		index = page, tant qu'il est pas égal au nombre de pages maximum -> BOUCLE
		
			on crée un autre index2 = 0
			
			dans cette boucle, une autre boucle
				tant que l'index2 est différent du nombre d'article par page
				la page de mes articles = index
			On quitte cette boucle
			on incrémente index
			et on remet index2 à 0
			
			-->
	
<?php

$quantite = 4;
$indiceDepart = ($pageActive -1) * $quantite;
$indexMax = $indiceDepart + $quantite;

$objetPropositionModel = new \Model\PropositionModel;
$tabProposition = $objetPropositionModel->findAll();

$indexMax = $indiceDepart + $quantite;

$nbrAffichage = 0;

foreach($tabProposition as $indiceCourant => $tabLigne){
	
	$id 		 = $tabLigne["id"];
	$titreAnnonce= $tabLigne["titreAnnonce"];
	$description = $tabLigne["description"];
    $photo       = $tabLigne["photo"];
    $url         = $tabLigne["url"];
    $categorie   = $tabLigne["categorie"];
    $signalement = $tabLigne["signalement"];
    $pseudo      = $tabLigne["pseudo"];
    $date        = $tabLigne["date"];
    $adresse        = $tabLigne["adresse"];
    $dateHTML    = date("d/m/Y", strtotime($date));
    $dateEntree    = date("Y-m-d", strtotime($date));
    
	//$dateAnnonce = '2016-12-13';
	
	//calcul de la différence entre la date d'entrée et la date actuelle
	$datetime1 = new DateTime($dateEntree);
	$datetime2 = new DateTime(date('Y-m-d'));
	$interval = $datetime1->diff($datetime2)->days; //nombre de jours de l'interval
	
    
    $delai = 15 - $interval;
    
    $vert   = $this->assetUrl('/img/timer5.png');
    $orange = $this->assetUrl('/img/timer4.png');
	$rouge  = $this->assetUrl('/img/timer1.png');
	
	
	if ($delai <=4)
	{
		$chemin = $rouge;
		
	} elseif ($delai <= 9 || $delai >= 5) 
	{
		$chemin = $orange;
		
	} elseif ($delai >= 10) 
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
	
	$objetCommentModel = new \Model\CommentModel;
	$tabProposition = $objetCommentModel->findAll();
	
	foreach($tabProposition as $tabLigne){
		 $idProposition = $tabLigne["idProposition"];
		 
		 if($idProposition == $id) {
		 	$nbCom++;
		 }
	}
	
	
	if($signalement < 10 && $interval < 15) {
		$nbrAffichage++;
		if($nbrAffichage > $indiceDepart && $nbrAffichage <= $indexMax)
		{
			$cheminImage = $this->url("route_index");  // on revient à la racine
			$cheminImageBackground = $this->assetUrl('img/annonce'.$categorie.'.png');
			
			$cheminCom = $this->assetUrl('img/a-comment.png');
			$cheminPlus = $this->assetUrl('img/a-positif.png');
			$cheminMoins = $this->assetUrl('img/a-negatif.png');
			$cheminSignal = $this->assetUrl('img/a-signal-survol2.png');
			
			$CodeHtmlFormComment = $this->fetch("section/s-comment", ["id" => $id]);


$codeHTML    =

<<<CODEHTML
<article id="article$id">

	<div>
		<div class="pseudo"><span class="couleur$categorie">Proposée par</span> $pseudo</div>
		<div class="date"><span class="couleur$categorie">Le</span> $dateHTML (il vous reste $delai jour(s))
		<img src ="$chemin" alt="$chemin" class="timer" />
		</div>
	</div>

		<div class="$categorie">
			<div class="image">
				<img src="$cheminImage$photo" alt="$titreAnnonce" />
			</div>	
			<div class="description$categorie">
				<h3 class="titreAnnonce">$titreAnnonce</h3>
				<p>$description</p>
				<a href="$url" target="_blank" class="visite">Visiter le site</a>
			</div>
		</div>

		<ul class="actionUtilisateur">
		
			
			<li class="buttonPop commentaire commentList" id="c$id" data-idlistproposition="$id">
				<a href="" onclick="return false;"><img src="$cheminCom"/></a>
				$nbCom
			</li>
			
			<div class="formBlock formblockCom" id="blockComment$id">
				<form method="post">
					 $CodeHtmlFormComment
				</form>
				<div class="button buttonPop commentaire fermer" id="c$id">fermer</div>
			</div>
			
			
			<!-- les li contiennent les boutons de vote
				class votePlus et voteMoins servent à trouver les boutons par jquery
				la value récupère la valeur affichée du vote 
				data-idProposition a pour valeur l'id de l'annonce 
				
				sur le lien, on lui indique avec le onclick qu'il ne faut pas rafraichir la page au clique
				sa classe est un indicateur pour le js qui permettra le lien entre le clique et la base de données
				et les class sur les span permettent d'identifier à quel endroit on affiche le résultat (selon si c'est un vote positif ou negatif, et de quelle annonce il s'agit)
			-->
			
			<li class="votePlus" data-idProposition="$id" value="$votesPositifs">
				<a href="" onclick="return false;" id="p$id" class="btnVote" value="1"><img src="$cheminPlus"/></a>
				<span id="votePlus$id">$votesPositifs</span>
			</li>
			<li class="voteMoins" data-idProposition="$id" value="$votesNegatifs">
				<a href="" onclick="return false;" id="m$id" class="btnVote" value="1"><img src="$cheminMoins"/></a>
				<span id="voteMoins$id">$votesNegatifs</span>
			</li>
			<li>
				<a href="" onclick="return false;" id="$id" class="signalement"><img src="$cheminSignal"/></a>
				<span id="valeurSignalement$id">$signalement</span>
			</li>
		</ul>

</article>
CODEHTML;


	
// on reconstitue le chemin pour aller jusqu'à la photo
			echo $codeHTML;
			
		}
	}
	$nbCom = 0;
}

$objetPropositionModel = new \Model\PropositionModel;
$tabProposition = $objetPropositionModel->findAll();

foreach($tabProposition as $tabLigne){
    $signalement = $tabLigne["signalement"];
    $date        = $tabLigne["date"];
    $dateEntree    = date("Y-m-d", strtotime($date));
    
    $datetime1 = new DateTime($dateEntree);
	$datetime2 = new DateTime(date('Y-m-d'));
	$interval = $datetime1->diff($datetime2)->days; //nombre de jours de l'interval
	
	if($signalement < 10 && $interval < 15) {
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



</section>

<div class="paginationAnnonce">
	<a href="<?= $this->url('route_projetsProposes', ['pageActive' => $pageMoins]) ?>">Page précédente</a> | 
	<a href="<?= $this->url('route_projetsProposes', ['pageActive' => $pagePlus]) ?>">Page suivante</a>
</div>