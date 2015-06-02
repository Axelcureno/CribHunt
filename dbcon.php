<?php 

//Conexion a la base de datos
$con = mysqli_connect('localhost','root','donfrijol13','cribhunt');
if (mysqli_connect_errno()) {
  throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
}

?>