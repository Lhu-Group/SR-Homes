<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Clean input
  $name = strip_tags(trim($_POST["name"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $phone = strip_tags(trim($_POST["phone"]));
  $message = trim($_POST["message"]);

  // Validate required fields
  if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
    http_response_code(400);
    echo "Invalid input. Please fill out the form correctly.";
    exit;
  }

  // Email content
  $to = "sumedhwairagade@lhu-group.com";
  $subject = "SR Homes Contact Form Submission";
  $email_content = "Name: $name\n";
  $email_content .= "Email: $email\n";
  $email_content .= "Phone: $phone\n\n";
  $email_content .= "Message:\n$message\n";

  $headers = "From: $name <$email>";

  // Send the email
  if (mail($to, $subject, $email_content, $headers)) {
    echo "success";
  } else {
    http_response_code(500);
    echo "Message failed to send.";
  }
}
?>
