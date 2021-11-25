<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\wamp64\phpmailer\Exception.php';
require 'C:\wamp64\phpmailer\PHPMailer.php';
require 'C:\wamp64\phpmailer\SMTP.php';

$errors = '';
$myemail = 'vitrantclementpro@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['surname']) || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$surname = $_POST['surname']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))

{
    
$mail = new PHPMailer;

$mail->SMTPDebug = 1;                             // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.laposte.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'nordwebmaskerscontact';                 // SMTP username
$mail->Password = 'NWMpw2021*';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($email_address, $name);
$mail->addAddress('nordwebmaskerscontact@laposte.net', 'NordWebmakers');     //Add a recipient
//$mail->addAddress('nordwebmaskerscontact@laposte.net');               //Name is optional
//$mail->addReplyTo('nordwebmaskerscontact@laposte.net', 'Information');
//$mail->addCC('nordwebmaskerscontact@laposte.net');
//$mail->addBCC('nordwebmaskerscontact@laposte.net');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Mail from the contact form from '.$name." ".$surname;
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

//redirect to the 'thank you' page

header('Location: ../pages/contact-redirect.html');

}
?>