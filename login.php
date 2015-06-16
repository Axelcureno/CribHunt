<?php
include('functions.php');
session_start();
    function verificar_login($user,$password,&$result) {
    include('functions.php');
    $hashedpassword = crypt($user, $password);
    $sql = "SELECT * FROM usuarios WHERE email = '$user' and password = '$hashedpassword'";
    $rec = mysqli_query($con, $sql);
    $count = 0;
    while($row = mysqli_fetch_object($rec))
    {
        $count++;
        $result = $row;
    }
    if($count == 1)
    {
        return 1;
    }
    else
    {
        return 0;
    }
}
if(!isset($_SESSION['usersicam']))
{
    if(isset($_POST['login']))
    {
        if(verificar_login($_POST['user'],$_POST['passwordinicio'],$result) == 1)
        {
            $_SESSION['usersicam'] = $result->id;
            header('Location: ' . URL);
        }
        else
        { 
            echo "Usuario y/o contraseña incorrectos";
        }
    } 
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>CribHunt | Ingresa</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
<link rel="stylesheet" href="css/animate.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<style type="text/css" media="screen">
    * {
        font-family: 'Roboto', sans-serif;
    }
html {
    width:100%;
    height:100%;
}
body {
    width:100%;
    height:100%;
}
::-webkit-input-placeholder {
   color: #3F51B5;
}
*:focus {
    outline: none;
}
:-moz-placeholder { /* Firefox 18- */
   color: #3F51B5;  
}

::-moz-placeholder {  /* Firefox 19+ */
   color: #3F51B5;  
}

:-ms-input-placeholder {  
   color: #3F51B5;  
}
input:focus { 
    background-color: transparent;
    border: none;
}
input.middle:focus {
    outline-width: 0;
}
@media (max-width: 30em) {
  .body-container .register-container {
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    position: absolute;
    transform: none;
  }
  .body-container .forma-registroinicio input {
    font-size: 16px;
    width: 302px;
    margin-top: 0.5em;
    padding: 0.5em;
    color: #2c3e50;
    line-height: 20px;
    border-bottom: 2px solid #FF5722;
    border-left: none;
    border-top: none;
    border-right: none;
    background-color: transparent;
    transition: 0.2s all ease-in-out;
  }
  .body-container .forma-registroinicio {
    padding-top: 0;
  }
}

.body-container {
    width: 100%;
    height: 100%;
    background-image: url('http://localhost/cribhunt/img/heroimages/fourteen.jpg');
    background-repeat:no-repeat;
    background-size: cover;
}
.registro-logo-container {
    display: block;
    background-color: #3F51B5;
    color: #fff;
    text-decoration: none;
    border-radius: 2px 2px 0 0;
}
.registro-logo-container img {
    width: 250px;
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 5px;
    padding-right: 5px;
    display: block;
    margin: auto auto;
}
.bienvenido {
    text-align: center;
    color: #7f8c8d;
    font-weight: 300;
    padding-top: 1em;
}
.bienvenido h2 {
    padding-top: 1.5em;
}
.register-container {
  background-color: #EEE;
  position: absolute;
  position: fixed;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  width: 500px;
  height: auto;
  border-radius: 2px;
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}
.etabs {
    margin: 0;
    padding: 0;
}
.tab {
  display: inline-block;
  zoom: 1;
  width: 50%;
  float: left;
  color: #fff;
  background-color: #3F51B5;
  border-bottom: none;
  text-align: center;
  border-bottom: 2px solid #3F51B5;
  transition: 0.2s all ease-in-out;
}
.tab a {
  font-weight: 300;
  font-size: 18px;
  line-height: 2em;
  display: block;
  padding: 0 10px;
  outline: none;
  color: #fff;
  text-decoration: none;
}
.tab a:hover {
    text-decoration: none;
}
.tab.active {
  position: relative;
  border-bottom: 2px solid #FF5722;
}
.tab-container .panel-container {
    background: #fff;
    border: solid #666 1px;
    padding: 10px;
    -moz-border-radius: 0 4px 4px 4px;
    -webkit-border-radius: 0 4px 4px 4px;
}
.terminos-condiciones {
    width: 100%;
    display: block;
    float: left;
    margin-top: 20px;
}
.forma-registroinicio {
    display: block;
    width: 100%;
    padding: 1em;
}
.forma-registroinicio {
    width: inherit;
    height: inherit;
    display: block;
    margin-top: 0;
}
.forma-registroinicio input {
  font-size: 16px;
  width: 440px;
  margin-top: 0.5em;
  padding: 0.5em;
  color: #2c3e50;
  line-height: 20px;
  border-bottom: 2px solid #FF5722;
  border-left: none;
  border-top: none;
  border-right: none;
  background-color: transparent;
  transition: 0.2s all ease-in-out;
}
.register-container .forma-registroinicio .boton-registroinicio {
  border: none;
  color: #fff;
  width: 125px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  border-bottom: none;
  background-color: #FF5722;
  margin-top: 20px;
  border-radius: 2px;
  display: block;
  float: right;
  margin: 10px 10px 30px 0px;
}
.register-container .forma-registroinicio .boton-registroinicio:hover {
    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
}
.register-container .forma-registroinicio .boton-registroinicio:disabled {
    background-color: #FFAB91;
    border-bottom: none;
    box-shadow: none;
}
.container-agregar-crib {
  padding:5px; 
}
.olvidaste-password {
    margin-top: 10px;
    color: #2c3e50;
    font-size: 12px;
    text-align: center;
    text-decoration: underline;
}
.forma-registroinicio .acepto {
    width: initial;
    float: left;
    margin-top: 10px;
}
.heleido {
    color: #01579B;
    float: left;
    margin: 5px;
}
.link-terminos {
    text-decoration: underline;
}
</style>
<body>
<!--[if lt IE 8]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="body-container">
    <div class="register-container">
        <div class="registro-logo-container">
            <img src="img/logo.svg" alt="CribHunt">
        </div>
        <div id="tab-container" class="tab-container">
          <ul class='etabs'>
            <li class='tab'><a href="#tabs1-iniciosesion">INICIAR SESIÓN</a></li>
            <li class='tab'><a href="#tabs1-registro">REGISTRARSE</a></li>
          </ul>
          <div id="tabs1-registro">
            <div class="bienvenido">
                <h2>¡Bienvenido a tu registro!</h2>
            </div>
                <div class="forma-registroinicio">
                    <form id="registro-usuario" action="" method="post">
                        <input required placeholder="Nombre(s)" type="text" name="nombres">
                        <input required placeholder="Apellidos" type="text" name="apellidos">
                        <input required placeholder="Email" type="text" name="email">
                        <input id="password" required placeholder="Contraseña" type="password" name="password">
                        <input id="password2" required placeholder="Confirmar Contraseña" type="password" name="passwordconfirmacion">
                        <div class="terminos-condiciones">
                            <input required id="aceptocheck" class="acepto" type="checkbox"><span class="heleido">He leído y acepto los <span class="link-terminos"><a href="">Términos y Condiciones</a></span></span>
                        </div>                                <div class="resultado"></div>
                        <input id="botonderegistro" class="boton-registroinicio" disabled="disabled" name="registrarse" type="submit" value="Registrarse">
                    </form>
                </div>
          </div>
          <div id="tabs1-iniciosesion">
            <div class="bienvenido">
                <h2>¡Bienvenido de vuelta!</h2>
            </div>
                <div class="forma-registroinicio">
                    <form id="iniciosesion-usuario" action="" method="post">
                        <input required placeholder="Email" type="text" <?php if(isset($_POST['submit']))  echo 'value="'.$_POST['email'].'"'; ?> name="user" >
                        <input required placeholder="Contraseña" type="password" name="passwordinicio">
                        <div class="resultado"></div>
                        <input class="boton-registroinicio" type="submit" name="login" value="Iniciar Sesión">
                        <a href="#"><div class="olvidaste-password">Olvidaste tu contraseña?</div></a>
                    </form>
                </div>
                </div>
        </div>
    </div>
</div>
        <script src="<?php echo URL ?>js/vendor/jquery-2.1.1.min.js"></script>
        <script src="<?php echo URL ?>js/plugins.js"></script>
        <script src="<?php echo URL ?>js/main.js"></script>
        <script>$('#tab-container').easytabs({updateHash: false});</script>
        <script>new WOW().init();</script>
    </body>
</html>
<?php
} else {
    header('Location: ' . URL);
}
?>


