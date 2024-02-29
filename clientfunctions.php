<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include your database connection file
require_once 'dbcon.php';

// Function to handle the booking form submission
function handleBookingForm($conn) {
    global $conn;
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize input data
        $clientName = mysqli_real_escape_string($conn, $_POST['clientName']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $bookingDate = mysqli_real_escape_string($conn, $_POST['bookingDate']);
        $bookingTime = mysqli_real_escape_string($conn, $_POST['bookingTime']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        // Insert the data into the database
        $query = "INSERT INTO clientorders (clientName, location, phoneNumber, email, bookingDate, bookingTime, message) 
                  VALUES ('$clientName', '$location', '$phoneNumber', '$email', '$bookingDate', '$bookingTime', '$message')";

        // Execute the query
        if (mysqli_query($conn, $query)) {
            echo "Booking submitted successfully! You will get a Call from our Offices soon";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

// Call the function to handle the booking form
handleBookingForm($conn);
?>
