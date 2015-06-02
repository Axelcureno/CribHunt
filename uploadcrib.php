<?php
include("functions.php");
include("dbcon.php");
startpage();

if(isset($_POST['titulocrib'])) {
        $result = [];
        date_default_timezone_set("America/Merida");
        $date = date('Y-m-d H:i:s');
        $id = $_SESSION['usersicam'];
        $titulocrib = $_POST['titulocrib'];
        $categoriacrib = $_POST['categoriacrib'];
        $imagenprincipalcrib = $path;
        $caracteristicascrib = $_POST['caracteristicascrib'];
        $requisitoscrib = $_POST['requisitoscrib'];
        $preciocrib = $_POST['preciocrib'];
        $universidadescrib = $_POST['universidadescrib'];
        $idusuarioqueregistracrib = $id;
        $fechaderegistrocrib = $date;
        $ciudadcrib = $_POST['ciudadcrib'];
        $estadocrib = $_POST['estadocrib'];
        $coloniacrib = $_POST['coloniacrib'];
        $cpcrib = $_POST['cpcrib'];
        $direccioncrib = $_POST['direccioncrib'];
        $paiscrib = $_POST['paiscrib'];
        $target = "uploads/".$id."/".$categoriacrib."/".$titulocrib;

            if (!file_exists($target)) {
                mkdir($target, 0777, true);
            }

        //En teoria, aqui debe ir una funcion que logre subir las imagenes al servidor.

        mysqli_query($con, "INSERT INTO cribs (titulocrib, urlcrib, categoriacrib, imagenescrib, caracteristicascrib, requisitoscrib, preciocrib, universidadescrib, idusuarioqueregistracrib, fechaderegistrocrib, ciudadcrib, estadocrib, coloniacrib, cpcrib, direccioncrib, paiscrib) VALUES ('$titulocrib', '$urlcrib', '$categoriacrib', '$imagenescrib', '$caracteristicascrib', '$requisitoscrib', '$preciocrib', '$universidadescrib', '$idusuarioqueregistracrib', '$fechaderegistrocrib', '$ciudadcrib', '$estadocrib', '$coloniacrib', '$cpcrib', '$direccioncrib', '$paiscrib')") or die(mysqli_error($con));
        if(error_get_last()) {
            $result = error_get_last();
        } else {
            $result = "El registro fue exitoso";
        }
}
        echo var_dump($result);
 ?>