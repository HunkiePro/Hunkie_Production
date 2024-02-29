<?php
require_once 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set and not empty
    if (isset($_POST['email'])) {
        // Sanitize and validate form data
        $subscriberEmail = htmlspecialchars(trim($_POST['email']));

        // Insert data into the "Subscriptions" table
        $stmt = $conn->prepare("INSERT INTO Subscriptions (subscriberEmail) VALUES (?)");

        // Check if the prepare statement is successful
        if ($stmt) {
            $stmt->bind_param("s", $subscriberEmail);

            if ($stmt->execute()) {
                // Subscription successful
                // echo "Subscription successful!";
                   $message = "Subscribed successfully!";
            } else {
                // Subscription failed
                $error = "Error executing query: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Error preparing query
            $error = "Error executing query: " . $conn->error;
        }

        $conn->close();
    } else {
        // All form fields are required
        $error = "All form fields are required!: " . $conn->error;
    }
}

 
?>
<!DOCTYPE html>
<html>
<head>
<title>HUNKIE|PRODUCTION</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
@media only screen and (max-width: 600px) {header .h1 {font-size: 13px;}}

/* Hide the sidebar menu by default on small screens */
#w3-sidebar {
  display: none;
}

/* Style the hamburger button */
#hamburger-btn {
  display: block;
  cursor: pointer;
  /* Add your styling here */
}

/* Style the close button */
#close-menu-btn {
  display: none;
  cursor: pointer;
  /* Add your styling here */
}

img {
  display: block;
  margin: 0 auto;
  max-width: 100%;
  height: auto;
    }

@media (max-width: 558px) {
   img {
      max-width: 80%; /* Adjust as needed */
        }
      }

</style>
</head>
<body style="background: #030237;">

<!-- Hamburger button for small screens -->
<div id="hamburger-btn" class="material-symbols-outlined">
  <button id="menupopup-btn" class="w3-bar-item w3-button" style="width:25% !important; color: #fff;"> <b>MENU</b></button>
</div>

<!-- Popup menu content -->
<div id="menupopup-menu" class="w3-modal">
  <span onclick="document.getElementById('menupopup-menu').style.display='none'" class="w3-button w3-xlarge w3-display-topright" style="color: #fff;">&times;</span>
  <div class="w3-modal-content w3-card-4">
    
    
    <!-- Your popup menu items go here -->
    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
      <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
      <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
      <a href="#quote" class="w3-bar-item w3-button" style="width:25% !important">GET QUOTE</a>
      <a href="services.php" class="w3-bar-item w3-button" style="width:25% !important">SERVICES</a>
      <a href="clients.php" class="w3-bar-item w3-button" style="width:25% !important">CLIENTS</a>
      <a href="photo-download.php" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
      <a href="#gallery" class="w3-bar-item w3-button" style="width:25% !important">GALLERY</a>
      <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
    </div>
  </div>
</div>

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav style="background: #030237;" class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="images/homelg.png" style="width:100%">
  <a href="#" style="color: #fff;" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="#about" style="color: #fff;" class="w3-bar-item w3-button w3-padding-large w3-hover-opacity w3-hover-gold">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>ABOUT</p>
  </a>
  <a href="#quote" style="color: #fff;" class="w3-bar-item w3-button w3-padding-large w3-hover-opacity w3-hover-gold">
    <i class="fa fa-dollar w3-xxlarge"></i>
    <p>GET QUOTE</p>
  <a href="services.php" style="color: #fff;" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-cogs w3-xxlarge"></i>
    <p>SERVICES</p>
  </a>
  <a href="clients.php" style="color: #fff;" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-users w3-xxlarge"></i>
    <p>CLIENTS</p>
  </a>
  </a>
  <a href="photo-download.php" style="color: #fff;" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>PHOTOS</p>
  </a>
  <a href="#gallery" style="color: #fff;" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-image w3-xxlarge"></i>
    <p>GALLERY</p>
  </a>
  <a href="#contact" style="color: #fff;" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>CONTACT</p>
  </a>

  <!-- Close button for small screens -->
  <div id="close-menu-btn" class="material-symbols-outlined">close</div>

</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<!-- <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
    <a href="#quote" class="w3-bar-item w3-button" style="width:25% !important">GET QUOTE</a>
    <a href="services.php" class="w3-bar-item w3-button" style="width:25% !important">SERVICES</a>
    <a href="clients.php" class="w3-bar-item w3-button" style="width:25% !important">CLIENTS</a>
    <a href="photo-download.php" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
    <a href="#gallery" class="w3-bar-item w3-button" style="width:25% !important">GALLERY</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
  </div>
</div> -->

<!-- Page Content -->
<div class="w3-padding-small" id="main">

  <header style="position: relative; margin-top: 20px; background: #030237;" class="w3-container w3-padding-32 w3-center" id="home">
    <h1 style="color: #fff; position: absolute; top: 25%; left: 50%; transform: translate(-50%, -50%); font-size: 2em;" class="w3-xlarge">HUNKIE|PRODUCTION.
    </h1>
    <p style="color: #fff; position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%); font-size: 1em;">A Photography and Film Production Brand.</p>
    <img src="images/nwhr1.png" alt="Hunkie Production" style="margin: 0;">
  </header>

<!-- Display success or error message -->
<?php if (isset($message)) : ?>
    <div style="color: Yellow;"><?php echo $message; ?></div>
<?php elseif (isset($error)) : ?>
    <div style="color: red;"><?php echo $error; ?></div>
<?php endif; ?>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-white">About Us</h2>
    <hr style="width:200px" class="w3-opacity">
    <p class="w3-text-white">Welcome to the heart of our creative journey. Our About page is a portal into the captivating narrative that defines our passion for photography. Discover the unique tale of Hunkie Production Firm, a visual storytelling brand whose journey transcends mere snapshots. From the first click of the camera to the present moment, immerse yourself in the milestones, challenges, and triumphs that have shaped our artistic vision.

    As a brand, Hunkie Productions brings more than technical expertise; we infuse every image with a personal touch, creating a seamless blend of artistry and emotion. Delve into the stories behind the lens, from the early sparks of inspiration to the evolution of a distinct visual language.
    </p>
    <style type="text/css">
      .button
      {background: #ddca79;
        color: #fff;
        border-radius: 10px;}
      .button:hover
      {background: #a27e2c;
        color: #030237;
        border-radius: 10px;}
    </style>
    
    <button id="popupButton" class="button" onclick="openPopup()">Our Phylosophy</button>
<!--  Pop up script styls -->
<style type="text/css">
  /* Popup Styles */
.popup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
}

.popup-content {
  background: #fff;
  padding: 20px;
  max-width: 80%;
  width: 100%;
  max-height: 80%;
  overflow-y: auto;
  box-sizing: border-box;
  position: relative; /* Added relative positioning */
}

.close {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  cursor: pointer;
}

/* Additional Styles for Improved Responsiveness */
@media (max-width: 486px) {
  .popup-content {
    max-width: 100%; /* Adjusted max-width for smaller screens */
    z-index: 1;

  }
}
.subscription-container {
  text-align: center;
}

h2 {
  color: #061bb0; /* Royal Blue */
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

label {
  margin: 10px 0;
}

input {
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #061bb0; /* Royal Blue */
}

button {
  background-color: #a27e2c; /* Royal Blue */
  color: #fff;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #ddca79; /* Gold */
}

.subBtn{
  background: #a27e2c;
  color: #fff;
}

.subBtn: hover {
  background: #ddca79;
}

</style>
    <!-- photo phylosophy scriipt -->
    <div id="popup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closePopup()">&times;</span>
    <h2 style="text-align: center;">A word from <b>Kelvin Tsuma</b>. <b>Founder & CEO</b> at <b>Hunkie Production</b>.</h2>
    <img src="images/LOGO HP.png" alt="Hunkie Production" style="margin: auto; width: auto; height: 100px;">
    <p>
      Behind every photograph lies a philosophy that guides our creative compass. At Hunkie Production, we believe that photography is not just about freezing moments in time but about capturing the essence of emotion, the play of light, and the subtleties that make each frame a masterpiece.

      Our approach to photography goes beyond the technical aspects; it's an artful exploration of the interplay between subject and surroundings. We embrace a philosophy of authenticity, seeking to reveal the genuine beauty in every scene. Whether it's a portrait, landscape, or event, our style is rooted in a commitment to storytelling through visuals.

      Explore our portfolio and witness the manifestation of this philosophy – a gallery filled with moments that transcend the ordinary. We invite you to connect with our vision, share in our passion, and join us on a visual journey where every click tells a story, and every story is a work of art.
    </p>
    <div class="subscription-container">
      <h2 style="text-align: center;">Subscribe to Our Newsletter</h2>
      <form id="subscriptionForm" action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label>
          <input type="checkbox" required>
            I agree to the <a href="privacy-policy.php" target="_blank">privacy policy</a> &amp; <a href="terms-of-use.php" target="_blank">terms of use</a>
        </label>
        <button class="subBtn" type="submit">Subscribe</button>
      </form>
    </div>
  </div>
</div>
    <h3 class="w3-padding-16 w3-text-light-grey">Our Expertese</h3>
    <p class="w3-wide w3-text-white">Photography</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:95%"></div>
    </div>
    <p class="w3-wide w3-text-white">Videography</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:98%"></div>
    </div>
    <p class="w3-wide w3-text-white">Web Design</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:100%"></div>
    </div>
    <p class="w3-wide w3-text-white">Graphics Design</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:85%"></div>
    </div>
    <p class="w3-wide w3-text-white">Adobe Photoshop</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:99%"></div>
    </div>
    <p class="w3-wide w3-text-white">Adobe Ilustrator</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:100%"></div>
    </div><br>
    
    <div class="w3-row w3-center w3-padding-16 w3-section w3-light-grey">
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">11+</span><br>
        Partners
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">55+</span><br>
        Projects Done
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">89+</span><br>
        Happy Clients
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">150+</span><br>
        Meetings
      </div>
    </div>

    <a href="images/kelvintsuma.pdf" class="w3-button w3-light-grey w3-padding-large w3-section" download="Kelvin Tsuma Resume/CV.pdf">
        <i class="fa fa-download"></i> Download Resume
    </a>

    <!-- get quote form styles -->
    <style type="text/css">
      /* Add your styling here */

        form {
          max-width: 400px;
          margin: 0 auto;
        }

        label {
          display: block;
          margin-bottom: 8px;
        }

        input, select {
          width: 100%;
          padding: 8px;
          margin-bottom: 16px;
        }

        /* Dropdown Styles */
        .dropdown {
          display: inline-block;
          position: relative;
        }

        .dropbtn {
          padding: 8px;
          background-color: #a27e2c;
          color: white;
          border: none;
          cursor: pointer;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
          z-index: 1;
        }

        .dropdown-content div {
          display: block;
          padding: 8px;
        }

        .dropdown-content div:hover {
          background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }

        button {
          background-color: #a27e2c;
          color: white;
          padding: 10px;
          border: none;
          cursor: pointer;
        }

        button:hover {
          background-color: #ddca79;
        }

    </style>
    <!-- Grid for pricing tables -->
    <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="quote">
      <h3 class="w3-padding-16 w3-text-light-grey">Fill the form and get qoute</h3>

      <form id="quoteForm" style="border: 2px solid #ddca79; border-radius: 10px; width: 70%;" action="logic.php" method="post">
        <img src="images/LOGO HP.png" alt="Hunkie Production" style="margin: auto; width: auto; height: 100px;">
        <label for="clientName" class="w3-text-white">Client Name:</label>
        <input type="text" id="clientName" name="clientName" required>

        <label for="location" class="w3-text-white">Location:</label>
        <input type="text" id="location" name="location" required>

        <label for="phone" class="w3-text-white">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="email" class="w3-text-white">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="serviceSelect" class="w3-text-white">Select The Service(s) You Need:</label>
        <div class="dropdown">
          <button class="dropbtn">View Hunkie Production Services:</button>
          <div class="dropdown-content">
            <div>
              <input type="checkbox" id="portrait" name="services[]" value="portrait">
              <label for="portrait">Portrait Photography</label>
            </div>
            <div>
              <input type="checkbox" id="landscape" name="services[]" value="landscape">
              <label for="landscape">Landscape Photography</label>
            </div>
            <div>
              <input type="checkbox" id="event" name="services[]" value="event">
              <label for="event">Event Photography</label>
            </div>
            <div>
              <input type="checkbox" id="stock" name="services[]" value="stock">
              <label for="stock">Stock Photography</label>
            </div>
            <div>
              <input type="checkbox" id="sports" name="services[]" value="sports">
              <label for="sports">Sports Photography</label>
            </div>
            <div>
              <input type="checkbox" id="web-design" name="services[]" value="web-design">
              <label for="web-design">Web design</label>
            </div>
            <div>
              <input type="checkbox" id="documentary" name="services[]" value="documentary">
              <label for="documentary">Documenatry Photography</label>
            </div>
            <div>
              <input type="checkbox" id="fineart" name="services[]" value="fineart">
              <label for="fineart">Fine Art Photography</label>
            </div>
            <div>
              <input type="checkbox" id="travel" name="services[]" value="travel">
              <label for="travel">Travel Photography</label>
            </div>
            <div>
              <input type="checkbox" id="food" name="services[]" value="food">
              <label for="food">Food Photography</label>
            </div>
            <div>
              <input type="checkbox" id="fashion" name="services[]" value="fashion">
              <label for="fashion">Fashion Photography</label>
            </div>
            <div>
              <input type="checkbox" id="realestate" name="services[]" value="realestate">
              <label for="realestate">Real Estate Photography</label>
            </div>
            <div>
              <input type="checkbox" id="Commercial" name="services[]" value="Commercial">
              <label for="Commercial">Commercial Photography</label>
            </div>
            <div>
              <input type="checkbox" id="events" name="services[]" value="events">
              <label for="events">Event Photography</label>
            </div>
          </div>
        </div>


        <label style="text-align: center;">
          <input type="checkbox" required class="w3-text-white">
            I agree to the <a href="privacy-policy.php" target="_blank">privacy policy</a> &amp; <a href="terms-of-use.php" target="_blank">terms of use</a>
        </label>
        <button  type="submit">Submit</button>
      </form>


    </div>
    
    <!-- Loop Testimonials -->
    <h3 class="w3-padding-24 w3-text-light-grey">Our Client Review. <br><a class="subBtn" href="clients.php" style="font-size: 14px; border-radius: 10px; padding: 5px;">Add Review</a></h3>  
    
    <img src="images/testi.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:80px">
    <p><span class="w3-large w3-margin-right">Chris Fox.</span> CEO at Mighty Schools.</p>
    <p>John Doe saved us from a web disaster.</p><br>
    
    <img src="images/testi2.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:80px">
    <p><span class="w3-large w3-margin-right">Rebecca Flex.</span> CEO at Company.</p>
    <p>No one is better than John Doe.</p>

    <img src="images/testi2.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:80px">
    <p><span class="w3-large w3-margin-right">Rebecca Flex.</span> CEO at Company.</p>
    <p>No one is better than John Doe.</p>
  <!-- End About Section -->
  </div>
  
  <!-- Portfolio Section -->
  <div class="w3-padding-64 w3-content" id="gallery">
    <h2 class="w3-text-light-grey">Our Photo Work</h2>
    <hr style="width:200px" class="w3-opacity">

    <!-- Grid for photos -->
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-half">
        <a href="portfolio.php">
          <img src="images/dispportrait.png" alt="portrait" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/dispcommercial.png" alt="Commercial" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/dispevent.png" alt="Event" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/dispfashion.png" alt="Fashion" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/dispfood.png" alt="Food" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/dispfine-art.png" alt="Fine Art" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/dispdocumentary.png" alt="Documentary" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
      </div>

      <div class="w3-half">
        <a href="portfolio.php">
          <img src="images/dispstock.png" alt="Stock" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/dispsports.png" alt="Sports" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/dispediting.png" alt="Editing" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/dispweb-design.png" alt="Web Design" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/disprealestate.png" alt="Real Estate" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/dispaerial.png" alt="Aerial" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
        <a href="portfolio.php">
          <img src="images/dispworkshop.png" alt="Workshop" style="width:100%; border-radius: 10px; height: 350px;" class="photo-img">
        </a>
      </div>
    <!-- End photo grid -->
    </div>
   <a href="portfolio.php" class="button" id="galleryButton" style="background-color: #ddca79; width: 150px; height: 40px; display: inline-block; text-align: center; line-height: 40px; text-decoration: none; color: #fff;">View More Work</a>


  <!-- End Portfolio Section -->
  </div>

  <!-- Contact Section -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <h2 class="w3-text-light-grey">Contact Our Office</h2>
    <hr style="width:200px" class="w3-opacity">

    <div class="w3-section">
        <p>
          <i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i>
          Serena, Malindi, KE
        </p>
        <p>
          <i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i>
          Phone: <a href="tel:+254714847500">+254714847500</a>
        </p>
        <p>
          <i class="fa fa-whatsapp fa-fw w3-text-white w3-xxlarge w3-margin-right"></i>
          WhatsApp: <a href="https://wa.me/254714847500" target="_blank">+254714847500</a>
        </p>
        <p>
          <i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"></i>
          Email: <a href="mailto:hunkieproduction1@gmail.com">hunkieproduction1@gmail.com</a>
        </p>
      </div><br>
    <p>Let's get in touch. Send us a message:</p>

    <form action="contactlogic.php" target="_blank" style="border: 2px solid #ddca79; border-radius: 10px;" method="post">
      <img src="images/LOGO HP.png" alt="Hunkie Production" style="margin: auto; width: auto; height: 50px;">
      <p style="width: 95%; margin: 5px; border-radius: 10px;"><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p style="width: 95%; margin: 5px; border-radius: 10px;"><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="Email"></p>
      <p style="width: 95%; margin: 5px; border-radius: 10px;"><input class="w3-input w3-padding-16" type="text" placeholder="Subject" required name="Subject"></p>
      <p style="width: 95%; margin: 5px; border-radius: 10px;"><input class="w3-input w3-padding-16" type="text" placeholder="Message" required name="Message"></p>
      <p style="width: 95%; margin: 5px; border-radius: 10px;">
        <button class="w3-button w3-light-grey w3-padding-small" type="submit">
          <i class="fa fa-paper-plane" style="color: #a27e2c;"></i> SEND MESSAGE
        </button>
      </p>
    </form>
  <!-- End Contact Section -->
  </div>
  
    <!-- Footer -->
    <style>
       footer {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 40vh; /* This ensures the footer takes the full height of the viewport */
      }

      .social-icons {
        display: flex;
        margin-bottom: 20px; /* Adjust as needed */
      }

      .social-icons i {
        margin: 0 10px;
      }
    </style>
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
      <div class="social-icons">
        <a href="https://web.facebook.com/hunkie.king.3" class="link" style="color: #fff;">
            <img src="images/fb.png" alt="" style="width: 60px; height: 60px; border-radius: 50px; margin: 10px;" />
          </a>
          <a href="https://www.instagram.com/hunkie_production/" class="link">
            <img src="images/ig.png" alt="" style="width: 60px; height: 60px; border-radius: 50px; margin: 10px" />
          </a>
          <a href="https://www.youtube.com/@hunkieproduction1906" class="link">
            <img src="images/yt.png" alt="" style="width: 60px; height: 60px; border-radius: 50px; margin: 10px" />
          </a>
          <a href="https://wa.me/254714847500" class="link">
            <img src="images/wa.png" alt="" style="width: 60px; height: 60px; border-radius: 50px; margin: 10px" />
          </a>
      </div>
      <p class="w3-medium">Copyright 2024 <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">Hunkie Production</a></p>
      <p class="w3-medium">Developed and Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">Tubanje Technologies</a></p>
  </footer>

<!-- END PAGE CONTENT -->
</div>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function () {
  // Toggle the visibility of the menu and buttons
  function toggleMenu() {
    var sidebarMenu = document.getElementById('sidebar-menu');
    var hamburgerBtn = document.getElementById('hamburger-btn');
    var closeMenuBtn = document.getElementById('close-menu-btn');

    sidebarMenu.classList.toggle('w3-hide-small');
    closeMenuBtn.style.display = closeMenuBtn.style.display === 'none' ? 'block' : 'none';
    hamburgerBtn.style.display = hamburgerBtn.style.display === 'none' ? 'block' : 'none';
  }

  // Add click event listeners to the buttons
  document.getElementById('hamburger-btn').addEventListener('click', toggleMenu);
  document.getElementById('close-menu-btn').addEventListener('click', toggleMenu);
});

  document.addEventListener('DOMContentLoaded', function () {
    // Add click event listener to the popup button
    document.getElementById('menupopup-btn').addEventListener('click', function () {
      // Display the popup menu
      document.getElementById('menupopup-menu').style.display = 'block';
    });
  });

  function openPopup() {
    document.getElementById('popup').style.display = 'flex';
  }

  function closePopup() {
    document.getElementById('popup').style.display = 'none';
  }
  document.getElementById('galleryButton').addEventListener('click', function() {
      window.location.href = 'gallery.php';
    });

</script>
</body>
</html>

