<?php 

//Conexion a la base de datos
$con = mysqli_connect('localhost','root','donfrijol13','cribhunt');
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>