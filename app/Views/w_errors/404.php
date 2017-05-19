<?php $this->layout('layout404', ['title' => 'Erreur 404']) ?>

<?php $this->start('main_content'); ?>
<div class="row">
    <div class="col-md-12"> 
        <h2>C'est encore plus fort que la sardine qui a bouché le port !</h2>
        
        <a href="<?php echo $this->url("route_index") ?>" class="btn btn-primary btn-lg">Accueil</a>
    </div>
<?php $this->stop('main_content'); ?>
