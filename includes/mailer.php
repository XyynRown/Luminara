<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

function sendEmail($to, $subject, $body){
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = false;

    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true; 
        $mail->Username = 'skyzzo2105@gmail.com';
        $mail->Password = 'arkl yhzp zhag pker';;
        $mail->SMTPSecure = PHPMAILER::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('skyzzo2105@gmail.com', 'Luminara');
        $mail->addAddress($to);
        
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch(Exception $e){
        return "Mailer ERROR: {$mail->ErrorInfo}";
    }
}