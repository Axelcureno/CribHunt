<?php
session_start();
include("functions.php");

//$id = $_SESSION['usersicam'];
//$sql = "SELECT * FROM usuarios WHERE id = '$id'";
//    $rec = mysqli_query($con, $sql);
//    while($row = mysqli_fetch_array($rec))
//    {
//        $nombreusuario = $row['nombres'];
//    }

$cribArray = array();
$index = 0;
$request = $_SERVER['REQUEST_URI'];

?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CribHunt</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="stylesheet" href="<?php echo URL ?>css/main.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/animate.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <div class="main-menu">
                <div class="logo-container">
                    <a href="<?php echo URL ?>"><img src="<?php echo URL ?>img/logo.svg" alt="CribHunt"></a>
                </div>
                <div class="search-container">
                        <form id="cribsearch" action="" method="post">
                            <input id="cribhunt-searchfield" type="text" placeholder="Casa, 3 recamaras, 3 baños, Mérida..." name="cribsearch">
                            <input id="cribsearch-submit" type="submit" value="" name="cribsearch">
                        </form>
                </div>
            </div>
        <div class="site-wrap">
            <div id="parameter-search">
            <form id="parameter-cribsearch" action="" method="post">
                <div class="linea-parameter-search">
                    <label for="ciudad-cribsearch">Ciudad y/o Colonia</label>
                    <input id="cribsearch-places" type="text" placeholder="Francisco de Montejo, Mérida" name="ciudad-cribsearch">
                </div>
                <div class="linea-parameter-search">
                    <label for="categoria-cribsearch">Categoría</label>
                    <select id="parameter-select" name="categoria-cribsearch">
                      <option value="Cualquiera" selected>Cualquiera</option>
                      <option value="casa">Casa</option>
                      <option value="departamento">Departamento</option>
                      <option value="cuarto">Cuarto</option>
                    </select>
                </div>
                <div class="linea-parameter-search no-border-bottom-linea">
                    <label for="precio-cribsearch">Precio</label>
                    <div id="slider-precio-cribsearch"></div>
                    <input type="text" id="amount" readonly>
                    <input id="submit-parameter-cribsearch" type="submit" value="" name="submit-parameter-cribsearch">
                </div>
            </form>
            </div>
            <div class="canvas-cribhunt">
                
<?php 
if ($request != '/cribhunt/') {

    $parts = explode('/', rtrim($request, '/'));



    $sql = "SELECT * FROM cribs WHERE categoriacrib = '$parts[2]' AND urlcrib = '$parts[3]'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $cribArray[$index] = $row;
            $index++;
        }
    }


    include('detallecrib.php');
} else {
    echo '<div id="canvas-mycribhunt" class="frame">';
    $sql = "SELECT * FROM cribs";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $cribArray[$index] = $row;
            $index++;
        }
    } else {
        echo "0 resultados";
    }
    for ($i=0; $i < count($cribArray); $i++) { 
        echo '<a class="crib-item" href="'. URL . $cribArray[$i]["categoriacrib"] . '/'. $cribArray[$i]["urlcrib"] .'/"><div class="bit-4">' . '<div class="crib-container">' . '<div class="crib-image">' . '<img class="img-principal-crib" src="'. $cribArray[$i]["imagenprincipalcrib"] . 'alt="'. $cribArray[$i]["titulocrib"] .'">' . '<div class="precio-crib">$' . $cribArray[$i]["preciocrib"] . '</div></div><div class="descripcion-crib">' . $cribArray[$i]["titulocrib"] . '</div></div></div></a>';
    }
    echo '</div>';
}



?>
            </div>
            <div id="canvas-cribmap">
                <div id="cribmap-container"></div>
            </div>
        </div>

        <script src="<?php echo URL ?>js/vendor/jquery-2.1.1.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
        <script src="<?php echo URL ?>js/plugins.js"></script>
        <script src="<?php echo URL ?>js/main.js"></script>
        <?php 

        if ($request != '/cribhunt/') {

        echo '<script>';
        echo '$(function() {';
        echo 'var houselatlong = new google.maps.LatLng(' . $cribArray[0]["latitudcrib"] . ', ' . $cribArray[0]["longitudcrib"] . ');';
            //var stylesArray = [{"stylers":[{"hue":"#007fff"},{"saturation":89}]},{"featureType":"water","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels","stylers":[{"visibility":"off"}]}]
        echo 'var map;';

        echo 'function initialize() {';
                 echo 'var mapOptions = {';
                   echo 'zoom: 15';
                  //styles: stylesArray
                 echo '};';

         echo '$("#cribsearch-places").geocomplete();';
            // To add the marker to the map, call setMap();
            
         echo 'map = new google.maps.Map(document.getElementById("cribmap-container"), mapOptions);';
            // Intento de HTML5 Geolocation
             echo 'if(navigator.geolocation) {';
             echo 'navigator.geolocation.getCurrentPosition(function(position) {';
              echo 'var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);';
                    //Iconos de Google Maps
              echo 'var image = "http://localhost/cribhunt/img/icons/geolocation.png";';
               echo 'var iconhouse = "http://localhost/cribhunt/img/icons/location-red.png";';

                    echo 'var geolocationmarker = new google.maps.Marker({';
                     echo 'position: pos,';
                     echo 'map: map,';
                     echo 'icon: image';
                    echo '});';

                    echo 'var contentString1 = \'<div style="width:200px;" id="content">\'+\'<a style="font-weight:bold; font-size: 1em;" href="#"><h1 style="font-weight:bold; font-size: 1em;" id="firstHeading" class="firstHeading">' . $cribArray[0]["titulocrib"] . '</h1></a>\' + \'<div id="bodyContent">\'+ \'<img style="max-width:200px;" src="' . $cribArray[0]["imagenprincipalcrib"] . '">\' + \'</div>\';';

                    echo 'var infowindow = new google.maps.InfoWindow({';
                        echo 'content: contentString1';
                    echo '});';

                    echo 'var marker = new google.maps.Marker({';
                    echo 'position: houselatlong,';
                    echo 'map: map,';
                    echo 'icon: iconhouse';
                     echo '});';
                    //Agrega el listener cuando das click en el marker
                    echo 'google.maps.event.addListener(marker, \'click\', function() {';
                    echo 'infowindow.open(map,marker);';
                    echo '});';

                    echo 'map.setCenter(houselatlong);';
                    echo 'marker.setMap(map);';

                    echo '}, function() {';
                    echo 'handleNoGeolocation(true);';
                echo '});';
              echo '} else {';
                // Navegador no soporta HTML5 Geolocation
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
            echo '<script src="' . URL . 'js/markers.js"></script>';
        }

?>
        <script>$('#tab-container').easytabs();</script>
        <script>new WOW().init();</script>
        <script>
            //Funcion para crear el UI Slider de jQuery UI para el rango de precio
            $(function() {
              $( "#slider-precio-cribsearch" ).slider({ range: true });
            });
        </script>
        <script>
            $(function() { 
                //Funcion que ejecuta el UI Slider de jQuery UI
                $( "#slider-precio-cribsearch" ).slider({ 
                    range: true, 
                    min: 1000, 
                    max: 15000, 
                    values: [ 3000, 6000 ], 
                    slide: function( event, ui ) { 
                        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] ); 
                    },
                    change: function(event, ui) {
                        // Cuando el slider cambia
                    },
                    stop: function(event, ui) {
                        // Cuando no hay mas cambios en el slider
                        //$.POST("to.php",{first_value:ui.values[0], second_value:ui.values[1]},function(data){},'json');
                    }
                }); 
                $( "#amount" ).val( "$" + $( "#slider-precio-cribsearch" ).slider( "values", 0 ) + 
                                    " - $" + $( "#slider-precio-cribsearch" ).slider( "values", 1 ) ); 
            }); 
        </script>
    </body>
</html>
