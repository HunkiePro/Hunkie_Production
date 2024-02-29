<?php
require_once 'dbcon.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form data
    $senderName = htmlspecialchars(trim($_POST['Name']));
    $senderEmail = htmlspecialchars(trim($_POST['Email']));
    $subject = htmlspecialchars(trim($_POST['Subject']));
    $message = htmlspecialchars(trim($_POST['Message']));

    // Insert data into the "ContactMessages" table
    $stmt = $conn->prepare("INSERT INTO ContactMessages (senderName, senderEmail, subject, message) VALUES (?, ?, ?, ?)");

    // Check if the prepare statement is successful
    if ($stmt) {
        $stmt->bind_param("ssss", $senderName, $senderEmail, $subject, $message);

        if ($stmt->execute()) {
            // Message submitted successfully
            echo "Message sent successfully!";
        } else {
            // Message submission failed
            echo "Error executing query: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Error preparing query
        echo "Error preparing query: " . $conn->error;
    }

    $conn->close();
} else {
    // Form not submitted
    echo "Form not submitted.";
}
?>
<div>
<p>Thank you reaching Hunkie Production, we shall communicate back to you shortly.<a href="home.php">Back to home page.</a>
</p>
</div>