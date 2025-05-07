<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info@eco-learn.com";
    $subject = "New Contact Message from Eco Learn";

    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if (!$firstName || !$lastName || !$email || !$message) {
        echo "Please fill in all required fields.";
        exit;
    }

    $emailMessage = "You have received a new message from Eco Learn Contact Form:\n\n";
    $emailMessage .= "Name: " . $firstName . " " . $lastName . "\n";
    $emailMessage .= "Email: " . $email . "\n";
    $emailMessage .= "Message:\n" . $message . "\n";

    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    if (mail($to, $subject, $emailMessage, $headers)) {
        echo "Thank you! Your message has been sent successfully.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>
