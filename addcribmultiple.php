<?php 

require('functions.php');
connectDb();
session_start();
    function verificar_login($user,$password,&$result) {
    include('dbcon.php');
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
            header("location:login.php");
        }
        else
        { 
            echo "Usuario y/o contraseña incorrectos";
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
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/uploadstyle.css">
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <link rel="stylesheet" href="css/jquery.fileupload.css">
        <link rel="stylesheet" href="css/jquery.fileupload-ui.css">
        <noscript><link rel="stylesheet" href="css/jquery.fileupload-noscript.css"></noscript>
        <noscript><link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"></noscript>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100italic,100,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
        <script src="js/locationpicker.jquery.js"></script>
        <style>
body {
  max-width: 750px;
  margin: 0 auto;
  padding: 1em;
  font-family: "Lucida Grande", "Lucida Sans Unicode", Arial, sans-serif;
  font-size: 1em;
  line-height: 1.4em;
  color: #000;
  -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
}
a {
  color: orange;
  text-decoration: none;
}
img {
  border: 0;
  vertical-align: middle;
}
h1 {
  line-height: 1em;
}
blockquote {
  padding: 0 0 0 15px;
  margin: 0 0 20px;
  border-left: 5px solid #eee;
}
table {
  width: 100%;
  margin: 10px 0;
}

.fileupload-progress {
  margin: 10px 0;
}
.fileupload-progress .progress-extended {
  margin-top: 5px;
}
.error {
  color: red;
}

@media (min-width: 481px) {
  .navigation {
    list-style: none;
    padding: 0;
  }
  .navigation li {
    display: inline-block;
  }
  .navigation li:not(:first-child):before {
    content: "| ";
  }
}
 
 .ui-widget {
    font-size: 0.95em;
  }

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
  
  a {
    color: #000;
    text-decoration: underline;
    cursor: pointer;
  }
  
  #toolbar [data-wysihtml5-action] {
    float: right;
  }
  
  #toolbar,
  textarea {
    width: 850px;
    padding: 5px;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  
  textarea {
    height: 280px;
    border: 2px solid #000;
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

        <div class="form-uploadcrib">
            <h2>Crib Upload</h2>
            <div class="container">
                <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
                    <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                    <div class="row fileupload-buttonbar">
                        <div class="col-lg-7">
                            <span class="btn btn-success fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Add files...</span>
                                <input type="file" name="files[]" multiple>
                            </span>
                            <button type="submit" class="btn btn-primary start">
                                <i class="glyphicon glyphicon-upload"></i>
                                <span>Start upload</span>
                            </button>
                            <button type="reset" class="btn btn-warning cancel">
                                <i class="glyphicon glyphicon-ban-circle"></i>
                                <span>Cancel upload</span>
                            </button>
                            <button type="button" class="btn btn-danger delete">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Delete</span>
                            </button>
                            <input type="checkbox" class="toggle">
                            <span class="fileupload-process"></span>
                        </div>
                        <div class="col-lg-5 fileupload-progress fade">
                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                            </div>
                            <div class="progress-extended">&nbsp;</div>
                        </div>
                    </div>
                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                </form>
                <br>
            </div>
<!-- The blueimp Gallery widget -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
            <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
            </div>
            <form action="addcrib_submit" method="post" accept-charset="utf-8">
                <div class="form-upload-container">
                    <label for="titulo">Titulo</label>
                    <input type="text" name="titulo" value="">
                </div>
                <div class="form-upload-container">
                    <div class="label-form">Subir Imagen(es):</div>
                      <input id="imagen-input" type="text" name="imageninput" value="">
                </div>
                <div class="form-upload-container">
                    <label for="titulo">Categoría</label>
                    <select name="categoria">
                        <option value="casa">Casa</option>
                        <option value="departamento">Departamento</option>
                        <option value="cuarto">Cuarto</option>
                    </select>
                </div>
                <div class="form-upload-container">
                    <label for="titulo">Ubicación</label>
                    <!--<div id="map-canvas"></div> -->
                    <div class="latlong-container">
                        <input type="text" id="us2-lat"/>
                        <input type="text" id="us2-lon"/>
                    </div>
                    <div id="somecomponent" style="width: 500px; height: 400px;"></div>
                </div>
                <div class="form-upload-container">
                    <label for="titulo">Características</label>
                        <div id="toolbar1" style="display: none;">
                            <a data-wysihtml5-command="bold" title="CTRL+B">Negrita</a> |
                            <a data-wysihtml5-command="italic" title="CTRL+I">Itálica</a> |
                            <a data-wysihtml5-command="createLink">Insertar enlace</a> |
                            <a data-wysihtml5-command="insertImage">Insertar Imagen</a> |
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">H1</a> |
                            <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">H2</a> |
                            <a data-wysihtml5-command="insertUnorderedList">iInsertar Lista Sin Enumerar</a> |
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
                        <textarea id="caractextarea" type="text" cols="40" rows="8" name="caracteristicascrib" required></textarea>
                        <br><input type="reset" value="Volver a comenzar!">
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
                            <a data-wysihtml5-command="insertUnorderedList">iInsertar Lista Sin Enumerar</a> |
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
                        <textarea id="reqtextarea" type="text" cols="40" rows="8" name="requisitoscrib" required></textarea>
                        <br><input type="reset" value="Volver a comenzar!">
                </div>
                <div class="form-upload-container">
                    <label for="titulo">Precio</label>
                    <input type="text" name="preciocrib" value="">
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
                            <a data-wysihtml5-command="insertUnorderedList">iInsertar Lista Sin Enumerar</a> |
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
                    <textarea id="unitextarea" type="text" cols="40" rows="8" name="universidadescrib" required></textarea>
            <br><input type="reset" value="Volver a comenzar!">
                </div>
                <div class="form-upload-container">
                    <label for="titulo">Teléfono</label>
                    <input type="text" name="telefonocontacto" value="">
                </div>
                <div class="form-upload-container">
                    <label for="titulo">Ciudad</label>
                    <input id="ciudadcrib" type="text" name="ciudadcrib" value="">
                </div>
                <div class="form-upload-container">
                    <label for="titulo">Estado</label>
                    <input id="estadocrib" type="text" name="estadocrib" value="">
                </div>
                <div class="form-upload-container">
                    <label for="titulo">Colonia</label>
                    <input id="coloniacrib" type="text" name="coloniacrib" value="">
                </div>
                <div class="form-upload-container">
                    <label for="titulo">Código Postal</label>
                    <input id="cpcrib" type="text" name="cpcrib" value="">
                </div>
                <div class="form-upload-container">
                    <label for="titulo">Dirección</label>
                    <input id="direccioncrib" type="text" name="direccioncrib" value="">
                </div>
                <div class="form-upload-container">
                    <label for="titulo">País</label>
                    <input id="paiscrib" type="text" name="paiscrib" value="">
                </div>
            </form>
	   </div>

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

        <script src="js/parser_rules/advanced.js"></script>
        <script src="js/wysihtml5-0.3.0.min.js"></script>
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
     <script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<script src="js/vendor/jquery.ui.widget.js"></script>
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="js/jquery.iframe-transport.js"></script>
<script src="js/jquery.fileupload.js"></script>
<script src="js/jquery.fileupload-process.js"></script>
<script src="js/jquery.fileupload-image.js"></script>
<script src="js/jquery.fileupload-audio.js"></script>
<script src="js/jquery.fileupload-video.js"></script>
<script src="js/jquery.fileupload-validate.js"></script>
<script src="js/jquery.fileupload-ui.js"></script>
<script src="js/uploadmain.js"></script>
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->


<?php
} else {
    echo 'login.php';
}
?>


    </body>
</html>