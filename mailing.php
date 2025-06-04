<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "sumedhwairagade@lhu-group.com"; // CHANGE THIS TO YOUR EMAIL
    $subject = "New Contact Form Submission";

    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        http_response_code(500);
        echo "Failed to send";
    }
}
?>
