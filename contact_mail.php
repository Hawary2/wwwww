<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
    $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);

    // Log the sanitized input data
    error_log("Received POST data: userName=$userName, userEmail=$userEmail, subject=$subject, content=$content");

    if ($userName && $userEmail && $subject && $content) {
        $toEmail = "xanoros2@gmail.com";  // Your email address
        $mailHeaders = "From: " . $userName . " <" . $userEmail . ">\r\n";

        // Log the mail headers and body
        error_log("Mail headers: $mailHeaders");
        error_log("Mail subject: $subject");
        error_log("Mail content: $content");

        if (mail($toEmail, $subject, $content, $mailHeaders)) {
            echo "<p class='success'>Contact Mail Sent.</p>";
        } else {
            echo "<p class='Error'>Problem in Sending Mail.</p>";
            error_log("Error: Mail function failed");
        }
    } else {
        echo "<p class='Error'>Invalid input data.</p>";
        error_log("Error: Invalid input data - userName=$userName, userEmail=$userEmail, subject=$subject, content=$content");
    }
} else {
    echo "<p class='Error'>Invalid request method.</p>";
    error_log("Error: Invalid request method - " . $_SERVER["REQUEST_METHOD"]);
}
?>
