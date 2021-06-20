<?php

function sendConfirmationMail($to, $subject, $message)
{
    $headers = 'From: LuxHub@info.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}
