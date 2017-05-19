$(document).ready(function() {
    
    // BOUTONS PERMETTANT DE TOURNER L'ANNONCE 
    
    // Au clique du bouton infosPlus
    $('.infosPlus').click(function(){
        // on retrouve le parents d'infosPlus ayant pour classe annonceValide et on lui ajoute la classe flipAnnonce
        $(this).parents('.annonceValide').addClass('flipAnnonce');
    });

    
    // au clique du bouton infosClose
    $('.infosClose').click(function(){
        // on retrouve le parent d'infosClose ayant pour classe annonceValide et on lui retire la classe flipAnnonce
        $(this).parents('.annonceValide').removeClass('flipAnnonce');
    });
    
    
    
    
    
    
    
});