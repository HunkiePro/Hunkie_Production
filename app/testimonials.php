<?php
require_once 'conf.php';
session_start();
require_once 'dbcon.php';
// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("location: login.php");
    exit();

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
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>HUNKIE PRODUCTION| Admin Dashboard</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style type="text/css">
            .table-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 40vh; /* Adjusted height for better visibility */
                margin: auto;
            }


            #bookingTable {
                width: 95%; /* Adjusted width for better responsiveness */
                border-collapse: collapse;
                margin-top: 20px;
            }

            #bookingTable th, #bookingTable td {
                border: 1px solid #ddd; /* Changed border color for better visibility */
                padding: 12px; /* Increased padding for better spacing */
                text-align: center; /* Centered text for better alignment */
                 font-size:  13px;
            }

            #bookingTable th {
                font-size:  13px;
                background-color: #f2f2f2;
                color: #333; /* Adjusted text color for better contrast */
                font-weight: bold; /* Added bold font for header cells */
            }

            /* Hover effect for better interactivity */
            #bookingTable tr:hover {
                background-color: #f5f5f5;
            }

            #bookingTable tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            #bookingTable tbody tr:hover {
                background-color: #f0f0f0;
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

            .testimonial-scroll {
                  display: flex;
                  overflow-x: auto;
                  margin-top: 30px;
              }

              .testimonial-item {
                  flex: 0 0 auto;
                  width: 300px;
                  margin-top: 40px;
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
        </style>
    </head>
    <body style="background: #fff;">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">HUNKIE PRODUCTION</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../index.php">Visit Website</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="getout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">ADMINISTRATION</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">MANAGEMENT</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Manage Inserts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-booking.php"><span  style="font-size: 24px;">+</span>Booking Data</a>
                                    <!-- <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a> -->
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Data Information
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Client Data
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="quotation-requests.php">Quotation Request</a>
                                            <a class="nav-link" href="bookings-orders.php">Booking Requests</a>
                                            <a class="nav-link" href="subscribers.php">All Subscribers</a>
                                            <a class="nav-link" href="Messages.php">Messages</a>
                                            <a class="nav-link" href="testimonials.php">Client Testimonial</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Control</div>
                            <a class="nav-link" href="getout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">ADMIN PORTAL:</div>
                        Hunkie Production
                    </div>
                </nav>
            </div>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container" style="margin-left: 5px;">
                        <div class="row justify-content-center">
                            <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Client Testimonial
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
