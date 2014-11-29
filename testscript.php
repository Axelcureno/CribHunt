<?php

session_start();
if(!isset($_SESSION['usersicam']))
{
   header("location:index.php");
}
		include('dbcon.php'); 
		date_default_timezone_set("America/Merida");
		$date = date('Y-m-d H:i:s');
        $id = "Prueba";
        $path = "Prueba";
        $titulocrib = "Prueba";
        $categoriacrib = "Prueba";
        $imagenprincipalcrib = $path;
        $caracteristicascrib = "Prueba";
        $requisitoscrib = "Prueba";
        $preciocrib = "Prueba";
        $universidadescrib = "Prueba";
        $idusuarioqueregistracrib = 1;
        $fechaderegistrocrib = $date;
        $ciudadcrib = "Prueba";
        $estadocrib = "Prueba";
        $coloniacrib = "Prueba";
        $cpcrib = 10000;
        $direccioncrib = "Prueba";
        $paiscrib = "Prueba";

        mysqli_query($con, "INSERT INTO cribs (titulocrib, categoriacrib, imagenprincipalcrib, caracteristicascrib, requisitoscrib, preciocrib, universidadescrib, idusuarioqueregistracrib, fechaderegistrocrib, ciudadcrib, estadocrib, coloniacrib, cpcrib, direccioncrib, paiscrib) VALUES ('$titulocrib', '$categoriacrib', '$imagenprincipalcrib', '$caracteristicascrib', '$requisitoscrib', '$preciocrib', '$universidadescrib', '$idusuarioqueregistracrib', '$fechaderegistrocrib', '$ciudadcrib', '$estadocrib', '$coloniacrib', '$cpcrib', '$direccioncrib', '$paiscrib')") or die(mysqli_error($con));
        if(error_get_last()) {
            $result = error_get_last();
        } else {
            $result = "El registro fue exitoso";
        }
        echo $result;

 ?>