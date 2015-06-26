<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set("America/Merida");
require 'PHPMailerAutoload.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];

if (isset($_POST['idregistro'])) {
	include("functions.php");
	$idusuario = $_POST['idregistro'];
	$sql = "SELECT * FROM usuarios WHERE id = '$idusuario'";
	$rec = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($rec))
	{
	    $emailusuario = $row['email'];
	}
} else {
	$emailusuario = 'axelcureno@gmail.com';
}


$mensaje = 'Id de Crib: ' . $_POST['id'] . '<br>Titulo de Crib: ' . $_POST['titulo'] . '<br>Mensaje de: ' . $_POST['nombre'] . '<br>Teléfono: ' . $_POST['telefono'] . '<br>Email: ' . $_POST['email'] . '<br>Mensaje: ' . $_POST['mensaje'];
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

//Set the name of the message is to be sent from
$mail->FromName = "CribHunt";

//Set who the message is to be sent to
$mail->addAddress($emailusuario, 'Buzón CribHunt');

//Set the subject line
$mail->Subject = 'Alguien solicitó Información de un Crib';

//Replace the plain text body with one created manually
//$mail->Body = $mensaje;
$mail->MsgHTML($mensaje);

$mail->AltBody;

//send the message, check for errors
if (!$mail->send()) {
    $result = 'Hubo un error al enviar su mensaje:' . $mail->ErrorInfo;
} else {
    $result = '¡Mensaje enviado! El dueño se pondra en contacto muy pronto. Cualquier duda escríbenos a <a href="mailto:contacto@cribhunt.co">contacto@cribhunt.co</div>';
}
echo $result;
