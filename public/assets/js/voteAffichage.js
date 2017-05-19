$(function(){

    // https://codepen.io/shankarcabus/pen/GzAfb
    
    // au clique, on vérifie si c'est la bonne valeur qu'on récupère
    // mais normalement, on récupère la valeur automatiquement pour l'affichage en cercle(il n'y a pas besoin du clique)
    
    // on récupère les valeurs, PUIS on rafraichit en ajax
    
    $(".votePlus a").click( function(e) {
        e.preventDefault();
        
        var idProposition = $(this).data("idproposition");
        var ulAnnonce = $(this).closest("ul");  
        // console.log(ulAnnonce.find('.votePlus').val());
        
    });
    
    $(".voteMoins a").click( function(e) {
        e.preventDefault();
        
        var idProposition = $(this).data("idproposition");
        var ulAnnonce = $(this).closest("ul");  
        // console.log(ulAnnonce.find('.voteMoins').val());
        
    });
    
    
//   var $votePlusAffiche = $('.votePlus').data("id"),
//       $voteMoinsAffiche = $('.votePlus'),
//       percent = parseInt($ppc.data('percent')),
//       deg = 360*percent/100;
      
//   if (percent > 50) {
//     $ppc.addClass('gt-50');
//   }
//   $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
//   $('.ppc-percents span').html(percent+'%');
});