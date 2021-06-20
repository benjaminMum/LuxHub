<?php

function sendConfirmationMail($to, $subject, $message)
{
    $headers = 'From: LuxHub@info.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}

function sendMail($message){

    $to = "ben192003@gmail.com";
    $subject = "Un utilisateur vous a contacté.";

    $headers = 'From: LuxHub@info.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

}