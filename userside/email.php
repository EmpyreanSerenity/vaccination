<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>body {background-color: black;}</style>
</head>
<body >
    <div class="parentDiv"> 
        <img src="final.gif"> 
        </div> 
         
        <style>
        .parentDiv {  
        display: flex; 
        justify-content: center; 
        align-items: center;} 
        </style> 
</body>
</html>



<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "justtest456789@gmail.com";
$mail->Password   = "mywdnwbjxrdaqkmu";
//$mail->Password   = "12333";
 $mail->IsHTML(true);

$name="meghasunil04@depaul.edu.in";
$mail->AddAddress($name, "biju");
//$mail->SetFrom("rajutharayil@depaul.edu.in", "joseph");
$mail->SetFrom("justtest456789@gmail.com", "vaccine");
//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$a="Payment Completed";
$mail->Subject = "Test is Test Email";
$content = "<b>Your vaccine has been Booked ". $a .".</b><a href='localhost/roombooking/login.php'>click here</a>";
$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";

} else {
  echo "Email sent successfully";
  echo"<script> location.replace('viewbooking1.php'); </script>";
}
?>
