        <?php 

        if ($request != '/' && $request != '?cribsearch=' && $notfound != 1) {
        echo '<script>';
        echo '$(function() {';
        echo 'var houselatlong = new google.maps.LatLng(' . $cribArray[0]["latitudcrib"] . ', ' . $cribArray[0]["longitudcrib"] . ');';
        echo 'var map;';
        echo 'function initialize() {';
                 echo 'var mapOptions = {';
                   echo 'zoom: 18';
                 echo '};';
         echo '$("#cribsearch-places").geocomplete();';
         echo 'map = new google.maps.Map(document.getElementById("cribmap-container"), mapOptions);';
             echo 'if(navigator.geolocation) {';
             echo 'navigator.geolocation.getCurrentPosition(function(position) {';
              echo 'var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);';
              echo 'var image = "' . URL . 'img/icons/geolocation.png";';
               echo 'var iconhouse = "' . URL . 'img/icons/location-red.png";'; echo 'var geolocationmarker = new google.maps.Marker({';
                     echo 'position: pos,';
                     echo 'map: map,';
                     echo 'icon: image';
                    echo '});';
                    echo 'var contentString1 = \'<div style="width:200px;" id="content">\'+\'<a style="font-weight:bold; font-size: 1em;" href="'. $cribArray[0]["urlcrib"] .' "><h1 style="font-weight:bold; font-size: 1em; padding: 5px 5px 5px 0;" id="firstHeading" class="firstHeading">' . $cribArray[0]["titulocrib"] . '</h1></a>\' + \'<div id="bodyContent">\'+ \'<img style="max-width:200px;" src="' . $cribArray[0]["imagenprincipalcrib"] . '">\' + \'</div>\';';
                    echo 'var infowindow = new google.maps.InfoWindow({';
                        echo 'content: contentString1';
                    echo '});';
                    echo 'var marker = new google.maps.Marker({';
                    echo 'position: houselatlong,';
                    echo 'map: map,';
                    echo 'icon: iconhouse';
                     echo '});';
                    echo 'google.maps.event.addListener(marker, \'click\', function() {';
                    echo 'infowindow.open(map,marker);';
                    echo '});';
                    echo 'map.setCenter(houselatlong);';
                    echo 'marker.setMap(map);';
                    echo '}, function() {';
                    echo 'handleNoGeolocation(true);';
                echo '});';
              echo '} else {';
                echo 'handleNoGeolocation(false);';
              echo '}';
            echo '}';
            echo 'function handleNoGeolocation(errorFlag) {';
            echo 'if (errorFlag) {';
            echo 'var content = \'Hubo un error con el servicio de Geolocalización.\';';
            echo '} else {';
            echo 'var content = \'Error: Tu navegador no soporta Geolocalización :(\';';
            echo '}';
            echo 'var options = {';
            echo 'map: map,';
            echo 'position: new google.maps.LatLng(60, 105),';
            echo 'content: content';
            echo '};';
            echo 'var infowindow = new google.maps.InfoWindow(options);';
            echo 'map.setCenter(options.position);';
            echo '}';
            echo 'google.maps.event.addDomListener(window, \'load\', initialize);';
        echo '});';
        echo '</script>';
        } else { 
            echo '<script src="' . URI . 'js/markers.js"></script>';
        }
?>