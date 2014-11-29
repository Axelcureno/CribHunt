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
        $apellidousuario = $row['apellidos'];
        $email = $row['email'];
        $universidad = $row['universidad'];
        $sexo = $row['sexo'];
        $telefono = $row['telefono'];
        $direccion = $row['direccion'];
        $ciudad = $row['ciudad'];
        $colonia = $row['colonia'];
        $codigopostal = $row['codigopostal'];
        $estado = $row['estado'];
        $pais = $row['pais'];
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
        <link rel="stylesheet" href="css/fancybox.css">
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
            <!--<a class="nav-a-item" href="mycribwishlist.php"><li class="nav-item">Mi Crib Wishlist</li></a>-->
            <a class="nav-a-item" href="perfil.php"><li class="nav-item">Administrar Perfil</li></a>
            <!--<a class="nav-a-item" href="opciones.php"><li class="nav-item">Opciones</li></a>-->
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
                <div class="titulo">Tu Perfil</div>
                    <div class="frame">
                    <form id="form-profile" action="">
                        <div class="bit-2">
                                <div class="imagen-perfil-admin">
                                <div class="tu-imagen">Tu imagen de Perfil</div>
                                    <img src="img/users/axelcureno/profile.png" alt="">
                                    <div class="cambiar-imagen"><a href="#">Cambiar</a></div>
                                </div>
                        </div>
                        <div class="bit-2">
                            <label for="nombreusuario">Nombre(s)</label>
                            <input placeholder="Nombres" type="text" value="<?php echo $nombreusuario ?>">
                            <label for="nombreusuario">Apellidos</label>
                            <input placeholder="Apellidos" type="text" value="<?php echo $apellidousuario ?>">
                            <label for="nombreusuario">Email</label>
                            <input placeholder="Email" type="text" value="<?php echo $email ?>">
                            <label for="nombreusuario">Universidad</label>
                            <input placeholder="Universidad" type="text" value="<?php echo $universidad ?>">
                            <label for="nombreusuario">Sexo</label>
                            <input placeholder="Sexo" type="text" value="<?php echo $sexo ?>">
                            <label for="nombreusuario">Télefono</label>
                            <input placeholder="Teléfono" type="text" value="<?php echo $telefono ?>">
                            <label for="nombreusuario">Dirección</label>
                            <input placeholder="Dirección" type="text" value="<?php echo $direccion ?>">
                            <label for="nombreusuario">Dirección</label>
                            <input type="text" value="<?php echo $direccion ?>">
                            <label for="nombreusuario">Ciudad</label>
                            <input placeholder="Ciudad" type="text" value="<?php echo $ciudad ?>">
                            <label for="nombreusuario">Colonia</label>
                            <input placeholder="Colonia" type="text" value="<?php echo $colonia ?>">
                            <label for="nombreusuario">Código Postal</label>
                            <input placeholder="Código Postal" type="text" value="<?php echo $codigopostal ?>">
                            <label for="nombreusuario">Estado</label>
                            <input placeholder="Estado" type="text" value="<?php echo $estado ?>">
                            <label for="nombreusuario">País</label>
                            <input placeholder="País" type="text" value="<?php echo $pais ?>">
                            <input class="actualizarperfil" type="submit" value="Actualizar" name="submit">

                        </div>
                    </form>
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
