<?php
require("class.phpmailer.php");

function enviarMail($mensaje){

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = false; // True para que verifique autentificación de la cuenta o de lo contrario False
    $mail->Username = "monitor@asustadores.wan"; 
    $mail->Password = "monitor"; // El Password de tu casilla de correos
    $mail->Host = "localhost"; 
    $mail->Port = 25;
    $mail->From = "monitor@asustadores.wan";
    $mail->FromName = "Mail Monitor";
    $mail->Subject = "ATENCION: Nuevo mail recibido";
    $mail->AddAddress("monitor@asustadores.wan","Monitor de mail");
    $mail->WordWrap = 50; 
    $mail->Body = $mensaje;
    if($mail->Send()){
        return true;
    }else{
        return false;
    }
}
?>
