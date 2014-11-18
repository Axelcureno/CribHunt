<?php
if (isset($_POST['nombres'])) {
include('dbcon.php');
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordconfirmacion = $_POST['passwordconfirmacion'];
// 	Codigos de error
// 	200 = Registro exitoso
// 	250 = Contraseñas no coinciden
//	120 = Correo Electronico no es valido
//	140 = Caracteres invalidos en los nombres
//	145 = Caracteres invalidos en los apellidos
//
	$result = '';
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$result = 'Introduce un correo electrónico valido';
	} else if ($password != $passwordconfirmacion) {
		$result = 'Las contraseñas no coinciden';
	} else {
		$usuarioexistente = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$email'");
		if (mysqli_num_rows($usuarioexistente) > 0) {
			$result = 'Ya existe un usuario con este correo electrónico';
		} else {
			$hashedpassword = crypt($email, $password);
			$cleannombres = preg_replace("/[^\p{L}\p{N}]/u", ' ', $nombres);
			$cleanapellidos = preg_replace("/[^\p{L}\p{N}]/u", ' ', $apellidos);
			mysqli_query($con, "INSERT INTO usuarios (nombres, apellidos, email, password) VALUES ('$cleannombres', '$cleanapellidos', '$email', '$hashedpassword')");
			$result = 'El registro fue exitoso';
		}
	}
	echo $result;
} else {
	header("location:index.php");
}
?>