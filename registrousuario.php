<?php
if (isset($_POST['nombres'])) {
include('functions.php');
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordconfirmacion = $_POST['passwordconfirmacion'];
date_default_timezone_set("America/Merida");
$date = date('Y-m-d H:i:s');

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
			mysqli_query($con, "INSERT INTO usuarios (nombres, apellidos, email, password, fecharegistro) VALUES ('$cleannombres', '$cleanapellidos', '$email', '$hashedpassword', '$date')");
			include('correos/bienvenida/correo-bienvenida.php');
			require 'PHPMailerAutoload.php';
			//Create a new PHPMailer instance
			$mail = new PHPMailer;
			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			//UTF-8 Encoding
			$mail->CharSet = 'UTF-8';
			//Set the hostname of the mail server
			$mail->Host = 'smtp.zoho.com';
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 465;
			//Set the encryption system to use - ssl (deprecated) or tls
			$mail->SMTPSecure = 'ssl';
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "contacto@cribhunt.co";
			//Password to use for SMTP authentication
			$mail->Password = "donfrijol13";
			//Set who the message is to be sent from
			$mail->From = "contacto@cribhunt.co";
			$mail->FromName = "CribHunt";
			//Set who the message is to be sent to
			$mail->addAddress($email, $nombres);
			//Set the subject line
			$mail->Subject = 'Bienvenid@ a CribHunt';
			//Replace the plain text body with one created manually
			//$mail->Body = $mensaje;
			$mail->MsgHTML($mensaje);
			$mail->IsHTML(true);

			//send the message, check for errors
			if (!$mail->send()) {
			    $result = 'Hubo un error al dar de alta su registro:' . $mail->ErrorInfo;
			} else {
			    $result = 'El registro fue exitoso. Ya puedes iniciar tu sesión';
			}
		}
	}
	echo $result;
} else {
	header("location:index.php");
}
?>