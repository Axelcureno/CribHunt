$(function() {    

    var json = new Object();

    $.ajax({
        async: false,
        dataType : 'json',
        url: 'http://localhost/cribhunt/markerswebservice.php',
        type : 'GET',
        success: function(data) {
            for(var i in data){
                var item = data[i];
                $.each( data, function() {
                       json = data;                   
                });
                return json;
            }
        }
    });
    var map;
            function initialize() {
                var mapOptions = {
                  zoom: 13
                  //styles: stylesArray
                };

            $("#cribsearch-places").geocomplete();
            // To add the marker to the map, call setMap();
            map = new google.maps.Map(document.getElementById('cribmap-container'), mapOptions);
            // Intento de HTML5 Geolocation
            if(navigator.geolocation) {

                navigator.geolocation.getCurrentPosition(function(position) {
                    
                    var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    //Iconos de Google Maps
                    var image = 'http://localhost/cribhunt/img/icons/geolocation.png';
                    var iconhouse = 'http://localhost/cribhunt/img/icons/location-red.png';
                    var infowindow =  new google.maps.InfoWindow({
                        content: ""
                    });

                    var geolocationmarker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        icon: image
                    });

                    for (var i = 0; i < json.length; i++) {

                        var obj = json[i];
                        var description = '<div style="width:200px;" id="content"><a style="font-weight:bold; font-size: 1em;" href="http://localhost/cribhunt/' + obj.urlcrib + '"><h1 style="font-weight:bold; font-size: 1em;" id="firstHeading" class="firstHeading">' + obj.titulocrib + '</h1></a><div id="bodyContent"><img style="max-width:200px;" src="' + obj.imagenprincipalcrib + '"></div>';

                        var infowindow = new google.maps.InfoWindow({
                            content: description
                        });
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(parseFloat(obj.latitudcrib), parseFloat(obj.longitudcrib)),
                            map: map,
                            icon: iconhouse
                        });
                        bindInfoWindow(marker, map, infowindow, description);
                    }

                      map.setCenter(pos);
                      marker.setMap(map);

                }, function() {
                  handleNoGeolocation(true);
                });
              } else {
                // Navegador no soporta HTML5 Geolocation
                handleNoGeolocation(false);
              }
            }

            function bindInfoWindow(marker, map, infowindow, description) {
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(description);
                    infowindow.open(map, marker);
                });
            }

            function handleNoGeolocation(errorFlag) {
              if (errorFlag) {
                var content = 'Hubo un error con el servicio de Geolocalización.';
              } else {
                var content = 'Error: Tu navegador no soporta Geolocalización :( ¡Te estas perdiendo de mucho!';
              }

              var options = {
                map: map,
                position: new google.maps.LatLng(60, 105),
                content: content
              };

              var infowindow = new google.maps.InfoWindow(options);
              map.setCenter(options.position);
            }
            
            google.maps.event.addDomListener(window, 'load', initialize);
        });