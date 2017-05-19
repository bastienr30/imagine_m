function afficherComment(idListProposition) {
      console.log(idListProposition);
      //appel AJAX
      $.ajax({
        url: routeListComment,
        method: "post",
        dataType: "json",
        data: {idProposition: idListProposition},
        error: function(txt, msg)
               {
                 alert(msg); // boite d'alerte de l'erreur
               },
        success: function(data)
        {
              var comment = '';
              
              $.each(data, function(cle, valeur){
              // pour chaque annonce, on donne le contenu à la variable vote
              comment += '<div> <h3>pseudo :</h3> ' + valeur.pseudoCom + '<br/>';
              comment += '<h3>comment :</h3> ' + valeur.comment + '<br/>';
              comment += '<h3>date :</h3> ' + valeur.dateCom + '</div>';
              });
              // on fait correspondre la div vote avec son id
              
              // on donne à la div son contenu par id
              $("#listComment" + idListProposition).html(comment);
        }
      
      
     });
    }
    
$(document).ready(function()
{
  
  //si soumission du formulaire
  $('.btnComment').click(function(e)
  {
    var idProposition = $(this).data("idproposition");
    var form = $(this).closest("form");
    
    e.preventDefault(); // pour ne pas soumettre le formulaire directement
    //appel AJAX
    $.ajax({
      url: routeComment,
      method: "post",
      dataType: "json",
      data: {pseudoCom: form.find('.pseudoCom').val(), idProposition: form.find('.idProposition').val(), comment: form.find('.comment').val()},
      error: function(txt, msg)
      {
        alert(msg); // boite d'alerte de l'erreur
      },
      success: function(data)
      {
        afficherComment(idProposition);
      }
    });
    
    
  });
  
  $('.commentList').click(function()
  {
    var idListProposition = $(this).data("idlistproposition");

    afficherComment(idListProposition);
   
  });
  
});

