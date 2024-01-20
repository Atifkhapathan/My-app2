<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
function send_otp($to,$subject,$content){
$mail = new PHPMailer(true);
try {
    //Server settings
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'omansayyad29@gmail.com';                     //SMTP username
$mail->Password   = 'lwbniyhcvsamidqc';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom("$to", 'OTP For Login');
$mail->addAddress($to, 'Verify Email');     //Add a recipient



//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = $subject;
$mail->Body    = '<font color=black size=6> Your OTP is:'.'<font color=green size=6>'.$content.'<b><br>For Email Verification of PMPML';
$mail->send();
echo 'OTP has been sent Successfully';
} catch (Exception $e) {
echo "OTP could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>