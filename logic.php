<?php
require_once 'dbcon.php';

// Handle get quote form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clientName'])) {
            require_once 'dbcon.php'; // Include your database connection file

            // Sanitize and validate form data
            $clientName = htmlspecialchars(trim($_POST['clientName']));
            $location = htmlspecialchars(trim($_POST['location']));
            $phoneNumber = htmlspecialchars(trim($_POST['phone']));
            $email = htmlspecialchars(trim($_POST['email']));
            $services = implode(", ", $_POST['services']);
            $agreedToTerms = isset($_POST['agree']) ? 1 : 0;

            // Insert data into the "QuoteRequests" table
            $stmt = $conn->prepare("INSERT INTO QuoteRequests (clientName, location, phoneNumber, email, services, agreedToTerms) VALUES (?, ?, ?, ?, ?, ?)");

            // Check if the prepare statement is successful
            if ($stmt) {
                $stmt->bind_param("sssssi", $clientName, $location, $phoneNumber, $email, $services, $agreedToTerms);

                if ($stmt->execute()) {
                    // Quote request successful
                    $message = "Quote request submitted successfully!";
                } else {
                    // Quote request failed
                    $error = "Error executing query: " . $conn->error;
                }

                $stmt->close();
            } else {
                // Error preparing query
                $error = "Error executing query: " . $conn->error;
            }

            $conn->close();
        }
?>
<div>
<p>Thank you for asking for a quotation, we shall communicate back to you shortly.<a href="home.php">Back to home page.</a> or <a href="services.php">visit our services page.</a>
</p>
</div>