<!-- <!DOCTYPE html>
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
    height: 100%;
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
form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
    color: #000;
}

input, select {
    margin-bottom: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.submit-btn {
    background-color: #a27e2c;
    color: #fff;
    padding: 10px;
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


    <header>
        <div class="container">
            <div class="logo">
                <img src="images/indexlg.png" alt="Logo">
            </div>
            <h1>The Hunkie Production Free Photo Download Portal</h1>
        </div>
    </header>


    <section class="bookingbutton">
      <button class="bookingbtn" id="backHome">Home</button>
      <button class="bookingbtn" onclick="openModal()">Book Hunkie Production</button>
    </section>

    <div class="modal" id="bookServiceModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Book Hunkie Production</h2>
            <form id="bookServiceForm">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="email">Your phone number:</label>
                <input type="email" id="email" name="email" required>

                <label for="bookingDate">Date:</label>
                <input type="date" id="bookingDate" required>

                <label for="bookingTime">Time:</label>
                <input type="time" id="bookingTime" required>

                <label for="service">Select Service:</label>
                <select id="service" name="service" required>
                    <option value="portrait">Portrait Photography</option>
                    <option value="event">Event Photography</option>
                    <option value="event">Commercial Photography</option>
                    <option value="event">Real Estate Photography</option>
                    <option value="event">Travel Photography</option>
                    <option value="event">Fashion Photography</option>
                    <option value="event">Fine Art Photography</option>
                    <option value="event">Documentary and Photojournalism Photography</option>
                    <option value="event">Sports Photography</option>
                    <option value="event">Aeriel Photography</option>
                    <option value="event">Stock Photography</option>
                    <option value="event">Photography Workshops and Training Photography</option>
                    <option value="event">Post-Processing and Editing Services</option>
                    
                </select>

                <label>
                    <input type="checkbox" required>
                    I agree to the <a href="privacy-policy.php" target="_blank">privacy policy</a> &amp; <a href="terms-of-use.php" target="_blank">terms of use</a>
                </label>

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>

   
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">London</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
</div>


<div id="London" class="tabcontent">
  <h3>London</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p>
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>


    
  

<footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
    <p class="w3-medium">Copyright 2024 <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">Hunkie Production</a></p>
    <p class="w3-medium">Developed and Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">Tubanje Technologies</a></p>

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
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: Arial, sans-serif;
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


        #backgroundVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: -1;
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            background-color: rgba(0, 0, 0, 0.7);
            border: 2px solid #a27e2c;
            border-radius: 10px;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #fff;
            margin-top: 130px;
        }

        .content h1 {
            font-size: 2em;
        }

        .subscribe-form {
            margin-top: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .subscribe-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .subscribe-form button {
            background-color: #a27e2c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
        .subscribe-form button: hover {
          background: #ddca79;
        }

        .bookingbtn{
          background-color: #a27e2c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            margin: 10px;
            border-radius: 10px;
            cursor: pointer;
        }

        .bookingbtn: hover {
          background: #ddca79;
        }
    </style>
</head>
<body>

  <header>
        <div class="container">
            <div class="logo">
                <img src="images/indexlg.png" alt="Logo">
            </div>
            <h1 style="color: #fff;">The Hunkie Production</h1>
        </div>
    </header>

<video id="backgroundVideo" autoplay muted loop>
    <source src="images/hunkie.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="content">
  

    <h1>We Are Launching This Service Soon</h1>
    <p>Subscribe below for updates on the photo download services, <a href="terms-of-use.php" style="color: #fff;">Terms of Use</a> and <a href="privacy-policy.php" style="color: #fff;">Privacy Policy</a> applies.</p>

    <form class="subscribe-form">
        <input type="email" placeholder="Enter your email" required>
        <button class="subBtn" type="submit">Subscribe</button>
    </form>
    <button class="bookingbtn" id="backHome">Home</button>
</div>
<script type="text/javascript">
   document.getElementById('backHome').addEventListener('click', function() {
      window.location.href = 'home.php';
    });

</script>

</body>
</html>