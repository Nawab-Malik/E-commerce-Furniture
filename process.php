<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    // Validate form data
    if (empty($name) || empty($email) || empty($message)) {
        die("Please fill in all required fields.");
    }

    // Prepare email content
    $to = "am6242jan@gmail.com";  // Replace with your email address
    $subject = "New Form Submission";
    $emailBody = "Name: $name\nEmail: $email\nMessage:\n$message";

    // Send email
    $headers = "From: $email";
    $success = mail($to, $subject, $emailBody, $headers);

    // Check if the email was sent successfully
    if ($success) {
        echo "Thank you, $name! Your message has been successfully submitted.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    // Redirect to the form page if accessed directly
    header("Location: index.html");  // Change to your actual form page
    exit();
}
?>