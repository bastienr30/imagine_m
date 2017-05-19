<?php
// ICI $this REPRESENTE UN OBJET DE LA CLASSE Template
// REGARDER DANS LE DOSSIER vendor/league/plates/src/Template/Template.php
// POUR TROUVER LA METHODE insert
?>
<?php $this->insert("section/header");  ?>
<?php $this->insert("section/s-projets-valides", ["pageActive" => $pageActive]);  ?>
<?php $this->insert("section/footer");  ?>