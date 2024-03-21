<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';


if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];
  

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'deborahferraren@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'ecvdnuyosyhnpans'; // Gmail address STMP Password
    // ecvdnuyosyhnpans
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('deborahferraren@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('deborahferraren@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message Received from RemoteAlphaGeeks';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Phone #.: $phone <br>Subject: $subject <br>Message : $message</h3>";

    $mail->send();
    $alert = '<div id="flash-message">
                <i class="bx bxs-check-circle"></i><span>Message Sent! Thank you for contacting us.</span>
              </div>';
  } catch (Exception $e){
    $alert = '<div id="flash-message-error">
                <i class="bx bxs-x-circle"></i><span> '.$e->getMessage().' </span>
              </div>';
  }
}

?>