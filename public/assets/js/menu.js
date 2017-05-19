$(function(e){

    $('#menu').on('click', function() {
        $(this).find('.buttonMenu').toggleClass('buttonMenu-active');
        $("nav").toggleClass("nav-active");
        
        if($('nav').hasClass('nav-active') ) {
            $('.buttonMenu').addClass('buttonMenu-active');
        }
        
        else {
            $('.buttonMenu').removeClass('buttonMenu-active');
        }

    });
    
});
