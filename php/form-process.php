<?php


//if(isset($_POST['ContactButton'])) {
    
    $errorMSG = "";
    /*$url = "https://www.google.com/recaptcha/api/siteverify";
    $privateKey = "6LfoNpwhAAAAADCCQ889zh9qfcMtYvvKuIEDnk8A";
    $response = file_get_contents($url."?secret=".$privateKey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
    $data = json_decode($response);
    if (isset($data->success) AND $data->success==true) {
        $error = "";
        $successMsg = "";*/
      
// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Es requerido un nombre ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Es requerido campo de correo electronico";
} else {
    $email = $_POST["email"];
}

// MSG Guest
/*if (empty($_POST["guest"])) {
    $errorMSG .= "Subject is required ";
} else {
    $guest = $_POST["guest"];
}*/


// MSG Event
/*if (empty($_POST["event"])) {
    $errorMSG .= "Subject is required ";
} else {
    $event = $_POST["event"];
}*/


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Es requerido campo de mensaje";
} else {
    $message = $_POST["message"];
}
// captcha
/*if (empty($_POST["captcha"])) {
    $errorMSG .= "Es requerido campo de captcha";
} else {
    $email = $_POST["captcha"];
}*/
/*}}*/



$EmailTo = "brayan.sototellez@gmail.com";
$Subject = "Mensajen nuevo recibido de la pagina de la Habichuela";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
/*$Body .= "guest: ";
$Body .= $guest;
$Body .= "\n";
$Body .= "event: ";
$Body .= $event;*/
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
/*$Body .= "captcha: ";
$Body .= $captcha;*/

// send email"
$success = mail($EmailTo, $Subject, $Body,  "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Algo salio mal intentalo de nuevo";
    } else {
        echo $errorMSG;
    }
}

//-------------------------------------------------------------------------------------------------------------------*
   /* $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $secretKey = "6LeH2o4hAAAAAKxdWJ0oKOIlzu7SFHVP78dKfcg-";
    $errors = array();

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$ip}");

    $atributos = json_decode($response, TRUE);



    $secret = "6LeH2o4hAAAAAKxdWJ0oKOIlzu7SFHVP78dKfcg-";
?>
<?php

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $ip = $_SERVER["REMOTE_ADDR"];
    $captcha = $_POST['g-recaptcha-response'];
    $secretKey = '6LeH2o4hAAAAAKxdWJ0oKOIlzu7SFHVP78dKfcg-';

    $errors = array();

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$ip}");

    $atributos = json_decode($response, TRUE);

    if (!$atributos['success']) {
        $errors[] = 'Verifica el captcha';
    }

    if (empty($nombre)) {
        $errors[] = 'El campo nombre es obligatorio';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'La dirección de correo electrónico no es válida';
    }

    if (empty($asunto)) {
        $errors[] = 'El campo asunto es obligatorio';
    }

    if (empty($mensaje)) {
        $errors[] = 'El campo mensaje es obligatorio';
    }

    if (count($errors) == 0) {

        $msj = "De: $nombre <a href='mailto:$email'>$email</a><br>";
        $msj .= "Asunto: $asunto<br><br>";
        $msj .= "Cuerpo del mensaje:";
        $msj .= '<p>' . $mensaje . '</p>';
        $msj .= "--<p>Este mensaje se ha enviado desde un formulario de contacto de Código de programación.</p>";

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = 'mail.dominio.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'correo@dominio.com';
            $mail->Password = 'TuPassword';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('bsoto@kangy.com.mx', 'Emisor');
            $mail->addAddress('bsoto@kangy.com.mx', 'Receptor');
            //$mail->addReplyTo('otro@dominio.com');

            $mail->isHTML(true);
            $mail->Subject = 'Formulario de contacto';
            $mail->Body = utf8_decode($msj);

            $mail->send();

            $respuesta = 'Correo enviado';
        } catch (Exception $e) {
            $respuesta = 'Mensaje ' . $mail->ErrorInfo;
        }
    }
}
*/
?>