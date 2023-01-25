<?php
$to = "tatsamshrestha93@gmail.com";
$subject = "You are hack";
$message = "Hehe";
$from = "anandaaryal54@gmail.com";
$headers = "From: $from";

mail($to, $subject, $message, $headers);

echo "Mail sent successfully";
?>