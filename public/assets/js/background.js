$(function () {
    // variables
        // $pages sont les sections / pages à afficher
    var $pages = $('.page'),
        // $pagesCount définit le nombre de pages
        pagesCount = $pages.length,
        // mise en place d'un boolean, la page "current" / actuelle est 0
        current = 0,
        // initialisation de l'animation
        animating = false;

        // fonction qui anime les pages
        function animate(page) {
            // l'animation se fait
            animating = true;
            
            // si la page est supérieur à 0 (dont une autre page que la première)
            if (page - current > 0) {
                // on ajoute la classe "top" aux autres pages (celles au dessus)
                $pages.eq(current).addClass('top');

            } else {
                // sinon, on enlève la classe "top" quand il s'agit de la première page
                $pages.eq(page).removeClass('top');
            }
            
            // quand nous ne sommes pas sur la page, la classe "current" est supprimée
            $pages.eq(current).removeClass('current');
            // la page sur laquelle nous sommes prend, elle, automatiquement la classe "current"
            $pages.eq(page).addClass('current');
            
            // current (la variable) est égale à la page donnée en paramètre
            current = page;
            // le tout est anumé grâce à la fonction setTimeout
            setTimeout(function () {
                animating = false;
            }, 800);
        }
    
        // fonction lorsqu'on scroll vers le haut
        function up() {
            // si nous ne sommes pas sur la page d'accueil
            if (current > 0) {
                // l'animation se déclenche pour scroll vers le haut
                animate(current - 1);
            }
        }
    
        // fonction lorsqu'on scroll vers le bas
        function down() {
            // si nous sommes sur la page d'accueil
            if (current < pagesCount - 1) {
                // l'animation se déclenche pour scroll vers le bas
                animate(current + 1);
            }
        }
           
        // on cache le footer
        $('footer').hide();
        
        // si le nombre de page est supérieur à 1
        if (pagesCount > 1) {
            // au scroll de la souris
             $(document).on("mousewheel DOMMouseScroll", function (e) {
                 
                 // s'il y a une animation
                if (animating) return;
                
                // si nous sommes sur la première page
                if (e.originalEvent.wheelDelta > 0 || e.originalEvent.detail < 0) {
                    // on scroll vers le haut et on cache le footer
                    $('.pageFirst').addClass('li-selected');
                    $('.pageLast').removeClass('li-selected');
                    up();
                    $('footer').hide();
                    
                } else {
                    // sinon, on scroll vers le bas et on montre le footer si c'est la dernière page
                    $('.pageLast').addClass('li-selected');
                    $('.pageFirst').removeClass('li-selected');
                    $('footer').addClass('footerIndex');
                    down();
                    
                    $('footer').show();
                }
            });
            
            // à l'appuie d'une touche du clavier
            $(document).keydown(function(e){
                // si on appuie sur la flèche du haut
                if (e.keyCode == 38) {
                    // l'écran descend
                    $('.pageFirst').addClass('li-selected');
                    $('.pageLast').removeClass('li-selected');
                    up();
                    $('footer').hide();
                }
                
                // si on appuie sur la flèche du bas
                if (e.keyCode == 40) {
                    // l'écran monte
                    $('.pageLast').addClass('li-selected');
                    $('.pageFirst').removeClass('li-selected');
                    $('footer').addClass('footerIndex');
                    down();
                    
                    $('footer').show();
                }
            });
        } else {
            // s'il n'y a pas d'autres pages, on montre le footer
            $('footer').show();
        }
        
        // BOUTONS 
        $('.pageFirst').click(function () {
            // au clique du premier bouton, on revient à la première page
            $('.pageFirst').addClass('li-selected');
            $('.pageLast').removeClass('li-selected');
           up(); 
           $('footer').hide();
        });
        
        // au clique du dernier bouton, on descend à la dernière page
        $('.pageLast').click(function () {
            $('.pageLast').addClass('li-selected');
            $('.pageFirst').removeClass('li-selected');
            $('footer').addClass('footerIndex');
           down();
           
           $('footer').show();
        });
        
        if($("#s-index") || $("#s-carousel")) {
            $("body").css("overflow", "hidden");
            $("html").css("overflow", "hidden");
            console.log("laaa");
        }
        
        
    // MODIFICATION DU BACKGROUND ALEATOIREMENT SUR TROIS IMAGES
    var backgrounds = ['backgroundImg1.jpg', 'backgroundImg2.jpg', 'backgroundImg3.jpg'];
    var urlBackground = cheminBackgrounds + backgrounds[Math.floor(Math.random() * backgrounds.length)];
    $('body').css({"background-image": "url('" + urlBackground + "')"});
        
});