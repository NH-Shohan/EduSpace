<?php
$to = 'jitu@gmail.com';
$subject = 'Test Email';
$message = 'This is a test email.';
$headers = 'From: bita.gama@gmail.com' . "\r\n" .
    'Reply-To: From: bita.gama@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully.';
} else {
    echo 'An error occurred while sending the email.';
}
?>