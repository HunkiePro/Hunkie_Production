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
          height: 500px;
          padding: 20px;
          background-color: #fff;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
          border-radius: 8px;
          text-align: center;
      }

      .service img {
          width: 250px;
          max-width: 100%;
          height: 200px;
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
    </style>
</head>
<body>

<!-- Header -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="images/indexlg.png" alt="Logo">
            </div>
            <h1>The Hunkie Production Service Catalog</h1>
        </div>
    </header>

<!-- Main Section -->
    <section class="bookingbutton">
      <button class="bookingbtn" id="backHome">Home</button>
      <button class="bookingbtn" onclick="openModal()">Book Photographer</button>
    </section>

    <div class="modal" id="bookServiceModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h4>Book Hunkie Production</h4>
            <form id="bookServiceForm">
              <img src="images/LOGO HP.png" alt="Hunkie Production" style="margin: auto; width: auto; height: 50px;">
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
                    <!-- Add more options as needed -->
                </select>

                <label>
                    <input type="checkbox" required>
                    I agree to the <a href="privacy-policy.php" target="_blank">privacy policy</a> &amp; <a href="terms-of-use.php" target="_blank">terms of use</a>
                </label>

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>


    <div class="services-container">
    <div class="services-scroll">

        <!-- Service 1: Portrait Photography -->
        <div class="service">
            <img src="images/portrait.png" alt="Portrait Photography">
            <h2>Portrait Photography</h2>
            <ul>
                <li>Individual Portraits</li>
                <li>Family Portraits</li>
                <li>Corporate Headshots</li>
                <li>Creative Portraiture</li>
                <li>Environmental Portraits</li>
                <li>Fine Art Portraits</li>
                <li>Newborn Photography</li>
            </ul>
        </div>

        <!-- Service 2: Event Photography -->
        <div class="service">
            <img src="images/event.png" alt="Event Photography">
            <h2>Event Photography</h2>
            <ul>
                <li>Wedding Photography</li>
                <li>Corporate Events</li>
                <li>Parties and Celebrations</li>
                <li>Graduation Ceremonies</li>
                <li>Product Launch Events</li>
                <li>Concerts and Music Events</li>
                <li>Charity Events</li>
            </ul>
        </div>

        <!-- Service 3: Commercial Photography -->
        <div class="service">
            <img src="images/commercial.png" alt="Commercial Photography">
            <h2>Commercial Photography</h2>
            <ul>
                <li>Product Photography</li>
                <li>Advertising Campaigns</li>
                <li>Corporate Branding</li>
                <li>Editorial Photography</li>
                <li>E-commerce Product Photography</li>
                <li>Industrial Photography</li>
                <li>Architectural Photography</li>
            </ul>
        </div>

        <!-- Service 4: Real Estate Photography -->
        <div class="service">
            <img src="images/realestate.png" alt="Real Estate Photography">
            <h2>Real Estate Photography</h2>
            <ul>
                <li>Interior and Exterior Photography</li>
                <li>Property Listings</li>
                <li>Virtual Tours</li>
                <li>Aerial Views of Properties</li>
                <li>High Dynamic Range(HDR) Photography</li>
                <li>Twilight Photography</li>
            </ul>
        </div>

        <!-- Service 5: Fashion Photography -->
        <div class="service">
            <img src="images/fashion.png" alt="Fashion Photography">
            <h2>Fashion Photography</h2>
            <ul>
                <li>Model Portfolio Shoots</li>
                <li>Fashion Editorials</li>
                <li>Lookbooks</li>
                <li>High Fashion Editorials</li>
                <li>Beauty and Makeup Photography</li>
                <li>Catalog Photography</li>
                <li>Runway Fashion Shows</li>
            </ul>
        </div>

        <!-- Service 6: Food Photography -->
        <div class="service">
            <img src="images/food.png" alt="Food Photography">
            <h2>Food Photography</h2>
            <ul>
                <li>Restaurant Menus</li>
                <li>Culinary Magazines</li>
                <li>Food Blogs</li>
                <li>Menu Photography</li>
                <li>Recipe Book Photography</li>
                <li>Social Media Food Posts</li>
            </ul>
        </div>

        <!-- Service 7: Travel Photography -->
        <div class="service">
            <img src="images/travel.png" alt="Travel Photography">
            <h2>Travel Photography</h2>
            <ul>
                <li>Destination Photography</li>
                <li>Tourism Campaigns</li>
                <li>Travel Blogs</li>
                <li>Landscape Photography</li>
                <li>Adventure Travel Photography</li>
                <li>Cityscapes and Architecture</li>
                <li>Wildlife and Nature Photography</li>
                <li>Street Photography</li>
            </ul>
        </div>

        <!-- Service 8: Fine Art Photography -->
        <div class="service">
            <img src="images/fine-art.png" alt="Fine Art Photography">
            <h2>Fine Art Photography</h2>
            <ul>
                <li>Art Exhibitions</li>
                <li>Limited Edition Prints</li>
                <li>Conceptual Fine Art</li>
                <li>Photographic Installations</li>
                <li>Experimental Photography</li>
                <li>Surrealistic Art</li>
            </ul>
        </div>

        <!-- Service 9: Documentary and Photojournalism -->
        <div class="service">
            <img src="images/documentary.png" alt="Documentary and Photojournalism">
            <h2>Documentary and Photojournalism</h2>
            <ul>
                <li>Storytelling Through Photography</li>
                <li>News Photography</li>
                <li>Social Issues Documentaries</li>
                <li>Humanitarian Photography</li>
                <li>Environmental Documentaries</li>
            </ul>
        </div>

        <!-- Service 10: Pet Photography -->
        <div class="service">
            <img src="images/web-design-art.png" alt="web design Photography">
            <h2>Web Design</h2>
            <ul>
                <li>Responsive Mobile-Friendly Website Design</li>
                <li>E-Commerce Website Design</li>
                <li>WordPress Website Design</li>
                <li>Corporate Website Design</li>
                <li>Graphic Design for the Web</li>
                <li>User Interface (UI) Design</li>
                <li>Web Development Consulting</li>
            </ul>
        </div>

        <!-- Service 11: Sports Photography -->
        <div class="service">
            <img src="images/Sports.png" alt="Sports Photography">
            <h2>Sports Photography</h2>
            <ul>
                <li>Action Shots</li>
                <li>Sports Events Coverage</li>
                <li>Athlete Portraits</li>
                <li>Sports Team Photography</li>
                <li>Sports Action Sequences</li>
                <li>Sports Documentary Projects</li>
            </ul>
        </div>

        <!-- Service 12: Aerial Photography -->
        <div class="service">
            <img src="images/aerial.png" alt="Aerial Photography">
            <h2>Aerial Photography</h2>
            <ul>
                <li>Drone Photography</li>
                <li>Drone Photography</li>
                <li>Aerial Surveys</li>
                <li>Landscape Aerial Views</li>
                <li>Aerial Mapping</li>
                <li>Real Estate Aerial Photography</li>
            </ul>
        </div>

        <!-- Service 13: Stock Photography -->
        <div class="service">
            <img src="images/stock.png" alt="Stock Photography">
            <h2>Stock Photography</h2>
            <ul>
                <li>Creating Images for Stock Libraries</li>
                <li>Stock Photo Submissions</li>
                <li>Aerial Surveys</li>
                <li>Niche Stock Photography</li>
                <li>Exclusive Stock Content</li>
                <li>High-Resolution Stock Images</li>
                <li>Commercial Stock Photography</li>
            </ul>
        </div>

        <!-- Service 14: Photography Workshops and Training -->
        <div class="service">
            <img src="images/workshop.png" alt="Photography Workshops and Training">
            <h2>Photography Workshops and Training</h2>
            <ul>
                <li>Conducting Photography Classes</li>
                <li>Workshops and Training Sessions</li>
                <li>Photography Workshop Events</li>
                <li>One-on-One Photography Coaching</li>
                <li>Online Photography Courses</li>
                <li>Basic Photography Workshops</li>
                <li>Advanced Photography Classes</li>
                <li>Specialised Photography Training</li>
            </ul>
        </div>

        <!-- Service 15: Post-Processing and Editing Services -->
        <div class="service">
            <img src="images/editing.png" alt="Post-Processing and Editing Services">
            <h2>Post-Processing and Editing Services</h2>
            <ul>
                <li>Photo Retouching</li>
                <li>Color Correction</li>
                <li>Image Enhancement</li>
                <li>Background Removal</li>
                <li>Restoration of Old Photos</li>
                <li>Special Effects and Filters</li>
            </ul>
        </div>

    </div>
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
</script>

</body>
</html>