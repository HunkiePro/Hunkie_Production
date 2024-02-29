<?php
session_start();
require_once 'conf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Check if the provided credentials match admin credentials
    if ($username == ADMIN_USERNAME && in_array($password, ADMIN_PASSWORDS)) {
        // Set admin login session variable
        $_SESSION['admin_logged_in'] = true;

        // Redirect to the admin dashboard or any other page
        header("location: index.php");
        exit();
    } else {
        // Invalid credentials, display an error message or redirect to login page
        $error_message = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HUNKIE PRODUCTION| Admin Dashboard</title>
        <link href="css/styles.css" rel="stylesheet" />
        <style type="text/css">
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
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" id="username" name="username" placeholder="Enter name below" required/>
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password" required/>
                                                <label for="password">Password</label>
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="bookingbtn">Submit Booking</button>
                                            </div>
                                        </form>
                                        <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Hunkie Production 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
