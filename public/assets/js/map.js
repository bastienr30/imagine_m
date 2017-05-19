// lien entre adresse et map
function geocodeAddress(geocoder, resultsMap, address) {
    //var address = document.getElementById('address').innerHTML;
    //var address = 'paris';
    console.log("coucou" + address);
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        }
        else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}


$(document).ready(function() {

    //selectionner la liste des articles
    //boucles sur chaque article
    //pour chaque article on recupere adresse et la carte
    console.log("toto");

    tabArticle = document.getElementsByTagName('article');

    for (i = 0; i < tabArticle.length; i++) {
        console.log("la");

        var address = $(tabArticle[i]).find('.adresse').html();

        var idMap = $(tabArticle[i]).find('.map').attr('id');
        console.log(address);
        console.log(idMap);

        var map = new google.maps.Map(document.getElementById(idMap), {
            zoom: 16,
            maxZoom: 20
        });

        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map, address);
        
    }

});