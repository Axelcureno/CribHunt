 <?php
include("functions.php");
startpage();
$id = $_SESSION['usersicam'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $rec = mysqli_query($con, $sql);
    while($row = mysqli_fetch_array($rec))
    {
        $nombreusuario = $row['nombres'];
    }
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CribHunt | Agregar Crib</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        <link rel="stylesheet" href="<?php echo URL ?>css/main.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/animate.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/fancybox.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo URL ?>css/jquery.fileupload.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>css/google.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL ?>css/sweetalert.css">
        <script src="<?php echo URI ?>js/vendor/jquery-2.1.1.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
        <script src="<?php echo URI ?>js/locationpicker.jquery.js"></script>å
        <style>
  h2 {
    margin-bottom: 0;
  }
  
  small {
    display: block;
    margin-top: 40px;
    font-size: 9px;
  }
  
  small,
  small a {
    color: #666;
  }
  
  textarea a {
    color: #000;
    text-decoration: underline;
    cursor: pointer;
  }
  
  #toolbar [data-wysihtml5-action] {
    float: right;
  }
  
  #toolbar,
  textarea {
    width: 100%;
    padding: 5px;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  
  textarea {
    height: 280px;
    border: 2px solid #29B6F6;
    font-family: Verdana;
    font-size: 11px;
  }
  
  textarea:focus {
    color: black;
    border: 2px solid black;
  }
  
  .wysihtml5-command-active {
    font-weight: bold;
  }
  
  [data-wysihtml5-dialog] {
    margin: 5px 0 0;
    padding: 5px;
    border: 1px solid #666;
  }
  
  a[data-wysihtml5-command-value="red"] {
    color: red;
  }
  
  a[data-wysihtml5-command-value="green"] {
    color: green;
  }
  
  a[data-wysihtml5-command-value="blue"] {
    color: blue;
  }
</style>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
            <?php if (isset($_SESSION['usersicam'])){ echo '<input type="checkbox" id="nav-trigger" class="nav-trigger" /><label class="ripple" for="nav-trigger"></label>'; }  ?>
            <div class="main-menu">
                <div <?php if (isset($_SESSION['usersicam'])){ echo 'style="  margin-left: 65px; "'; }  ?> class="logo-container">
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
        <ul class="navigation">
          <div class="perfil-usuario">
              <img class="profilepic-user" src="<?php echo URL; ?>img/ui/ui-mask.png" alt="">
              <div class="hello-usuario">Hola, <?php echo $nombreusuario;?></div>
          </div>
          <div class="menu-de-usuario">
              <div class="que-deseas">
              ¿Qué deseas hacer?
          </div>
              <!--<a class="nav-a-item" href="#"><button class="ripple nav-ripple"><li class="nav-item">Mis Cribs</li></button></a>-->
              <a class="nav-a-item" href="<?php echo URL; ?>"><button class="ripple nav-ripple"><li class="nav-item">Buscar Crib</li></button></a>
              <a class="nav-a-item" href="<?php echo URL; ?>addcrib.php"><button class="ripple nav-ripple"><li class="nav-item">Publicar Crib</li></button></a>
              <!--<a class="nav-a-item" href="#"><li class="nav-item"><button class="ripple nav-ripple">Administrar Perfil</li></button></a>-->
              <a class="nav-a-item" href="<?php echo URL; ?>logout.php"><button class="ripple nav-ripple"><li class="nav-item last-nav-item">Cerrar Sesión</li></button></a>
              <a class="nav-a-item" href="<?php echo URL; ?>logout.php"><button class="ripple nav-ripple"><li class="nav-item last-nav-item">Ayuda</li></button></a>
          </div>
        </ul>
        <div class="site-wrap-add">
            <div id="site-wrap">
            	<div class="frame">
            		<div class="bit-1">
            			
            		</div>
            	</div>
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
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script src="<?php echo URL ?>js/plugins.js"></script>
        <script src="<?php echo URL ?>js/main.js"></script>
       <script charset="utf-8" src="//ucarecdn.com/widget/2.0.4/uploadcare/uploadcare.full.min.js"></script>
        <script src="<?php echo URL ?>js/parser_rules/advanced.js"></script>
        <script src="<?php echo URL ?>js/wysihtml5-0.3.0.min.js"></script>
        <script src="<?php echo URL ?>js/sweetalert.min.js"></script>
    </body>
</html>
