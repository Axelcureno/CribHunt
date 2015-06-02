        $(function() {

            var houselatlong = new google.maps.LatLng(21.0027759, -89.6330445);
            var houselatlong2 = new google.maps.LatLng(21.1113653, -89.6120213);
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
                    var image = 'img/icons/geolocation.png';
                    var iconhouse = 'img/icons/location-red.png';

                    var geolocationmarker = new google.maps.Marker({
                        position: pos,
                        map: map,
                        icon: image
                    });

                    function getJsonMarkers() {
                        var locations = [];
                        var contentStrings = [];
                        var markerTitles = [];
                        var markers = null;
                        $.getJSON( 'webservice.php', function( data ) {
                            $.each( data, function() {
                                    markers.title = data.titulocrib;
                                    markers.location = data.ubicacioncrib;
                                    markers.contentString = '<div style="width:200px;" id="content"><a style="font-weight:bold; font-size: 1em;" href="' + data.urlcrib + '">><h1 style="font-weight:bold; font-size: 1em;" id="firstHeading" class="firstHeading">' + data.titulocrib + '</h1></a><div id="bodyContent"><img style="max-width:200px;" src="' + data.imagenprincipalcrib + '"></div>';
                                    //markerTitles.push(data.titulocrib);
                                    //locations.push(data.ubicacioncrib);
                                    //contentStrings.push('<div style="width:200px;" id="content"><a style="font-weight:bold; font-size: 1em;" href="' + data.urlcrib + '">><h1 style="font-weight:bold; font-size: 1em;" id="firstHeading" class="firstHeading">' + data.titulocrib + '</h1></a><div id="bodyContent"><img style="max-width:200px;" src="' + data.imagenprincipalcrib + '"></div>');
                            });
                        });
                    }

                    getJsonToArrayMarkers {
                        var json = new Object();

                        //Array of JSON objects.
                        $.ajax({
                            async: false,
                            dataType : 'json',
                            url: 'webservice.php',
                            type : 'GET',
                            success: function(data) {
                                for(var i in data){
                                    var item = data[i];
                                    $.each( data, function() {
                                           //json.title = data.titulocrib;
                                           //json.position = data.ubicacioncrib;
                                           //json.content = '<div style="width:200px;" id="content"><a style="font-weight:bold; font-size: 1em;" href="' + data.urlcrib + '">><h1 style="font-weight:bold; font-size: 1em;" id="firstHeading" class="firstHeading">' + data.titulocrib + '</h1></a><div id="bodyContent"><img style="max-width:200px;" src="' + data.imagenprincipalcrib + '"></div>';                        
                                    });
                                }
                            }
                        });
                    }


                    //loop between each of the json elements
                    for (var i = 0, length = markers.length; i < length; i++) {
                        var data = markers[i],
                        latLng = new google.maps.LatLng(data.location); 
            
            
            
                        if(bounds.contains(latLng)) {
                            // Creating a marker and putting it on the map
                            var marker = new google.maps.Marker({
                                position: latLng,
                                map: map,
                                title: data.content
                            });
                            infoBox(map, marker, data);
                        }
                    }


                    var contentString1 = '<div style="width:200px;" id="content"><a style="font-weight:bold; font-size: 1em;" href="#"><h1 style="font-weight:bold; font-size: 1em;" id="firstHeading" class="firstHeading">Departamento en Altabrisa con 2 cuartos</h1></a><div id="bodyContent"><img style="max-width:200px;" src="img/cribs/property-218_5.jpg"></div>';

                    var infowindow = new google.maps.InfoWindow({
                        content: contentString1
                    });

                    var infowindow2 = new google.maps.InfoWindow({
                        content: contentString1
                    });

                    var marker = new google.maps.Marker({
                        position: houselatlong2,
                        map: map,
                        icon: iconhouse
                    });
                    var marker2 = new google.maps.Marker({
                        position: houselatlong,
                        map: map,
                        icon: iconhouse
                    });

                    //Agrega el listener cuando das click en el marker
                    google.maps.event.addListener(marker, 'click', function() {
                      infowindow.open(map,marker);
                    });
                    google.maps.event.addListener(marker2, 'click', function() {
                      infowindow2.open(map,marker2);
                    });

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