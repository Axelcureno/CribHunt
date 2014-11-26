<?php
session_start();
if(!isset($_SESSION['usersicam']))
{
   header("location:index.php");
}
include("dbcon.php");

$id = $_SESSION['usersicam'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $rec = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($rec))
    {
        $nombreusuario = $row['nombres'];
    }

//if Submit was clicked
if(isset($_POST['submit'])) {
    //We define a favriable for the target folder for the file
    $target = "uploads/";
    //We define a variable with the name of the file
    $file_name = $_FILES['file']['name'];
    //We define a variable for the temporary directory for the file
    $tmp_dir = $_FILES['file']['tmp_name'];

    //We use a try to match the following, if it fails the catch exception is called
    try
    {
        //We use a regular expression to only accept image files, if it fails the throw exception is called
        if(!preg_match('/(gif|jpe?g|png)$/i', $file_name) || 
            //We use another regex in our if to check if the file type is an image, like a double check
            !preg_match('/^(image)/', $_FILES['file']['type']) ||
            //We also check if the file size is over 300000 bytes
            $_FILES['file']['size'] > 300000) 
        {   
            //In case the if matches (means something is different in 3 cases) the exception is made and the file is not uploaded
            throw new Exception("Not quite, buddy!");
            //We call the exit of the try
            exit;
        }
        //In case nothing was wrong, we move the file to the destination directory
        move_uploaded_file($tmp_dir, $target . $file_name);
        //We make a boolean var to say everything went fine with the file uploaded
        $status = true;
    }
    //In case something went wrong with the first try, a message is displayed to show the error 
    catch(Exception $e)
        {
            echo $e->getMessage();
        }
}

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>My CribHunt</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <ul class="navigation">
        <div class="perfil-usuario">
            <img class="profilepic-user" src="img/ui/ui-mask.png" alt="">
            <div class="hello-usuario">Hola, <?php echo $nombreusuario;?></div>
        </div>
        <div class="menu-de-usuario">
            <div class="que-deseas">
            ¿Qué deseas hacer?
        </div>
            <a class="nav-a-item" href="miscribs.php"><li class="nav-item">Mis Cribs</li></a>
            <a class="nav-a-item" href="mycribhunt.php"><li class="nav-item">Buscar Crib</li></a>
            <a class="nav-a-item" href="agregarcrib.php"><li class="nav-item">Publicar tu Crib</li></a>
            <a class="nav-a-item" href="mycribwishlist.php"><li class="nav-item">Mi Crib Wishlist</li></a>
            <a class="nav-a-item" href="perfil.php"><li class="nav-item">Administrar Perfil</li></a>
            <a class="nav-a-item" href="opciones.php"><li class="nav-item">Opciones</li></a>
            <a class="nav-a-item" href="logout.php"><li class="nav-item last-nav-item">Salir</li></a>
        </div>
        
        </ul>
            <input type="checkbox" id="nav-trigger" class="nav-trigger" />
            <label for="nav-trigger"></label>
            <div class="main-menu">
                <div class="logo-container">
                    <a href="mycribhunt.php"><img src="img/logo.svg" alt="CribHunt"></a>
                </div>
            <div class="search-container">
                    <form id="cribsearch" action="" method="post">
                        <input id="cribhunt-searchfield" type="text" placeholder="Casa, 3 recamaras, 3 baños, Mérida..." name="cribsearch">
                        <input id="cribsearch-submit" type="submit" value="" name="cribsearch">
                    </form>
            </div>
                <div class="toolbar">
                    <div class="usuario-bienvenido"><span class="holausuario">¿Alguna sugerencia?</span></div>
                        <div class="perfil-container">
                                <a href="logout.php"><img src="img/icons/logout.svg" alt="Usuario" title="Cerrar Sesión"></a>
                        </div>
                </div>
            </div>
        <div class="site-wrap">
            <div id="site-wrap-agregarcrib">
                <div class="canvas-cribhunt-agregar">
                <div class="frame">
                    <div class="descripcion-agregar">
                        Cuentanos sobre tu Crib
                    </div>
                    <div class="bit-2">
                        <div class="publicar-container">
                            <div class="titulo">Agrega unas imagenes</div>
                                <form enctype="multipart/form-data" action="" method="POST">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                                    <label for="file">Elige una imagen:</label> <input id="file" name="file" type="file" /><br />
                                    <input type="submit" value="Subir Imagen" name="submit" />
                                </form>
                        </div>
                    </div>
                    <div class="bit-2">
                        <div class="publicar-container">
                            <div class="titulo">Información General</div>
                            <?php 
                                //If the variable status exists (the file was uploaded) we display a message to confirm everything went fine
                                if(isset($status)) {
                                    //We define a var with the path of the file so we can make an html link to see the file, genius.
                                    $path = $target . $file_name;
                                    echo "Felicidades. <a href=\"$path\">Da clic para ver tu imagen.</a>";
                                }

                             ?>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div id="canvas-cribmap">
                <div id="cribmap-container"></div>
            </div>
        </div>

        <script src="js/vendor/jquery-2.1.1.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
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
        <script>
        
        $(function() {
            var houselatlong = new google.maps.LatLng(21.0027759, -89.6330445);
            var houselatlong2 = new google.maps.LatLng(21.1113653, -89.6120213);
            var stylesArray = [{"stylers":[{"hue":"#007fff"},{"saturation":89}]},{"featureType":"water","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.country","elementType":"labels","stylers":[{"visibility":"off"}]}]
            var map;

            function initialize() {
                var mapOptions = {
                  zoom: 13,
                  styles: stylesArray
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

                    map.setCenter(pos);

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
                var content = 'Error: Tu navegador no soporta Geolocalización :(';
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
        </script>
    </body>
</html>
