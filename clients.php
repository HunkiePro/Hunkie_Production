<?php
require_once 'dbcon.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form data
    $name = htmlspecialchars(trim($_POST['name']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Handle file upload
    $targetDirectory = "uploads/"; // Adjust this path based on your file structure
    $clientImage = $targetDirectory . basename($_FILES["clientImage"]["name"]);

    // Check if the image file is a valid image
    $imageFileType = strtolower(pathinfo($clientImage, PATHINFO_EXTENSION));
    $validExtensions = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageFileType, $validExtensions)) {
        // Move the uploaded file to the target directory
        move_uploaded_file($_FILES["clientImage"]["tmp_name"], $clientImage);

        // Insert data into the "Testimonials" table
        $stmt = $conn->prepare("INSERT INTO Testimonials (name, clientImage, message, agreedToTerms) VALUES (?, ?, ?, ?)");

        // Check if the prepare statement is successful
        if ($stmt) {
            $agreedToTerms = isset($_POST['agreedToTerms']) ? 1 : 0;

            $stmt->bind_param("sssi", $name, $clientImage, $message, $agreedToTerms);

            if ($stmt->execute()) {
                // Testimonial submitted successfully
                echo "Testimonial posted successfully!";
            } else {
                // Testimonial submission failed
                echo "Error executing query: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Error preparing query
            echo "Error preparing query: " . $conn->error;
        }
    } else {
        echo "Invalid file format. Please upload a valid image.";
    }
}

// Fetch testimonials from the database
$query = "SELECT * FROM Testimonials ORDER BY testified_at DESC LIMIT 5"; // Adjust the query as needed
$result = $conn->query($query);

// Initialize an array to store testimonials
$testimonials = [];

// Fetch testimonials and store them in the array
while ($row = $result->fetch_assoc()) {
    $testimonials[] = $row;
}

// Close the connection after fetching testimonials
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonial Page</title>
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

      .main-section {
          padding: 20px 0;
          background-color: #030237;
      }
      .buttons{
        
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
      
      }
      .buttons button {
          background-color: #a27e2c;
          color: #fff;
          padding: 10px 20px;
          margin-right: 10px;
          cursor: pointer;
      }

      .testimonial-form-popup {
          display: none;
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background-color: #030237;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 0 20px rgba(218, 165, 32, 0.7);
          max-width: 400px;
          width: 100%;
          text-align: center;
      }

      .testimonial-form-popup label {
          display: block;
          margin-bottom: 10px;
          text-align: left;
      }

      .testimonial-form-popup input,
      .testimonial-form-popup textarea {
          width: 100%;
          padding: 10px;
          margin-bottom: 15px;
          box-sizing: border-box;
      }

      .testimonial-form-popup button {
          background-color: #a27e2c;
          color: #fff;
          padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
      }

      .testimonial-form-popup button:hover {
          background-color: #ddca79;
          color: #030237;

      }

      .testimonial-form-popup button:last-child {
          background-color: #a27e2c;
          margin-left: 10px;
      }

      .testimonial-form-popup button:last-child:hover {
          background-color: #ddca79;
          color: #030237;
      }


      .testimonial-scroll {
          display: flex;
          overflow-x: auto;
          margin-top: 30px;
      }

      .testimonial-item {
          flex: 0 0 auto;
          width: 300px;
          margin-right: 20px;
          margin-bottom: 20px;
          background: #fff;
          padding: 20px;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
          text-align: center;
      }

      .testimonial-item  h3{
          color: #000;
          text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
      }

      .testimonial-item  p{
          color: #000;
      }

      .testimonial-item img {
          width: 80px;
          height: 80px;
          border-radius: 50%;
          margin-bottom: 15px;
          box-shadow: 0 0 10px rgba(9, 0, 0, 73.3);
      }

      footer {
          background-color: #34495e; /* Footer background color */
          padding: 10px 0;
          text-align: center;
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
        <h1>The Hunkie Production Client Portal</h1>
    </div>
</header>

<!-- Main Section -->
<section class="main-section">
    <div class="container">
        <div class="buttons">
            <button id="backHome">Home</button>
            <button onclick="openTestimonialForm()">Add Testimonial</button>
            <button id="servicesbtn">Services</button>
        </div>

        <!-- Testimonial Form Popup -->
        <div id="testimonialFormPopup" class="testimonial-form-popup">
            <form action="" method="post" enctype="multipart/form-data">
                <img src="images/LOGO HP.png" alt="Hunkie Production" style="margin: auto; width: auto; height: 100px;">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="clientImage">Client Image:</label>
                <input type="file" id="clientImage" name="clientImage" accept="image/*" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>

                <label style="text-align: center;">
                  <input type="checkbox" required class="w3-text-white">
                    I agree to the <a href="privacy-policy.php" target="_blank">privacy policy</a> &amp; <a href="terms-of-use.php" target="_blank">terms of use</a>
                </label>

                <button type="submit" onclick="postTestimonial()">Post</button>
                <button type="button" onclick="closeTestimonialForm()">Close</button>
 
            </form>
        </div>

        <!-- Testimonials in Horizontal Scrollable Format -->
        <div class="testimonial-scroll">
            <?php foreach ($testimonials as $testimonial): ?>
                <div class="testimonial-item">
                    <img src="<?php echo $testimonial['clientImage']; ?>" alt="<?php echo $testimonial['name']; ?>">
                    <h3><?php echo $testimonial['name']; ?></h3>
                    <p><?php echo $testimonial['message']; ?></p>
                    <p><?php echo $testimonial['testified_at']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <p>&copy; 2023 Hunkie Production</p>
</footer>


<script>
  document.getElementById('backHome').addEventListener('click', function() {
      window.location.href = 'home.php';
    });
  document.getElementById('servicesbtn').addEventListener('click', function() {
      window.location.href = 'services.php';
    });

  function openTestimonialForm() {
      document.getElementById("testimonialFormPopup").style.display = "block";
  }

  function closeTestimonialForm() {
      document.getElementById("testimonialFormPopup").style.display = "none";
  }

  function postTestimonial() {
      // Implement postTestimonial functionality as needed
      console.log("Post Testimonial");
  }

  
</script>

</body>
</html>