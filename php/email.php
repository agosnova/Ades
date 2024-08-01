<?php

include '../mp-mailer-master/Mailer/src/PHPMailer.php';
include '../mp-mailer-master/Mailer/src/SMTP.php';
include '../mp-mailer-master/Mailer/src/Exception.php';
include '../mp-mailer-master/credenciales.php';
// Varios destinatarios
//$para .= 'wez@example.com';

// título
$motivo = 'Valida tu cuenta';

//numero random para el codigo
$numrandom=rand(1000,9999);

// mensaje
$contenido = '
<html>
<head>
  <title>Verifica tu cuenta</title>
</head>
<body>
<style>
h2{
    font-size:20pt;
    color:#033F73;
}
p{
    font-size:25pt;
    color:black;
}
</style>
  <p>tu código de verificación es:</p>
  <h2>'.$numrandom.'</h2>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
/*$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";*/

$enviado = false;

$mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();
        $mail->SMTPDebug = 0 ;
        $mail->Host = HOSTSENDMAIL;
        $mail->Port = PORT;
        $mail->SMTPAuth = SMTP_AUTH; //
        $mail->SMTPSecure = SMTP_SECURE;
        $mail->Username = REMITENTE;
        $mail->Password = PASSWORD;

        $mail->setFrom(REMITENTE, NOMBRE);
        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = utf8_decode($motivo);
        $mail->Body = utf8_decode($contenido);

        if($mail->send()){
        	$enviado = true;
        	$codigo=$numrandom;
        }

 
?>