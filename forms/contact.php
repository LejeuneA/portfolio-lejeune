<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $subject = htmlspecialchars($_POST['subject']);
    $userEmail = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Check if all fields are filled
    if (!empty($firstName) && !empty($lastName) && !empty($subject) && !empty($userEmail) && !empty($message)) {
        // Set sender email (you should add an email field to your form)
        $senderEmail = $userEmail;
        
        // Set recipient email
        $recipient = "contact@acelyalejeune.be";
        
        // Construct mail headers
        $mailHeaders = "From: " . $senderEmail . "\r\n";
        
        // Send email
        if (mail($recipient, $subject, $message, $mailHeaders)) {
            echo "Message sent!";
        } else {
            echo "Error sending message.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>
