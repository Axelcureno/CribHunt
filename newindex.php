<?php 

session_start();
include("functions.php");
$cribArray = array();
$index = 0;
$request = $_SERVER['REQUEST_URI'];

//if ($_COOKIE['iwashere'] != "yes") { 
//  setcookie("iwashere", "yes", time()+315360000);  
//  header('Location: ' . URL . 'landing/'); 
//}

if (isset($_SESSION['usersicam'])) {
    $id = $_SESSION['usersicam'];
    $sqlname = "SELECT * FROM usuarios WHERE id = '$id'";
    $rec = mysqli_query($con, $sqlname);
    while($row = mysqli_fetch_array($rec))
    {
        $nombreusuario = $row['nombres'];
    }
}

 ?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta property="og:title" content="<?php echo $title; ?>">
        <meta property="og:description" content="<?php echo $description; ?>">
        <meta name="keywords" content="casas, departamentos, cuartos, depas en renta, méxico, renta de inmuebles, casas departamentos, renta cuartos, casa en renta, deptos, deptos, renta departamento, amuebladas, casas en renta en merida">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:image" content="<?php if (isset($imgog)) { echo $imgog; } else { echo URL . 'android-chrome-192x192.png'; } ?>">
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo URL ?>apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo URL ?>apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL ?>apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL ?>apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL ?>apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo URL ?>apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo URL ?>apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo URL ?>apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo URL ?>apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" href="<?php echo URL ?>favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="<?php echo URL ?>android-chrome-192x192.png" sizes="192x192">
        <link rel="icon" type="image/png" href="<?php echo URL ?>favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="<?php echo URL ?>favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="<?php echo URL ?>manifest.json">
        <meta name="msapplication-TileColor" content="#FF5722">
        <meta name="theme-color" content="#FF5722">
        <meta name="msapplication-TileImage" content="<?php echo URL ?>mstile-144x144.png">
        <link rel="stylesheet" href="<?php echo URL ?>css/newmain.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/material.deep_orange-indigo.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="<?php echo URL ?>css/animate.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/fancybox.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/ripple.css">
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-47439231-8', 'auto');
          ga('require', 'linkid', 'linkid.js');
          ga('send', 'pageview');

        </script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    </head>
    <body>

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Title</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation. We hide it in small screens. -->
      <nav class="mdl-navigation mdl-layout--large-screen-only">
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
        <a class="mdl-navigation__link" href="">Link</a>
      </nav>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Title</span>
    <nav class="mdl-navigation">
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
      <a class="mdl-navigation__link" href="">Link</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
    <div class="page-content"><!-- Your content goes here --></div>
  </main>
</div>


        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
        <script src="<?php echo URI ?>js/jquery.bxslider.min.js"></script>
        <script src="<?php echo URI ?>js/plugins.js"></script>
        <script src="<?php echo URI ?>js/main.js"></script>
        <script src="<?php echo URI ?>js/material.min.js"></script>
        <script src="<?php echo URI ?>js/pace.min.js"></script>
        <script src="<?php echo URI ?>js/jquery.ui.touch-punch.min.js"></script>
        <script type="text/javascript">
            $('.bxslider').bxSlider({
                pagerCustom: '#bx-pager',
                onSliderLoad: function(){
                $("#site-wrap-detallecrib").css("visibility", "visible");
                $(".se-pre-con").fadeOut();
              }
            });
        </script>
        </script>
        <?php 


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
        
?>
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
                    }
                }); 
                $( "#amount" ).val( "$" + $( "#slider-precio-cribsearch" ).slider( "values", 0 ) + 
                                    " - $" + $( "#slider-precio-cribsearch" ).slider( "values", 1 ) ); 
            });
        //Pequeño código que evita que se envíe el formulario de búsqueda con la tecla enter
        var submitFocus = false;
        $('input :submit').focus(function() {
          submitFocus = true;
        });
        $(window).keydown(function(event) {
            if (event.keyCode == 13 && submitFocus == false) {
                window.event.keyCode = 9;
            }
        });
        </script>
        <script>$('#slider-precio-cribsearch').slider();</script>
    </body>
</html>