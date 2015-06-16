<?php
session_start();
include("functions.php");
$cribArray = array();
$index = 0;
$request = $_SERVER['REQUEST_URI'];
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php if (isset($cribArray[0]["titulocrib"])) {
            echo $cribArray[0]["titulocrib"];
        } else {
            echo 'CribHunt';
            } ?>  </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo URL ?>apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo URL ?>apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL ?>apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL ?>apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL ?>apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo URL ?>apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo URL ?>apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo URL ?>apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo URL ?>apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo URL ?>android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo URL ?>favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo URL ?>favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo URL ?>favicon-16x16.png">
        <link rel="manifest" href="<?php echo URL ?>manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo URL ?>ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="<?php echo URL ?>css/spinner.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/main.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/animate.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/jquery.bxslider.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/fancybox.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/ripple.css">
        <!--<link type="text/css" rel="stylesheet" href="<?php echo URL ?>css/materialize.min.css"  media="screen,projection"/>-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- <script src="js/vendor/modernizr-2.8.3.min.js"></script> -->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <div class="main-menu">
                <div class="logo-container">
                    <a href="<?php echo URL; ?>"><img src="<?php echo URL ?>img/logo.svg" alt="CribHunt"></a>
                </div>
                <div class="search-container">
                        <form id="cribsearch" action="" method="get">
                            <input id="cribhunt-searchfield" type="text" placeholder="<?php if (isset($_GET['cribsearch'])) { echo $_GET['cribsearch']; } else { echo 'Casa, 3 cuartos, 3 baños, Mérida...'; } ?>" name="cribsearch">
                            <input id="cribsearch-submit" type="submit" value="">
                        </form>
                </div>
                <div class="toolbar">
                    <div class="usuario-bienvenido"><a class="sugerencias-inline" href=".sugerencias-forma"><button class="holausuario ripple">¿Alguna sugerencia?</button></a></div>
                        <div class="perfil-container">
                            <?php if (!isset($_SESSION['usersicam'])) {
                                echo '<a href="'. URL .'login.php"><button class="iniciar-sesion ripple">Iniciar Sesión</button></a>';
                            } else {
                                echo '<a href="'. URL .'logout.php"><button class="iniciar-sesion ripple">Cerrar Sesión</button></a>';
                                } ?>    
                        </div>
                </div>
            </div>
        <div class="site-wrap">
            <div id="parameter-search">
            <form id="parameter-cribsearch" action="" method="get">
                <div class="linea-parameter-search">
                    <label for="ciudadocolonia">Ciudad y/o Colonia</label>
                    <input id="cribsearch-places" type="text" placeholder=" <?php if (isset($_GET['ciudad-cribsearch'])) { echo $_GET['ciudad-cribsearch']; } else { echo "Francisco de Montejo, Mérida"; } ?>" name="ciudadocolonia">
                </div>
                <div class="linea-parameter-search">
                    <label for="categoria">Categoría</label>
                    <select id="parameter-select" name="categoria">
                      <option value="cualquiera" selected>Cualquiera</option>
                      <option value="casa">Casa</option>
                      <option value="departamento">Departamento</option>
                      <option value="cuarto">Cuarto</option>
                    </select>
                </div>
                <div class="linea-parameter-search no-border-bottom-linea">
                    <label for="precio">Precio</label>
                    <div id="slider-precio-cribsearch"></div>
                    <input type="text" id="amount" name="precio" readonly>
                    <button id="submit-parameter-cribsearch"></button>
                </div>
            </form>
            </div>
            <div class="canvas-cribhunt">
<div class="se-pre-con">
    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
   <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
    </svg>
</div>
<?php 

//Busqueda de la barra superior.
//
if (isset($_GET['cribsearch']) && $_GET['cribsearch'] != '') {
    echo '<div id="canvas-mycribhunt" class="frame">';
    $query = $_GET['cribsearch'];
    preg_replace('/[^A-Za-z1-9]/', '', $query);
    $sql = "SELECT * FROM cribs WHERE titulocrib LIKE '%" . $query . "%' OR categoriacrib = '$query' OR ciudadcrib LIKE '%" . $query . "%' OR caracteristicascrib LIKE '%" . $query . "%' OR universidadescrib LIKE '%" . $query . "%' OR cpcrib LIKE '%" . $query . "%' OR coloniacrib LIKE '%" . $query . "%' OR direccioncrib LIKE '%" . $query . "%' OR estadocrib LIKE '%" . $query . "%' OR coloniacrib LIKE '%" . $query . "%' OR preciocrib LIKE '%" . $query . "%' OR paiscrib LIKE '%" . $query . "%' ";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $cribArray[$index] = $row;
            $index++;
        }
    for ($i=0; $i < count($cribArray); $i++) { 
        echo '<div class="bit-4 crib-grid"><a class="crib-item wow zoomIn" data-wow-delay="' . $i*0.25 . 's" href="'. URL . $cribArray[$i]["categoriacrib"] . '/'. $cribArray[$i]["urlcrib"] .'/">' . '<div class="crib-container">' . '<div class="crib-image">' . '<img class="img-principal-crib" src="'. $cribArray[$i]["imagenprincipalcrib"] . 'alt="'. $cribArray[$i]["titulocrib"] .'">' . '</div><div class="descripcion-crib"><div class="titulo-crib-item">' . $cribArray[$i]["titulocrib"] . '</div><div class="mas-detalle-crib"><div class="precio-crib">$' . $cribArray[$i]["preciocrib"] . ' / Mes</div><div class="crib-cuartos-banios"><div class="cuartos-crib-item">' . $cribArray[$i]["cuartoscrib"] . '</div><div class="banios-crib-item">' . $cribArray[$i]["banioscrib"] . '</div></div></div></div></div></a></div>';
    }
    } else {
        echo '<div class="not-found">No se encontraron resultados con la búsqueda: '. $query .' </div>';
    }
    echo '</div>';

//Busqueda en base a Parámetros
//
} else if (isset($_GET['ciudadocolonia']) && $_GET['ciudadocolonia'] != '') {
    echo '<div id="canvas-mycribhunt" class="frame">';
    $ciudadcribsearch = $_GET['ciudadocolonia'];
    $categoriacrib = $_GET['categoria'];
    $preciocrib = $_GET['precio'];
    preg_replace('/[^A-Za-z1-9]/', '', $ciudadcribsearch);

    $ciudadycolonia = explode(', ', $ciudadcribsearch);
    $argsciudad = array();
    for( $i = 0; $i < count($ciudadycolonia); $i++) {
        $argsciudad[$ciudadycolonia[$i]] = $ciudadycolonia[$i];
        $ciudadycolonia[$i] = str_replace(', ', '', $ciudadycolonia[$i]);
    }

    $rangoprecios = explode('$', $preciocrib);
    $args = array();
    for( $i = 0; $i < count($rangoprecios); $i++) {
        $args[$rangoprecios[$i]] = $rangoprecios[$i];
        $rangoprecios[$i] = str_replace(' - ', '', $rangoprecios[$i]);
    }
    if ($categoriacrib == 'cualquiera') {
        $sql = "SELECT * FROM cribs WHERE ciudadcrib LIKE '%" . $ciudadycolonia[1] . "%' AND coloniacrib LIKE '%" . $ciudadycolonia[0] . "%' AND categoriacrib = 'casa' OR categoriacrib = 'departamento' OR categoriacrib = 'cuarto' AND preciocrib BETWEEN $rangoprecios[1] AND $rangoprecios[2]";
    } else {
        $sql = "SELECT * FROM cribs WHERE ciudadcrib LIKE '%" . $ciudadycolonia[1] . "%' AND coloniacrib LIKE '%" . $ciudadycolonia[0] . "%' AND categoriacrib =  '$categoriacrib' AND preciocrib BETWEEN $rangoprecios[1] AND $rangoprecios[2]";
    }
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $cribArray[$index] = $row;
            $index++;
        }
    for ($i=0; $i < count($cribArray); $i++) { 
        echo '<div class="bit-4 crib-grid"><a class="crib-item wow zoomIn" data-wow-delay="' . $i*0.25 . 's" href="'. URL . $cribArray[$i]["categoriacrib"] . '/'. $cribArray[$i]["urlcrib"] .'/">' . '<div class="crib-container">' . '<div class="crib-image">' . '<img class="img-principal-crib" src="'. $cribArray[$i]["imagenprincipalcrib"] . 'alt="'. $cribArray[$i]["titulocrib"] .'">' . '</div><div class="descripcion-crib"><div class="titulo-crib-item">' . $cribArray[$i]["titulocrib"] . '</div><div class="mas-detalle-crib"><div class="precio-crib">$' . $cribArray[$i]["preciocrib"] . ' / Mes</div><div class="crib-cuartos-banios"><div class="cuartos-crib-item">' . $cribArray[$i]["cuartoscrib"] . '</div><div class="banios-crib-item">' . $cribArray[$i]["banioscrib"] . '</div></div></div></div></div></a></div>';
    }
    } else {
        echo '<div class="not-found">No se encontraron resultados :(</div>';
    }
    echo '</div>';

//Detalle de Crib
//
} else if ($request != '/cribhunt/' && $request != '/cribhunt/?cribsearch=') {

    $parts = explode('/', rtrim($request, '/'));
    $sql = "SELECT * FROM cribs WHERE categoriacrib = '$parts[2]' AND urlcrib = '$parts[3]'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $cribArray[$index] = $row;
            $index++;
        }
        include('detallecrib.php');
    
    } else {
      
        echo '<div class="not-found">Lo sentimos, esta página no existe :(</div>';
    
    }

//Página de inicio
//
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
    for ($i=0; $i < count($cribArray); $i++) { 
        echo '<div class="bit-4 crib-grid"><a class="crib-item wow zoomIn" data-wow-delay="' . $i*0.25 . 's" href="'. URL . $cribArray[$i]["categoriacrib"] . '/'. $cribArray[$i]["urlcrib"] .'/">' . '<div class="crib-container">' . '<div class="crib-image">' . '<img class="img-principal-crib" src="'. $cribArray[$i]["imagenprincipalcrib"] . 'alt="'. $cribArray[$i]["titulocrib"] .'">' . '</div><div class="descripcion-crib"><div class="titulo-crib-item">' . $cribArray[$i]["titulocrib"] . '</div><div class="mas-detalle-crib"><div class="precio-crib">$' . $cribArray[$i]["preciocrib"] . ' / Mes</div><div class="crib-cuartos-banios"><div class="cuartos-crib-item">' . $cribArray[$i]["cuartoscrib"] . '</div><div class="banios-crib-item">' . $cribArray[$i]["banioscrib"] . '</div></div></div></div></div></a></div>';
    }
    } else {
        echo '<div class="not-found">0 resultados</div>';
    }
    echo '</div>';
}

?>
            </div>
            <div id="canvas-cribmap">
            <div class="se-pre-con">
                <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
               <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                </svg>
            </div>
                <div id="cribmap-container"></div>
            </div>
            <div class="fullscreen ripple"></div>
        </div>

        <div style="display:none" class="sugerencias-forma">
            <div class="titulo-subtitulo-sugerencias">
                <h1>Queremos escucharte.</h1>
                <h2>Tu opinión es muy importante para nosotros, si tienes algún comentario, queja, sugerencia, problema o encontraste un bug envíanos un mensaje y te responderemos cuanto antes.</h2>
            </div>
                <form id="forma-de-sugerencias" action="" method="post" accept-charset="utf-8">
                    <div class="frame">
                        <div class="bit-1">
                            <input type="text" name="nombre" placeholder="Nombre (Opcional)">
                        </div>
                        <div class="bit-1">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="bit-1">
                            <textarea type="text" name="mensaje" placeholder="Mensaje, queja o sugerencia" required></textarea>
                        </div>
                        <div class="bit-1">
                            <button id="submit-sugerencias-form" class="ripple">Enviar</button>
                        </div>
                    </div>
                </form>
                <div class="bit-1 resultado"></div>
            </div>
        </div>
        </div>

        <script src="<?php echo URL ?>js/vendor/jquery-2.1.1.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
        <script src="<?php echo URL ?>js/jquery.bxslider.min.js"></script>
        <script src="<?php echo URL ?>js/plugins.js"></script>
        <script src="<?php echo URL ?>js/main.js"></script>
        <!--<script type="text/javascript" src="js/materialize.min.js"></script>-->
        <script type="text/javascript">
            $('.bxslider').bxSlider({
                pagerCustom: '#bx-pager',
                onSliderLoad: function(){
                $("#site-wrap-detallecrib").css("visibility", "visible");
                $(".se-pre-con").fadeOut();
              }
            });
        </script>
        
        <?php 

        if ($request != '/cribhunt/') {

        echo '<script>';
        echo '$(function() {';
        echo 'var houselatlong = new google.maps.LatLng(' . $cribArray[0]["latitudcrib"] . ', ' . $cribArray[0]["longitudcrib"] . ');';
            //var stylesArray = [{"stylers":[{"hue":"#007fff"},{"saturation":89}]},{"featureType":"water","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels","stylers":[{"visibility":"off"}]}]
        echo 'var map;';

        echo 'function initialize() {';
                 echo 'var mapOptions = {';
                   echo 'zoom: 18';
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
              echo 'var image = "' . URL . 'img/icons/geolocation.png";';
               echo 'var iconhouse = "' . URL . 'img/icons/location-red.png";';

                    echo 'var geolocationmarker = new google.maps.Marker({';
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
    </body>
</html>
