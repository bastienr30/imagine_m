$(function(e){

    // AFFICHAGE DU MENU EN MODE POPUP AU CLIQUE
    $('#blockContact').hide();
    $('#blockProposition').hide();
    $('.contact').on('click', function() {
        $('#blockContact').toggleClass('pop-active');
        $('#blockContact').toggleClass('footer .pop-active');
        if( $('#blockContact').hasClass('pop-active')) {
          $('#blockContact').show(200);
          $('#blockProposition').hide(200);
          $('#blockComment').hide(200);
          $('.page.current').css("z-index", "8");
        }
        else {
          $('#blockContact').hide(200);
          $('.page.current').css("z-index", "0");
        }
    });
    
     $('.proposition').on('click', function() {
        $('#blockProposition').toggleClass('pop-active');
        
        if( $('#blockProposition').hasClass('pop-active')) {
          $('#blockProposition').show(200);
          $('#blockContact').hide(200);
          $('#blockComment').hide(200);
          $('.page.current').css("z-index", "8");
          
        }
        else {
          $('#blockProposition').hide(200);
          $('.page.current').css("z-index", "0");
        }
    });
    
    $('.commentaire').on('click', function() {
        
        var id = this.id;
        id = id.substr(1);
    
        console.log(id);
        $('#blockComment'+id).toggleClass('pop-active');
        
        if( $('#blockComment'+id).hasClass('pop-active')) {
          $('.formBlock').hide(200);
          $('#blockComment'+id).show(200);
          $('#blockContact').hide(200);
          $('#blockProposition').hide(200);
          $('.page.current').css("z-index", "8");
          $('#header').css("z-index", "0");
        }
        else {
          $('.formBlock').hide(200);
          $('.page.current').css("z-index", "0");
          $('#header').css("z-index", "3");
        }
    });
  

    // AFFICHE LES CHAMPS DU FORMULAIRE PETIT A PETIT
    $('.formsSubmit').hide();
    $('.formsPrev').hide();

    // BOUTON NEXT
    $('.formsNext').click(function (e) {
      e.preventDefault();
      console.log('blaaa');

      $('.active-span').removeClass('active-span').hide().next('span').show().addClass('active-span');

      if ($('span.active-span').is('.first')) {
        $('.formsPrev').hide();
        $('.formsNext').css( "width", "100%" );
      }

      else {
        $('.formsPrev').show();
        $('.formsNext').css( "width", "50%" );
      }

      if ($('span.active-span').is('.last')) {
        $('.formsNext').hide();
        $('.formsSubmit').show();
      }

      else {
        $('.formsSubmit').hide();
        $('.formsNext').show();
      }

    });

    // BOUTON PREVIOUS
    $('.formsPrev').click(function (e) {
      e.preventDefault();
      console.log("hello");
        $('.active-span').removeClass('active-span').hide().prev('span').show().addClass('active-span');

        if ($('span.active-span').is('.first')) {
          $('.formsPrev').hide();
          $('.formsNext').css( "width", "100%" );
        }

        else {
          $('.formsPrev').show();
          $('.formsNext').css( "width", "50%" );
        }

        if ($('span.active-span').is('.last')) {
          $('.formsSubmit').show();
        }

        else {
          $('.formsSubmit').hide();
          $('.formsNext').show();
        }
    });

});
