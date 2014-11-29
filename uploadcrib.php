<?php
session_start();
if(!isset($_SESSION['usersicam']))
{
   header("location:index.php");
}
//if Submit was clicked
$result = [];
if(isset($_POST['titulocrib'])) {
        include('dbcon.php'); 
        date_default_timezone_set("America/Merida");
        $date = date('Y-m-d H:i:s');
        $id = $_SESSION['usersicam'];
        $path = "Prueba";
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

        mysqli_query($con, "INSERT INTO cribs (titulocrib, categoriacrib, imagenprincipalcrib, caracteristicascrib, requisitoscrib, preciocrib, universidadescrib, idusuarioqueregistracrib, fechaderegistrocrib, ciudadcrib, estadocrib, coloniacrib, cpcrib, direccioncrib, paiscrib) VALUES ('$titulocrib', '$categoriacrib', '$imagenprincipalcrib', '$caracteristicascrib', '$requisitoscrib', '$preciocrib', '$universidadescrib', '$idusuarioqueregistracrib', '$fechaderegistrocrib', '$ciudadcrib', '$estadocrib', '$coloniacrib', '$cpcrib', '$direccioncrib', '$paiscrib')") or die(mysqli_error($con));
        if(error_get_last()) {
            $result = error_get_last();
        } else {
            $result = "El registro fue exitoso";
        }
}
        echo $result;
 ?>