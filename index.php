<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hunkie Production</title>
  <link rel="stylesheet" href="styles.css">
  <!-- Google Icons Link -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-KGl5vjK1lEMlr0Wzr+sLXQcmLCHLOeUn6aD7cq3im2SjB3R4/4pYY38Fdpjbppe0FnjRbBV9LBP6w+OaP9F2jA==" crossorigin="anonymous" />

  <style type="text/css">
 /* Modal Styles */
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  /*background-color: rgba(0, 0, 0, 0.5);*/
  background: #a27e2c;
  justify-content: center;
  align-items: center;
}

.modal-content {
  background: #fff;
  border-radius: 10px;
  max-width: 80%;
  padding: 20px;
}

.close {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  cursor: pointer;
}
    .profile-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  max-width: 370px;
  width: 100%;
  background: #fff;
  border-radius: 24px;
  padding: 25px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  position: relative;
  z-index: 2;
}
/*.profile-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  height: 50%;
  width: 100%;
  border-radius: 24px 24px 0 0;
  background-color: #4070f4;
}*/
.image {
  position: relative;
  height: 150px;
  width: 150px;
  border-radius: 50%;
  background-color: #a27e2c;
  padding: 3px;
  margin-right: 20px;
  margin-bottom: 10px;
}
.image .profile-img {
  height: 100%;
  width: 100%;
  margin-left: 50px;
  object-fit: cover;
  border-radius: 50%;
  border: 3px solid #a27e2c;
}
.profile-card .text-data {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #333;
}
.text-data .name {
  font-size: 22px;
  font-weight: 500;
}
.text-data .job {
  font-size: 15px;
  font-weight: 400;
  text-align: center;
}
.profile-card .media-buttons {
  display: flex;
  align-items: center;
  margin-top: 15px;
}
.media-buttons .link {
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-size: 18px;
  height: 34px;
  width: 34px;
  border-radius: 50%;
  margin: 0 8px;
  background-color: #000;
  text-decoration: none;
}
.profile-card .buttons {
  display: flex;
  align-items: center;
  margin-top: 25px;
}
.buttons .button {
  color: #fff;
  font-size: 14px;
  font-weight: 400;
  border: none;
  border-radius: 24px;
  margin: 0 10px;
  padding: 8px 24px;
  background-color: #a27e2c;
  cursor: pointer;
  transition: all 0.3s ease;
}
.buttons .button:hover {
  background-color: #ddca79;
}
.profile-card .analytics {
  display: flex;
  align-items: center;
  margin-top: 25px;
}
.analytics .data {
  display: flex;
  align-items: center;
  color: #333;
  padding: 0 20px;
  border-right: 2px solid #e7e7e7;
}
.data i {
  font-size: 18px;
  margin-right: 6px;
}
.data:last-child {
  border-right: none;
}
     }


  </style>
</head>
<body id="blur">
  <header>
    <nav class="navbar">
      <a href="#" class="logo">
        <img src="images/indexlg.png" alt="Hunkie Poduction Logo">
      </a>
      <ul class="menu-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="terms-of-use.php">Terms of Use</a></li>
        <li><a href="privacy-policy.php">Privacy Policy</a></li>
        <li class="join-btn"><a id="openModalBtn">HUNKIE</a></li>
        <span id="close-menu-btn" class="material-symbols-outlined">close</span>
      </ul>
      <span id="hamburger-btn" class="material-symbols-outlined">menu</span>
    </nav>
  </header>

  <section class="hero-section">
    <div class="content">
      <div class="content">
      <h1>Through Our Lens, Discover Your World, Unveil the Beauty of Every Click with <span style="font-family: 'Indie Flower', cursive; color: #030237">Hunkie <span style=" color: #fff;">Production</span></span></h1>
      <div class="popular-tags">
        Action:
        <ul class="tags">
          <li><a href="home.php">Visit Website</a></li>
        </ul>
      </div>
    </div>
  </section>

  
  
  <!-- The Modal -->
<div id="profileModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <!-- Profile Card HTML goes here -->
      <div class="profile-card">
        <div class="image">
          <img src="images/profile.jpg" alt="" class="profile-img" />
        </div>

        <div class="text-data">
          <span class="name"><b>Kelvin Tsuma</b></span>
          <span class="job"><b>Founder & CEO- Hunkie Productions</b></span>
          <span class="job">Photographer| Drone Pilot| Editor & Designer.</span>
        </div>

        <div class="media-buttons">
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

        <div class="buttons">
          <button id="moreInfoButton" class="button">Info</button>
          <button id="bookusButton" class="button">Bookings</button>
        </div>

        <div class="analytics">
          
        </div>
    </div>
    </div>
  </div>




  <script>
    const header = document.querySelector("header");
    const hamburgerBtn = document.querySelector("#hamburger-btn");
    const closeMenuBtn = document.querySelector("#close-menu-btn");

    // Toggle mobile menu on hamburger button click
    hamburgerBtn.addEventListener("click", () => header.classList.toggle("show-mobile-menu"));

    // Close mobile menu on close button click
    closeMenuBtn.addEventListener("click", () => hamburgerBtn.click());

    // profile modal
    // Open the modal when the button is clicked
    document.getElementById("openModalBtn").addEventListener("click", function() {
      document.getElementById("profileModal").style.display = "flex";
    });

    // Close the modal when the close button (×) is clicked
    document.getElementsByClassName("close")[0].addEventListener("click", function() {
      document.getElementById("profileModal").style.display = "none";
    });

    // Close the modal when clicking outside the modal content
    window.addEventListener("click", function(event) {
      if (event.target === document.getElementById("profileModal")) {
        document.getElementById("profileModal").style.display = "none";
      }
    });

    function toggle(){
      var blur = document.getElementById('blur');
      blur.classList.toggle('active');

    }
    

    document.getElementById('moreInfoButton').addEventListener('click', function() {
      window.location.href = 'home.php';
    });

    document.getElementById('bookusButton').addEventListener('click', function() {
      window.location.href = 'bookings.php';
    });

    

  </script>
</body>
</html>