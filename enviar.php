<?php

            //MANASÉS JIMÉNEZ
            
if (isset($_POST['submit'])){
    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='manasesj46@gmail.com';
    $mail->Password='contraseña';

    $mail->setFrom($_POST['email'],$_POST['nombre']);
    $mail->addAddress('manasesj46@gmail.com');
    $mail->addReplyTo($_POST['email'],$_POST['nombre']);

    $mail->isHTML(true);
    $mail->Subject='Enviado por '.$_POST['nombre'];
    $mail->Body='<h3>Nombre: </h3>'.$_POST['nombre'].'<br><h3>Email: </h3>'.$_POST['email'].'<br><h3>Mensaje: </h3>'.$_POST['mensaje'];
    $mail->CharSet = "UTF-8";

    if(!$mail->send()){
    echo "Error: {$mail->ErrorInfo}";
    }else{
        header('Location: index.html');
    }

}
?>