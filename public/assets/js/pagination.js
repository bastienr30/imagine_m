$(document).ready(function(){
   var nombreMaxPages = $('article').length / 4;
   
   for (var i=1;i<=nombreMaxPages+1;i++) {
       $('.pagination').append('<li class="buttonPage'+i+'">'+ i +'</li>');
       
   }
   
   $('.pagination').on('click', 'li', function(){
        $(this).index();
      console.log($(this).index()); 
   });
   
   console.log($('.pageNavAnnonces').html());
});