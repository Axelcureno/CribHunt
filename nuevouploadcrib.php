<?php
include("functions.php");
include("dbcon.php");
startpage();

if(isset($_POST['titulo'])) {
    $latitudcrib = $_POST['latitudcrib'];
    $longitudcrib = $_POST['longitudcrib'];
    $result = [];
    date_default_timezone_set("America/Merida");
    $date = date('Y-m-d H:i:s');
    $id = $_SESSION['usersicam'];
    $titulocrib = $_POST['titulo'];
    $urlcrib = slugify($titulocrib);
    $categoriacrib = $_POST['categoria'];
    $imagenprincipalcrib = $_POST['imagenprincipalinput'];
    $imagenescrib = $_POST['imageninput'];
    $caracteristicascrib = $_POST['caracteristicas'];
    $requisitoscrib = $_POST['requisitos'];
    $preciocrib = $_POST['precio'];
    $universidadescrib = $_POST['universidades'];
    $idusuarioqueregistracrib = $id;
    $telefonocontacto = $_POST['telefono'];
    $fechaderegistrocrib = $date;
    $ciudadcrib = $_POST['ciudad'];
    $estadocrib = $_POST['estado'];
    $coloniacrib = $_POST['colonia'];
    $cpcrib = $_POST['cp'];
    $direccioncrib = $_POST['direccion'];
    $paiscrib = $_POST['pais'];
    $target = "uploads/".$id."/".$categoriacrib."/".$titulocrib;

    mysqli_query($con, "INSERT INTO cribs (titulocrib, urlcrib, categoriacrib, imagenescrib, imagenprincipalcrib, latitudcrib, longitudcrib, caracteristicascrib, requisitoscrib, preciocrib, universidadescrib, idusuarioqueregistracrib, telefonocontacto, fechaderegistrocrib, ciudadcrib, estadocrib, coloniacrib, cpcrib, direccioncrib, paiscrib)
                                   VALUES ('$titulocrib', '$urlcrib', '$categoriacrib', '$imagenescrib', '$imagenprincipalcrib', '$latitudcrib', '$longitudcrib', '$caracteristicascrib', '$requisitoscrib', '$preciocrib', '$universidadescrib', '$idusuarioqueregistracrib', '$telefonocontacto', '$fechaderegistrocrib', '$ciudadcrib', '$estadocrib', '$coloniacrib', '$cpcrib', '$direccioncrib', '$paiscrib')") or die(mysqli_error($con));
    if(error_get_last()) {
        $result = error_get_last();
    } else {
        $result = "El registro fue exitoso";
    }
}
        echo $result;
 ?>