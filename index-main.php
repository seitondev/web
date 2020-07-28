<?php

$errors = '';
$sending = '';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(!empty($name) or $name!==''){
        $name = trim($name);
        $name = filter_var($name, FILTER_SANITIZE_STRING);
    }else {
        $errors .= 'Por favor ingrese un numbre <br />';
    }

    if(!empty($email) or $email!==''){
        $email = trim($email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors .= 'Por favor ingrese un correo valido<br />';
        }
    }else {
        $errors .= 'Por favor ingrese un correo <br />';
    }
    if(!empty($message) or $message!==''){
        $message = htmlspecialchars($message);
        $message = trim($message);
        $message = stripslashes($message);
        $message = filter_var($name, FILTER_SANITIZE_STRING);
    }else {
        $errors .= 'Por favor ingrese un mensaje <br />';
    }

    if(!$errors) {
        $send_a = 'contacto@seitondev.com';
        $subjet = "correo enviado de $email";
        $body =  "From: $name \n";
        $body .=  "Email: $email \n";
        $body .=  "Message: $message";

        mail($send_a,$subjet,$body);

        $sending = true;
    }

}

require 'index.php';

?>