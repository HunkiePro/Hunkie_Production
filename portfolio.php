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
    <title>HUNKIE|PRODUCTION</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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


      .services-container {
          overflow: hidden;
          margin-top: 30px;
          margin-left: 10px;
          margin-right: 10px;
      }

      .services-scroll {
          display: flex;
          /*animation: scroll 20s linear infinite;*/
          overflow-x: scroll;
      }

      .service {
          flex: 0 0 auto;
          margin-right: 20px;
          margin-bottom: 10px;
          padding: 20px;
          background-color: #fff;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
          border-radius: 8px;
          text-align: center;
      }

      .service img {
          width: 250px;
          max-width: 100%;
          height: 100px;
          border-radius: 4px;
      }

      .service h2 {
          color: #fff;
          background: #a27e2c;
          border-radius: 10px;
          margin-top: 10px;
          font-size: 18px;
      }

      .service ul {
          list-style: none;
          padding: 0;
      }

      .service ul li {
          margin-bottom: 5px;
          color: #555;
      }

      @keyframes scroll {
          0% {
              transform: translateX(0);
          }
          100% {
              transform: translateX(-100%);
          }
      }

      /* Modal styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 673px;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    color:  #000;
    padding: 20px;
    border-radius: 8px;
    max-width: 400px;
    width: 100%;
    text-align: center;
    position: relative;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
}

/* Form styles */
#bookServiceForm {
    display: flex;
    flex-direction: column;
    height: 650px;
}

label {
    margin-top: 5px;
    color: #000;
    font-size: 12px;
}

input, select {
    margin-bottom: 5px;
    padding: 4px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.submit-btn {
    background-color: #a27e2c;
    color: #fff;
    padding-bottom: 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.submit-btn:hover {
    background-color: #ddca79;
}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  margin: 20px;
}

/* Style the buttons that are used to open the tab content */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
  margin: 20px;
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
            <h1>The Hunkie Production Proof of Work</h1>
        </div>
    </header>

    <!-- Display success or error message -->
    <?php if (isset($message)) : ?>
        <div style="color: Yellow;"><?php echo $message; ?></div>
    <?php elseif (isset($error)) : ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif; ?>

<!-- Main Section -->
    <section class="bookingbutton">
      <button class="bookingbtn" id="backHome">Home</button>
      <button class="bookingbtn" onclick="openModal()">Book Photographer</button>
    </section>

    <div class="modal" id="bookServiceModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <form id="bookServiceForm" action="" method="post">
                <img src="images/LOGO HP.png" alt="Hunkie Production" style="margin: auto; width: auto; height: 30px;">
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
                
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>

    <!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Portrait')">Portrait</button>
  <button class="tablinks" onclick="openCity(event, 'Event')">Event</button>
  <button class="tablinks" onclick="openCity(event, 'commercial')">Commercial</button>
  <button class="tablinks" onclick="openCity(event, 'realestate')">Real Estate</button>
  <button class="tablinks" onclick="openCity(event, 'travel')">Travel</button>
  <button class="tablinks" onclick="openCity(event, 'fashion')">Fashion</button>
  <button class="tablinks" onclick="openCity(event, 'fineart')">Fine Art</button>
  <button class="tablinks" onclick="openCity(event, 'documentary')">Documentary</button>
  <button class="tablinks" onclick="openCity(event, 'sports')">Sports</button>
  <button class="tablinks" onclick="openCity(event, 'aerial')">Aerial</button>
  <button class="tablinks" onclick="openCity(event, 'stock')">Stock</button>
  <button class="tablinks" onclick="openCity(event, 'workshop')">Workshops & Training</button>
  <button class="tablinks" onclick="openCity(event, 'editing')">Processing & Editing</button>

</div>

<!-- Tab content -->
<div id="Portrait" class="tabcontent">
  <h3>Portrait Projects</h3>
  <p>Portrait.</p>
</div>

<div id="Event" class="tabcontent">
  <h3>Event Projects</h3>
  <p>Event.</p>
</div>

<div id="commercial" class="tabcontent">
  <h3>Commercial Projects</h3>
  <p>Commercial.</p>
</div>

<div id="realestate" class="tabcontent">
  <h3>Real Estate Projects</h3>
  <p>Real Estate.</p>
</div>

<div id="travel" class="tabcontent">
  <h3>Travel Projects</h3>
  <p>Travel.</p>
</div>

<div id="fashion" class="tabcontent">
  <h3>Fashion Projects</h3>
  <p>Fashion.</p>
</div>

<div id="fineart" class="tabcontent">
  <h3>Fine Art Projects</h3>
  <p>Fine Art.</p>
</div>

<div id="documentary" class="tabcontent">
  <h3>Documentary Projects</h3>
  <p>Documentary.</p>
</div>

<div id="sports" class="tabcontent">
  <h3>Sports Projects</h3>
  <p>Sports.</p>
</div>

<div id="aerial" class="tabcontent">
  <h3>Aerial Projects</h3>
  <p>Aerial.</p>
</div>

<div id="stock" class="tabcontent">
  <h3>Stock Projects</h3>
  <p>Stock.</p>
</div>

<div id="workshop" class="tabcontent">
  <h3>Workshop & Training Projects</h3>
  <p>Workshop & Traning.</p>
</div>

<div id="editing" class="tabcontent">
  <h3>Editing Projects</h3>
  <p>Editing.</p>
</div>

    
  

<!-- Footer -->
<footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Copyright 2024 <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">Hunkie Production</a></p>
    <p class="w3-medium">Developed and Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">Tubanje Technologies</a></p>
  <!-- End footer -->
  </footer>

<script>
  function openModal() {
    document.getElementById("bookServiceModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("bookServiceModal").style.display = "none";
}
document.getElementById('backHome').addEventListener('click', function() {
      window.location.href = 'home.php';
    });

function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

</body>
</html>