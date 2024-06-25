<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: contact.html?status=error');
        exit();
    }

    // Email details
    $to = 'sales@hit.ac.zw';
    $subject = 'New Mushrad Message';
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        header('Location: contact.html?status=success');
    } else {
        header('Location: contact.html?status=error');
    }
} else {
    header('Location: contact.html');
}

if (mail('sales@hit.ac.zw', 'Test Mail', 'This is a test email', 'From: your-email@example.com')) {
    echo 'Mail sent successfully!';
} else {
    echo 'Mail sending failed.';
}
?>
