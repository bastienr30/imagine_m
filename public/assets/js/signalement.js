//si la page est prête
$(document).ready(function(){
    //appel AJAX du serveur REST
    // incrementation au click des boutons
    $('.signalement').click(function(){
    
      console.log(routeSignalement);
      // au clique, on récupère l'id de l'annonce sur laquelle on travaille
      var id = this.id;

      console.log(id);
     
      console.log(routeSignalement);
      $.ajax({
        url: routeSignalement, //API REST à appeler
        method: 'GET',
        // on lui donne le type de vote et l'id
        data: {id: id},
        dataType: 'json',
        error: function(mess, err) //en cas d'erreur
        {
            console.log('erreur');
        },
        success: function(data){ //si tout va bien
            // on crée une variable vote vite
            console.log(data);
            var signalement = '';
            
            // pour chaque annonce, on donne le contenu à la variable vote
            signalement = data.signalement;
            
            idSignalement = '#valeurSignalement'+ id;
            console.log(idSignalement);
            // on donne à la div son contenu par id
            $(idSignalement).html(signalement);
            
            if(signalement >= 10){
                
                $('#article'+ id).hide();
            }
        }
      });
      // appel fonction pour afficher les votes (par id)
      //afficherVote(id);
    });
});
