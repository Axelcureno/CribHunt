<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';


$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';
//

//UTF-8 Encoding
$mail->CharSet = 'UTF-8';

//Set the hostname of the mail server
$mail->Host = 'smtp.zoho.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 465;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';

//Whether to use SMTP authentication
//$mail->SMTPAuth = false;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "axelcureno@cribhunt.co";

//Password to use for SMTP authentication
$mail->Password = "donfrijol13";

//Set who the message is to be sent from
$mail->setFrom($email, $nombre);

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress('axelcureno@cribhunt.co', 'Buzón CribHunt');

//Set the subject line
$mail->Subject = 'Mensaje de CribHunt';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

//Replace the plain text body with one created manually
$mail->Body = $mensaje;

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    $result = 'Hubo un error al enviar su mensaje:' . $mail->ErrorInfo;
} else {
    $result = 'El mensaje se envió correctamente.';
}
echo $result;
