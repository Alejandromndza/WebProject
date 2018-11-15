<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';


if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED

    $email_subject = "Your email subject line";

    function died($error) {
        // your error code can go here
        echo "Lo sentimos pero la petición no ha podido ser procesada. ";
        echo "Los errores aparecen a continuación.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor , vuelve e introduce los datos correctamente..<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'El email que has introducido parece no ser válido.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$name)) {
    $error_message .= 'El nombre introducido no es válido o contiene caracteres no permitidos.<br />';
  }

  if(strlen($message) < 2) {
    $error_message .= 'El mensaje introducido no es válido.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

  $email_message = "Se ha recibido un nuevo mensaje desde la web.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "Nombre: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Mensaje: ".clean_string($message)."\n";

// create email headers


$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "rocamorasesores@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "fabelo12345";
//Set who the message is to be sent from
$mail->setFrom('rocamorasesores@gmail.com');

//Set who the message is to be sent to
$mail->addAddress('info@rocamoraasesores.com');
//$mail->addAddress('andreswauu@gmail.com');
//Set the subject line
$mail->Subject = 'Consulta desde la web Rocamoraasesores.';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($email_message);
//Replace the plain text body with one created manually
$mail->AltBody = $email_message;
//Attach an image file

//send the message, check for errors
if (!$mail->send()) {
//echo "Tu mensaje no ha podido ser enviado , lo sentimos."
//. $mail->ErrorInfo;
} else {
echo "Mensaje enviado!";
//Section 2: IMAP
//Uncomment these to save your message in the 'Sent Mail' folder.
#if (save_mail($mail)) {
#    echo "Message saved!";
#}
}
?>

<!-- include your own success html here -->

<h3>Gracias por ponerte en contacto con nosotros, te contestaremos lo antes posible</h3>

<?php

}
?>
