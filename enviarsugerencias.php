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
$mensaje = $_POST['mensaje'];
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
$mail->Username = "axelcureno@cribhunt.co";

//Password to use for SMTP authentication
$mail->Password = "donfrijol13";

//Set who the message is to be sent from
$mail->From = "axelcureno@cribhunt.co";

//Set who the message is to be sent to
$mail->addAddress('axelcureno@cribhunt.co', 'Buzón CribHunt');

//Set the subject line
$mail->Subject = 'Mensaje de CribHunt';

//Replace the plain text body with one created manually
//$mail->Body = $mensaje;
$mail->MsgHTML($mensaje);

$mail->AltBody;

//send the message, check for errors
if (!$mail->send()) {
    $result = 'Hubo un error al enviar su mensaje:' . $mail->ErrorInfo;
} else {
    $result = 'El mensaje se envió correctamente.';
}
echo $result;
