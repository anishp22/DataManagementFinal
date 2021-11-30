<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CarShare</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="images/carshareicon.jpg">

        <!--Bootsrap styles-->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <!--plugin css-->

        <!--custom css-->
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/responsive.css"/>
        <link rel="stylesheet" href="css/slick.css"/>
    </head>
    <body class="is-preload">
        <!-- main page -->
        <div id="page">
            <header id="header" class="alt">
                <nav class="navbar navbar-main navbar-expand-md">
                    <div class="container-fluid">
                        <div class="logo">
                            <a href="index.html"><strong>CarShare</strong> </a>
                        </div>

                        <!-- Toggler/collapsibe Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="fa fa-bars"></span>
                        </button>

                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                            <ul class="navbar-nav custom-nav">
                                <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="aboutus.html">About Us</a></li>
                                <li class="nav-item active"><a class="nav-link" href="vehicles.php">Vehicles</a></li>
                                <li class="nav-item"><a class="nav-link" href="signupcustomer.php">Sign Up</a></li>
                                <li class="nav-item"><a class="nav-link" href="signupcustomer.php">Log In</a></li>
                            </ul>
                        </div>
                    </div>
                </nav> 
            </header><!-- End Header -->

            <section id="banner" class="banner-area">
                <div class="container inner">
                    <div class="slide-text">
                        <header class="banner-header">
                            <h1>View 7</h1>
                        </header>
                        <div class="content">
                            <p>Find vehicles by max 2 locations</p>
                        </div>
                    </div>
                </div>
            </section>

     <main id="main" class="main">
     <section class="generic-page tv-bg-dark tv-padd-tb-80">
                    <div class="container">
                        <div class="tv-generic-image">
                            <img src="images/mainpagebg.webp" class="img-fluid" alt="generic image">
                        </div>

                        <!--PHP CODE FOR DATABASE TABLE WITH VEHICLE INFO-->
                        <?php 
                        if(!empty($_POST)){
                            $dbhost="localhost";
                            $dbuser="root";
                            $dbpass="";
                            $dbname="group25";
                            $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
                        }
                        if (mysqli_connect_errno()) {
                            die("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
                        }

                        if(isset($_POST['submit'])) { 
                            $location1 = $_POST['location1'];
                            $location2 = $_POST['location2'];
                        $sql = "SELECT * FROM vehicles WHERE location='". $location1 . "' or location='". $location2 . "'";
                        $result = mysqli_query( $connection, $sql);

                        echo "<div class='table-wrapper'>
                            <table class='alt-table'> 
                                <thead>
                                    <tr>
                                        <th>Vehicle ID</th>
                                        <th>Host ID</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Year</th>
                                        <th>Type</th>
                                        <th>Location</th>
                                        <th>Daily Cost</th>
                                    </tr>
                                </thead>";
                         
                        
                             while($row = mysqli_fetch_assoc($result)) {
                                echo "<tbody>";
                                echo "<tr>";
                                echo "<td>" . $row['v_id'] . "</td>";
                                echo "<td>" . $row['hosts_id'] . "</td>";
                                echo "<td>" . $row['brand'] . "</td>";
                                echo "<td>" . $row['model'] . "</td>";
                                echo "<td>" . $row['v_year'] . "</td>";
                                echo "<td>" . $row['v_type'] . "</td>";
                                echo "<td>" . $row['location'] . "</td>";
                                echo "<td>" . $row['daily_cost'] . "</td>";
                                echo "</tr>";
                                echo "</tbody>";  
                                }
                                echo "</table>";
                                echo "</div>";


                        mysqli_close($connection);
                            }
                        ?> 
                    </div>
                </section>

    <br>
    <br>

                    </main>
                    <footer class="tv-footer-bg">
                <div class="tv-footer-top">
                    <div class="container">
                        <div class="row tv-footer-block">
                            <div class="col-md-12 col-footer-bottomspace">
                                <div class="tv-footer-title">about us</div>
                                <div class="tv-footer-content">
                                    <p class="des">
                                        When it comes to renting a house, everyone thinks AirBNB and their user friendly UI 
                                        <br>Our team is dedicated to put out the same experience for everyone but for cars...
                                        <a href="aboutus.html">Read More</a>
                                    </p>
                                    <div class="tv-social-follow">
                                        <label>Socials Coming Soon!</label>
                                        <ul class="link-follow">
                                            <li class="first"><a class="twitter fa fa-twitter" title="Twitter" href="https://twitter.com"></a></li>
                                            <li><a class="google fa fa-google-plus" title="Google" href="https://www.google.ca"></a></li>
                                            <li><a class="facebook fa fa-facebook" title="Facebook" href="https://www.facebook.com"></a></li>
                                            <li><a class="youtube fa fa-youtube" title="Youtube" href="https://www.youtube.com"></a></li>
                                        </ul>
                                    </div>																	 									 									 									 									
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <!--script-->
        <script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.scrolly.min.js" type="text/javascript"></script>
        <script src="js/jquery.scrollex.min.js" type="text/javascript"></script>
        <script src="js/slick.min.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
    </body>
</html>
