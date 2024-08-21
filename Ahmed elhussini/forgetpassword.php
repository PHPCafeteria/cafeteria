<?php
require_once("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid email address.';
        exit();
    }

    // Simulate sending email (replace with actual email sending code)
    $subject = "Password Reset Request";
    $message = "Click this link to reset your password: http://example.com/reset_password";
    $headers = "From: no-reply@example.com";

    if (mail($email, $subject, $message, $headers)) {
        echo 'Password reset link has been sent to your email address.';
    } else {
        echo 'Failed to send email.';
    }
} else {
    echo 'Invalid request.';
}
?>
