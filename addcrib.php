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
        <script src="<?php echo URL ?>js/vendor/jquery-2.1.1.min.js"></script>
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
        <script src="<?php echo URL ?>js/locationpicker.jquery.js"></script>å
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
                <div class="canvas-cribhunt-agregar">
                    <div class="frame">
                        <form id="agregarcribform" action="addcrib_submit" method="post" accept-charset="utf-8">
                            <div class="bit-2">
                                <div class="form-upload-container">
                                    <label for="titulo">Titulo</label>
                                    <input required type="text" name="titulo" value="">
                                </div>
                                <div class="form-upload-container">
                                    <div class="label-form">Subir Imagen(es):</div>
                                    <input type="hidden" role="uploadcare-uploader"
                                      data-images-only="true"
                                      data-multiple="true" />
                                      <input required style="display:none;" id="imagenprincipal-input" type="text" name="imagenprincipalinput" value="">
                                      <input required style="display:none;" id="imagen-input" type="text" name="imageninput" value="">
                                </div>
                                <div class="form-upload-container">
                                    <label for="titulo">Categoría</label>
                                    <select name="categoria">
                                        <option value="casa">Casa</option>
                                        <option value="departamento">Departamento</option>
                                        <option value="cuarto">Cuarto</option>
                                    </select>
                                </div>
                                <input required style="display:none" type="text" name="latitudcrib" id="us2-lat"/>
                                <input required style="display:none"type="text" name="longitudcrib" id="us2-lon"/>
                            <div class="form-upload-container">
                                <label for="titulo">Características</label>
                                    <div id="toolbar1" style="display: none;">
                                        <a data-wysihtml5-command="bold" title="CTRL+B">Negrita</a> |
                                        <a data-wysihtml5-command="italic" title="CTRL+I">Itálica</a> |
                                        <a data-wysihtml5-command="createLink">Insertar enlace</a> |
                                        <a data-wysihtml5-command="insertImage">Insertar Imagen</a> |
                                        <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">H1</a> |
                                        <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">H2</a> |
                                        <a data-wysihtml5-command="insertUnorderedList">Insertar Lista Sin Enumerar</a> |
                                        <a data-wysihtml5-command="insertOrderedList">Insertar Lista Enumerada</a> |
                                        <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red">Rojo</a> |
                                        <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green">Verde</a> |
                                        <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue">Azul</a> |
                                        <a data-wysihtml5-command="insertSpeech">Speech</a>
                                        <a data-wysihtml5-action="change_view">Cambiar a vista HTML</a>
                                        
                                        <div data-wysihtml5-dialog="createLink" style="display: none;">
                                          <label>
                                            Link:
                                            <input data-wysihtml5-dialog-field="href" value="http://">
                                          </label>
                                          <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancelar</a>
                                        </div>
                                        
                                        <div data-wysihtml5-dialog="insertImage" style="display: none;">
                                          <label>
                                            Imagen:
                                            <input data-wysihtml5-dialog-field="src" value="http://">
                                          </label>
                                          <label>
                                            Alinear:
                                            <select data-wysihtml5-dialog-field="className">
                                              <option value="">Default</option>
                                              <option value="wysiwyg-float-left">Izquierda</option>
                                              <option value="wysiwyg-float-right">Derecha</option>
                                            </select>
                                          </label>
                                          <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
                                        </div>
                                      </div>
                                    <textarea required id="caractextarea" type="text" cols="40" rows="8" name="caracteristicas" required></textarea>
                                    <br>
                                </div>
                                <div class="form-upload-container">
                                  <label for="cuartos">Cuartos</label>
                                  <select name="cuartos">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="10+">10+</option>
                                  </select>
                                </div>
                                <div class="form-upload-container">
                                  <label for="banios">Baños</label>
                                  <select name="banios">
                                    <option value="1">1</option>
                                    <option value="1.5">1.5</option>
                                    <option value="2">2</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3">3</option>
                                    <option value="3.5">3.5</option>
                                    <option value="4">4</option>
                                    <option value="4.5">4.5</option>
                                    <option value="5">5</option>
                                    <option value="5.5">5.5</option>
                                    <option value="6+">6+</option>
                                  </select>
                                </div>
                                <div class="form-upload-container">
                                        <label for="titulo">Requisitos</label>
                                              <div id="toolbar2" style="display: none;">
                                                <a data-wysihtml5-command="bold" title="CTRL+B">Negrita</a> |
                                                <a data-wysihtml5-command="italic" title="CTRL+I">Itálica</a> |
                                                <a data-wysihtml5-command="createLink">Insertar enlace</a> |
                                                <a data-wysihtml5-command="insertImage">Insertar Imagen</a> |
                                                <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">H1</a> |
                                                <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">H2</a> |
                                                <a data-wysihtml5-command="insertUnorderedList">Insertar Lista Sin Enumerar</a> |
                                                <a data-wysihtml5-command="insertOrderedList">Insertar Lista Enumerada</a> |
                                                <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red">Rojo</a> |
                                                <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green">Verde</a> |
                                                <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue">Azul</a> |
                                                <a data-wysihtml5-command="insertSpeech">Speech</a>
                                                <a data-wysihtml5-action="change_view">Cambiar a vista HTML</a>
                                                
                                                <div data-wysihtml5-dialog="createLink" style="display: none;">
                                                  <label>
                                                    Link:
                                                    <input data-wysihtml5-dialog-field="href" value="http://">
                                                  </label>
                                                  <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancelar</a>
                                                </div>
                                                
                                                <div data-wysihtml5-dialog="insertImage" style="display: none;">
                                                  <label>
                                                    Imagen:
                                                    <input data-wysihtml5-dialog-field="src" value="http://">
                                                  </label>
                                                  <label>
                                                    Alinear:
                                                    <select data-wysihtml5-dialog-field="className">
                                                      <option value="">Default</option>
                                                      <option value="wysiwyg-float-left">Izquierda</option>
                                                      <option value="wysiwyg-float-right">Derecha</option>
                                                    </select>
                                                  </label>
                                                  <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
                                                </div>
                                              </div>
                                            <textarea id="reqtextarea" type="text" cols="40" rows="8" name="requisitos" required></textarea>
                                            <br>
                                    </div>
                        </div>
                        <div class="bit-2">
                                    <div class="form-upload-container">
                                        <label for="titulo">Precio</label>
                                        <input required type="text" name="precio" value="">
                                    </div>
                                    <div class="form-upload-container">
                                        <label for="titulo">Universidad(es) aledaña(s)</label>
                                              <div id="toolbar3" style="display: none;">
                                                <a data-wysihtml5-command="bold" title="CTRL+B">Negrita</a> |
                                                <a data-wysihtml5-command="italic" title="CTRL+I">Itálica</a> |
                                                <a data-wysihtml5-command="createLink">Insertar enlace</a> |
                                                <a data-wysihtml5-command="insertImage">Insertar Imagen</a> |
                                                <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">H1</a> |
                                                <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">H2</a> |
                                                <a data-wysihtml5-command="insertUnorderedList">Insertar Lista Sin Enumerar</a> |
                                                <a data-wysihtml5-command="insertOrderedList">Insertar Lista Enumerada</a> |
                                                <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red">Rojo</a> |
                                                <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green">Verde</a> |
                                                <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue">Azul</a> |
                                                <a data-wysihtml5-command="insertSpeech">Speech</a>
                                                <a data-wysihtml5-action="change_view">Cambiar a vista HTML</a>
                                                
                                                <div data-wysihtml5-dialog="createLink" style="display: none;">
                                                  <label>
                                                    Link:
                                                    <input data-wysihtml5-dialog-field="href" value="http://">
                                                  </label>
                                                  <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancelar</a>
                                                </div>
                                                
                                                <div data-wysihtml5-dialog="insertImage" style="display: none;">
                                                  <label>
                                                    Imagen:
                                                    <input data-wysihtml5-dialog-field="src" value="http://">
                                                  </label>
                                                  <label>
                                                    Alinear:
                                                    <select data-wysihtml5-dialog-field="className">
                                                      <option value="">Default</option>
                                                      <option value="wysiwyg-float-left">Izquierda</option>
                                                      <option value="wysiwyg-float-right">Derecha</option>
                                                    </select>
                                                  </label>
                                                  <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
                                                </div>
                                              </div>
                                        <textarea id="unitextarea" type="text" cols="40" rows="8" name="universidades" required></textarea>
                                <br>
                                    </div>
                                    <div class="form-upload-container">
                                        <label for="titulo">Teléfono</label>
                                        <input required type="text" name="telefono" value="">
                                    </div>
                                    <div class="form-upload-container">
                                        <label for="titulo">Ciudad</label>
                                        <input required id="ciudadcrib" type="text" name="ciudad" value="">
                                    </div>
                                    <div class="form-upload-container">
                                        <label for="titulo">Estado</label>
                                        <input required id="estadocrib" type="text" name="estado" value="">
                                    </div>
                                    <div class="form-upload-container">
                                        <label for="titulo">Colonia</label>
                                        <input required id="coloniacrib" type="text" name="colonia" value="">
                                    </div>
                                    <div class="form-upload-container">
                                        <label for="titulo">Código Postal</label>
                                        <input required id="cpcrib" type="text" name="cp" value="">
                                    </div>
                                    <div class="form-upload-container">
                                        <label for="titulo">Dirección</label>
                                        <input required id="direccioncrib" type="text" name="direccion" value="">
                                    </div>
                                    <div class="form-upload-container">
                                        <label for="titulo">País</label>
                                        <input required id="paiscrib" type="text" name="pais" value="">
                                    </div>
                                    <div class="form-upload-container">
                                        <input id="enviar" type="submit" name="submitcrib" value="Enviar">
                                    </div>
                                    <div class="form-upload-container">
                                      <div class="result"></div>
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="canvas-cribmap-add">
                    <div id="somecomponent" style="width: 100%; height: 100%;"></div>
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
        <script>
          var editor1 = new wysihtml5.Editor("caractextarea", {
            toolbar:      "toolbar1",
            stylesheets:  "css/wysihtml5.css",
            parserRules:  wysihtml5ParserRules
          });

          var editor2 = new wysihtml5.Editor("reqtextarea", {
            toolbar:      "toolbar2",
            stylesheets:  "css/wysihtml5.css",
            parserRules:  wysihtml5ParserRules
          });
          
          var editor3 = new wysihtml5.Editor("unitextarea", {
            toolbar:      "toolbar3",
            stylesheets:  "css/wysihtml5.css",
            parserRules:  wysihtml5ParserRules
          });

</script>
        <script>
        function updateControls(addressComponents) {
            $('#direccioncrib').val(addressComponents.addressLine1);
            $('#ciudadcrib').val(addressComponents.city);
            $('#estadocrib').val(addressComponents.stateOrProvince);
            $('#cpcrib').val(addressComponents.postalCode);
            $('#paiscrib').val(addressComponents.country);
        }
            $('#somecomponent').locationpicker({
                location: {latitude: 21.0335705, longitude: -89.6270551},
                radius: 50,
                inputBinding: {
                    latitudeInput: $('#us2-lat'),
                    longitudeInput: $('#us2-lon'),
                    radiusInput: $('#us2-radius'),
                    locationNameInput: $('#us2-address')
                },
                onchanged: function (currentLocation, radius, isMarkerDropped) {
                    var addressComponents = $(this).locationpicker('map').location.addressComponents;
                    updateControls(addressComponents);
                },
                oninitialized: function(component) {
                    var addressComponents = $(component).locationpicker('map').location.addressComponents;
                    updateControls(addressComponents);
                }
            });
        </script>
  <script>
            UPLOADCARE_LOCALE = "en";
            UPLOADCARE_TABS = "file url facebook gdrive dropbox instagram evernote flickr skydrive";
            UPLOADCARE_PUBLIC_KEY = "1827376d3a32a0439684";

    var multipleWidget = uploadcare.MultipleWidget("[role=uploadcare-uploader]");
        //$ = uploadcare.jQuery; // skip this if you already have jQuery on the page
        multipleWidget.onChange(function(group) {
          if (group) {
            group; // group object
            group.files(); // array of file objects
            group.files()[0].done(function(fileInfo) {
              $('#imagenprincipal-input').val(fileInfo.cdnUrl);
              console.log(fileInfo.cdnUrl);
            });
            $.when.apply(null, group.files()).then(function() {
              arguments; // array of individual file infos
              $.each(arguments, function() {
                $('#imagen-input').val($('#imagen-input').val() + this.cdnUrl + '#');
                //$('#imagen-input').val(this.uuid);
              });
            });
          }
    });
    </script>

    <script>
    var secureurl = '';

    if (location.host == 'cribhunt.dev') {
        secureurl = 'http://cribhunt.dev';
    } else {
        secureurl = 'https://cribhunt.co';
    }
        $("#agregarcribform").submit(function(event) {
          // Stop form from submitting normally
          event.preventDefault();
          // Get some values from elements on the page:
          var values = $(this).serialize();
          // Send the data using post and put the results in a div
            $.ajax({
                url: secureurl + '/nuevouploadcrib.php',
                type: "post",
                data: values,
                success: function(result){
                  $('#enviar').attr('disabled',true);
                    swal({   title: "¡Felicidades!",   text: result,   type: "success",   confirmButtonText: "Cool" });                  
                  //$('.resultado').html(result);
              },
                error:function(){

                }
          });

        }); 
    </script>
      
    </body>
</html>
