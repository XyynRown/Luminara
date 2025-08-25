<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to, $subject, $body, $mailconfig){

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = false;

    try{
        $mail->isSMTP();
        $mail->Host = $mailconfig['host'];
        $mail->Port = $mailconfig['port'];
        $mail->SMTPAuth = true; 
        $mail->Username = $mailconfig['username'];
        $mail->Password = $mailconfig['password'];
        $mail->SMTPSecure = $mailconfig['encryption']; 

        $mail->setFrom( $mailconfig['from'], $mailconfig['from_name']);
        $mail->addAddress($to);
        
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch(Exception $e){
        // return "Mailer ERROR: {$mail->ErrorInfo}";
        echo json_encode([
            "success" => false,
            "message" => "Mailer ERROR: {$mail->ErrorInfo}"
        ]);
        exit;
    }
}