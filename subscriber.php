<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subscriberEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($subscriberEmail, FILTER_VALIDATE_EMAIL)) {
        $to = "nzenwatadavid7@gmail.com"; // Replace with your email
        $subject = "New Subscriber";
        $message = "You have a new subscriber: " . $subscriberEmail;
        $headers = "From: no-reply@yourwebsite.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "Thank you for subscribing!";
        } else {
            echo "Error sending email. Please try again.";
        }
    } else {
        echo "Invalid email address.";
    }
}
?>
