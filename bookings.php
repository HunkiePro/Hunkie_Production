<?php
require_once 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set and not empty
    if (isset($_POST['clientName']) && isset($_POST['location']) && isset($_POST['phoneNumber']) && isset($_POST['email']) && isset($_POST['bookingDate']) && isset($_POST['bookingTime']) && isset($_POST['message'])) {

        // Sanitize and validate form data
        $clientName = htmlspecialchars(trim($_POST['clientName']));
        $location = htmlspecialchars(trim($_POST['location']));
        $phoneNumber = htmlspecialchars(trim($_POST['phoneNumber']));
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $bookingDate = htmlspecialchars(trim($_POST['bookingDate']));
        $bookingTime = htmlspecialchars(trim($_POST['bookingTime']));
        $message = htmlspecialchars(trim($_POST['message']));

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO clientorders (clientName, location, phoneNumber, email, bookingDate, bookingTime, message) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Check if the prepare statement is successful
        if ($stmt) {
            $stmt->bind_param("sssssss", $clientName, $location, $phoneNumber, $email, $bookingDate, $bookingTime, $message);

            if ($stmt->execute()) {
                $message = "Booking submitted successfully!";
            } else {
                $error = "Error executing query: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $error = "Error preparing query: " . $conn->error;
        }

    } else {
        $error = "All form fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style type="text/css">
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #030237; /* Blue background color */
        color: #fff;
      }

      .container {
          max-width: 1200px;
          margin: 0 auto;
          padding: 20px;
      }

      header {
          background-color: #030237; /* Header background color */
          /*padding: 15px 0;*/
          text-align: center;
      }

      header h1 {
          margin: 0;
      }

      .logo img {
          max-width: 100px;
      }


      footer {
          background-color: #34495e; /* Footer background color */
          padding: 10px 0;
          text-align: center;
      }

      #bookingModal {
          display: none;
          position: fixed;
          z-index: 1;
          left: 0;
          top: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          background-color: rgba(0, 0, 0, 0.5);
      }

      .modal-content {
          background-color: #fefefe;
          margin: 10% auto;
          padding: 20px;
          border: 1px solid #888;
          width: 80%;
      }
      #bookingModal {
          display: none;
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background-color: #030237;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 0 20px rgba(218, 165, 32, 0.7);
          max-width: 700px;
          width: 100%;
          text-align: center;
      }

      #bookingModal label {
          display: block;
          margin-bottom: 10px;
          text-align: left;
          color: #030237; /* Set label text color */
      }

      #bookingModal input,
      #bookingModal textarea {
          width: 100%;
          padding: 10px;
          margin-bottom: 15px;
          box-sizing: border-box;
      }

      #bookingModal button {
          background-color: #a27e2c;
          color: #fff;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
      }

      #bookingModal button:hover {
          background-color: #ddca79;
          color: #030237;
      }

      #bookingModal button:last-child {
          background-color: #a27e2c;
          margin-left: 10px;
      }

      #bookingModal button:last-child:hover {
          background-color: #ddca79;
          color: #030237;
      }

      .close {
          color: #aaa;
          float: right;
          font-size: 28px;
          font-weight: bold;
      }

      /* Responsive styles for modal */
      @media screen and (max-width: 600px) {
          .modal-content {
              width: 90%;
          }
      }

      /* Default styles for table */

      /* Centering container for the table */
.table-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 30vh; 
    margin: auto;
}

#bookingTable {
    width: 50%;
    border-collapse: collapse;
    display: flex;
    flex-direction: column; /* Adjust to display flex items in a column */
}

#bookingTable th, #bookingTable td {
    border: 1px solid #fff;
    padding: 8px;
    text-align: left;
}

#bookingTable th {
    background-color: #f2f2f2;
    color: #000;
}

/* Responsive styles for table */
@media screen and (max-width: 600px) {
    #bookingTable {
        overflow-x: auto;
    }

    #bookingTable th, #bookingTable td {
        white-space: nowrap;
    }
}

      .bookingbutton{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
      }
      .bookingbtn{
          background-color: #a27e2c;
          margin-left: 10px;
          color: #fff;
      }

      .bookingbtn:hover{
          background-color: #ddca79;
          color: #030237;
      }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <div class="container">
        <div class="logo">
            <img src="images/indexlg.png" alt="Logo">
        </div>
        <h1>The Hunkie Production Booking Portal</h1>
    </div>
</header>

<!-- Main Section -->
  <div id="bookingModal" style="display: none;">
    <div id="bookingForm" class="modal-content">
        <span class="close" onclick="closeBookingModal()">&times;</span>
        <h2 style="color: #030237">Book Photographer</h2>
        
        <!-- Booking form fields -->
        <form id="clientBookingForm" action="" method="post">
            <label for="clientName">Client Name:</label>
            <input type="text" id="clientName" name="clientName" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="phoneNumber">Phone Number:</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="bookingDate">Date:</label>
            <input type="date" id="bookingDate" name="bookingDate" required>

            <label for="bookingTime">Time:</label>
            <input type="time" id="bookingTime" name="bookingTime" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4"></textarea>

            <label style="text-align: center;">
                <input type="checkbox" required>
                I agree to the <a href="privacy-policy.php" target="_blank">privacy policy</a> &amp; <a href="terms-of-use.php" target="_blank">terms of use</a>
            </label>

            <button type="submit" class="bookingbtn">Submit Booking</button>
        </form>

    </div>
</div>

<!-- Button to open the booking modal -->
<section class="bookingbutton">
  <button class="bookingbtn" id="backHome">Home</button>
    <button class="bookingbtn" onclick="openBookingModal()">Book Photographer</button>
</section>

<!-- Display success or error message -->
<?php if (isset($message)) : ?>
    <div style="color: Yellow;"><?php echo $message; ?></div>
<?php elseif (isset($error)) : ?>
    <div style="color: red;"><?php echo $error; ?></div>
<?php endif; ?>

<div class="table-container">
    <table id="bookingTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Name</th>
                <th>Date Booked</th>
                <th>Time Booked</th>
                <th>Location Booked</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch admin's booking information from the database
            $query = "SELECT * FROM bookings";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                $counter = 1; // Initialize the counter
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $counter . '</td>'; // Display the counter as the ID
                    echo '<td>' . "Hunkie Production Co." . '</td>'; // Update with the actual column name in your database
                    echo '<td>' . (isset($row['bookedDate']) ? $row['bookedDate'] : '') . '</td>';
                    echo '<td>' . (isset($row['bookedTime']) ? $row['bookedTime'] : '') . '</td>';
                    echo '<td>' . (isset($row['location']) ? $row['location'] : '') . '</td>';
                    echo '</tr>';
                    $counter++; // Increment the counter for the next row
                }
            } else {
                echo '<tr><td colspan="5">No bookings found.</td></tr>';
            }

            // Close the connection after all queries are executed
            $conn->close();
            ?>
        </tbody>
    </table>
</div>
<!-- Footer -->
<footer>
    <p>&copy; 2023 Hunkie Production</p>
</footer>

<script>
  document.getElementById('backHome').addEventListener('click', function() {
      window.location.href = 'home.php';
    });

   // Function to open the booking modal
  function openBookingModal() {
      document.getElementById('bookingModal').style.display = 'block';
  }

  // Function to close the booking modal
  function closeBookingModal() {
      document.getElementById('bookingModal').style.display = 'none';
  }

  document.getElementById('backHome').addEventListener('click', function() {
      window.location.href = 'home.php';
    });

</script>

</body>
</html>