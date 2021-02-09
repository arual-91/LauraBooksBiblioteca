<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    if (isset($_POST['botonEnviar'])) {
        //Configuración del servido
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->SMTPSecure = 'tls';
        $mail->SMTPOptions = array(                                 //añadido porqué daba error al conectarse al host
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'lbookscompany@gmail.com';                     // SMTP username
        $mail->Password   = 'Secret-11';                               // SMTP password
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
        
        //DESTINATARIO
            $mail->setFrom('lbookscompany@gmail.com', $_POST['nombreSugerencia']);
        $mail->addAddress('lbookscompany@gmail.com');     // Add a recipient
    
        $mail->Subject = 'Sugerencia';
        $mail->Body    = $_POST['txtSugerencia'];
        $mail->AltBody = $_POST['txtSugerencia'];
        
        $mail->send();
    echo '<script language="javascript">alert("Mensaje enviado.");</script>';
    }
} catch (Exception $e) {
    echo '<script language="javascript">alert("No se pudo enviar el mensaje. Error: '.$mail->ErrorInfo.'")</script>';
}