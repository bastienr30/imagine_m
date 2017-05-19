//si la page est prête
$(document).ready(function(){
    //appel AJAX du serveur REST
    // incrementation au click des boutons
    $('.btnVote').click(function(){
      // on crée une variable pour savoir si le vote est positif ou négatif
      var typeVote = '';
      console.log(routeVote);
      // au clique, on récupère l'id de l'annonce sur laquelle on travaille
      var id = this.id;
      var idType =this.id;
      // on récupère l'id
      id = id.substr(1);
      
      // debug pour savoir quand et comment est pris en compte le vote
      console.log(id);
      idType = idType.substr(0,1);
      console.log(idType);
     
      if(idType == 'p'){
        // alors le type est positif
        typeVote = 'votesPositifs';
      }
      else {
        typeVote = 'votesNegatifs';
      }
      console.log(typeVote);
      $.ajax({
        url: routeVote, //API REST à appeler
        method: 'GET',
        // on lui donne le type de vote et l'id
        data: {type: typeVote, id: id},
        dataType: 'json',
        error: function(mess, err) //en cas d'erreur
        {
            console.log('erreur');
        },
        success: function(data){ //si tout va bien
            // on crée une variable vote vite
            console.log(data);
            var vote = '';
            
            // pour chaque annonce, on donne le contenu à la variable vote
            votePlus = data.votesPositifs;
            voteMoins = data.votesNegatifs;
            // on fait correspondre la div vote avec son id
            idVotesPlus = "#votePlus" + id;
            idVotesMoins = "#voteMoins" + id;
            
            // on donne à la div son contenu par id
            $(idVotesPlus).html(votePlus);
             $(idVotesMoins).html(voteMoins);
        }
      });
      // appel fonction pour afficher les votes (par id)
      //afficherVote(id);
    });
});
