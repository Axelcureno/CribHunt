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

//Busqueda de la barra superior.
if (isset($_GET['cribsearch']) && $_GET['cribsearch'] != '') {

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

        include('head.php');
        include('header.php');
        echo '<div id="canvas-mycribhunt" class="frame">';
        for ($i=0; $i < count($cribArray); $i++) { 
            echo '<div class="bit-4 crib-grid"><a class="crib-item wow zoomIn" data-wow-delay="' . $i*0.25 . 's" href="'. URL . $cribArray[$i]["categoriacrib"] . '/'. $cribArray[$i]["urlcrib"] .'/"><div class="crib-container"><div class="crib-image"><img class="img-principal-crib" src="'. $cribArray[$i]["imagenprincipalcrib"] . 'alt="'. $cribArray[$i]["titulocrib"] .'"></div><div class="descripcion-crib"><div class="titulo-crib-item">' . $cribArray[$i]["titulocrib"] . '</div><div class="mas-detalle-crib"><div class="precio-crib">$' . $cribArray[$i]["preciocrib"] . ' / Mes</div><div class="crib-cuartos-banios"><div class="cuartos-crib-item">' . $cribArray[$i]["cuartoscrib"] . '</div><div class="banios-crib-item">' . $cribArray[$i]["banioscrib"] . '</div></div></div></div></div></a></div>';
        }

    } else {

        include('head.php');
        include('header.php');
        echo '<div id="canvas-mycribhunt" class="frame">';
        echo '<div class="not-found">No se encontraron resultados con la búsqueda: '. $query .' </div>';

    }
    echo '</div>';

//Busqueda en base a Parámetros
} else if (isset($_GET['ciudadocolonia']) && $_GET['ciudadocolonia'] != '') {

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

        $title = 'Resultados de la búsqueda - CribHunt';
        $description = 'CribHunt es la plataforma para encontrar a los que ofrecen opciones para vivir con aquellos que las buscan de manera cómoda, rápida y sencilla.';
        include('head.php');
        include('header.php');
        echo '<div id="canvas-mycribhunt" class="frame">';
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $cribArray[$index] = $row;
            $index++;
        }
    for ($i=0; $i < count($cribArray); $i++) { 

        echo '<div class="bit-4 crib-grid"><a class="crib-item wow zoomIn" data-wow-delay="' . $i*0.25 . 's" href="'. URL . $cribArray[$i]["categoriacrib"] . '/'. $cribArray[$i]["urlcrib"] .'/">' . '<div class="crib-container">' . '<div class="crib-image">' . '<img class="img-principal-crib" src="'. $cribArray[$i]["imagenprincipalcrib"] . 'alt="'. $cribArray[$i]["titulocrib"] .'">' . '</div><div class="descripcion-crib"><div class="titulo-crib-item">' . $cribArray[$i]["titulocrib"] . '</div><div class="mas-detalle-crib"><div class="precio-crib">$' . $cribArray[$i]["preciocrib"] . ' / Mes</div><div class="crib-cuartos-banios"><div class="cuartos-crib-item">' . $cribArray[$i]["cuartoscrib"] . '</div><div class="banios-crib-item">' . $cribArray[$i]["banioscrib"] . '</div></div></div></div></div></a></div>';
    }

    } else {

        //SEO
        $title = 'No se encontraron resultados - CribHunt';
        $description = 'CribHunt es la plataforma para encontrar a los que ofrecen opciones para vivir con aquellos que las buscan de manera cómoda, rápida y sencilla.';
        include('head.php');
        include('header.php');
        echo '<div id="canvas-mycribhunt" class="frame">';
        echo '<div class="not-found">No se encontraron resultados :(</div>';
    }
    echo '</div>';

//Detalle de Crib
} else if ($request != '/' && $request != '?cribsearch=') {

    $parts = explode('/', rtrim($request, '/'));
    $sql = "SELECT * FROM cribs WHERE categoriacrib = '$parts[1]' AND urlcrib = '$parts[2]'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $cribArray[$index] = $row;
            $index++; 
        }

    //SEO
        $title = $cribArray[0]["titulocrib"] . ' - $' . $cribArray[0]["preciocrib"] . ' - CribHunt';
        $description = $cribArray[0]["titulocrib"];
        $imgog = $cribArray[0]["imagenprincipalcrib"];
        include('head.php');
        include('header.php');
        include('detallecrib.php');

    } else {

        //SEO
        $title = 'Página no encontrada - CribHunt';
        $description = 'CribHunt es la plataforma para encontrar a los que ofrecen opciones para vivir con aquellos que las buscan de manera cómoda, rápida y sencilla.';
        //Variable que indica si hay un error 404
        $notfount = 1;
        include('head.php');
        include('header.php');
        echo '<div id="canvas-mycribhunt" class="frame">';
        echo '<div class="not-found">Lo sentimos, esta página no existe :(</div>';
    
    }

//Página de inicio
} else {

    $sql = "SELECT * FROM cribs";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $cribArray[$index] = $row;
            $index++;
        }

    $title = 'CribHunt - Casas, departamenos y cuartos en renta.';
    $description = 'CribHunt es la plataforma para encontrar a los que ofrecen opciones para vivir con aquellos que las buscan de manera cómoda, rápida y sencilla.';
    include('head.php');
    include('header.php');
    echo '<div id="canvas-mycribhunt" class="frame">';
    for ($i=0; $i < count($cribArray); $i++) { 
        echo '<div class="bit-4 crib-grid"><a class="crib-item  wow zoomIn" href="'. URL . $cribArray[$i]["categoriacrib"] . '/'. $cribArray[$i]["urlcrib"] .'/">' . '<div class="crib-container">' . '<div class="crib-image">' . '<img class="img-principal-crib" src="'. $cribArray[$i]["imagenprincipalcrib"] . '-/progressive/yes/" alt="'. $cribArray[$i]["titulocrib"] .'">' . '</div><div class="descripcion-crib"><div class="titulo-crib-item">' . $cribArray[$i]["titulocrib"] . '</div><div class="mas-detalle-crib"><div class="precio-crib">$' . $cribArray[$i]["preciocrib"] . ' / Mes</div><div class="crib-cuartos-banios"><div class="cuartos-crib-item">' . $cribArray[$i]["cuartoscrib"] . '</div><div class="banios-crib-item">' . $cribArray[$i]["banioscrib"] . '</div></div></div></div></div></a></div>';
    }

    } else {
        $title = 'CribHunt - No hay resultados.';
        $description = 'CribHunt es la plataforma para encontrar a los que ofrecen opciones para vivir con aquellos que las buscan de manera cómoda, rápida y sencilla.';
        include('head.php');
        include('header.php');
        echo '<div id="canvas-mycribhunt" class="frame">';
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
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
        <script src="<?php echo URI ?>js/jquery.bxslider.min.js"></script>
        <script src="<?php echo URI ?>js/plugins.js"></script>
        <script src="<?php echo URI ?>js/main.js"></script>
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
        <script>$('#tab-container').easytabs();</script>
        <script>new WOW().init();</script>
        <script>
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
