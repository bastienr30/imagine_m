<?php


$objetCategorieModel = new \Model\CategorieModel;
$tabCategorie = $objetCategorieModel->findAll();

foreach($tabCategorie as $tabLigne){
	
	$categorie		 = $tabLigne["categorie"];

$codeHTML    =

<<<CODEHTML

<option value="$categorie">$categorie</option>

CODEHTML;

echo $codeHTML;

}
