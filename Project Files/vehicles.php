<!--Vehicles Booking Page-->

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
                            <h1>Vehicles</h1>
                        </header>
                        <div class="content">
                            <p>Book your ride below.</p>
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
                            $dbhost="localhost";
                            $dbuser="root";
                            $dbpass="";
                            $dbname="group25";
                            $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

                        if (mysqli_connect_errno()) {
                            die("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
                        }

                        $sql = "SELECT * FROM vehicles";
                        $result = mysqli_query( $connection, $sql);

                        echo "<div class='table-wrapper'>
                            <table class='alt-table'> 
                                <thead>
                                    <tr>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Year</th>
                                        <th>Type</th>
                                        <th>Location</th>
                                        <th>Cost/Day</th>
                                    </tr>
                                </thead>";
                         
                        
                        if (mysqli_num_rows($result) > 0) {
                             while($row = mysqli_fetch_assoc($result)) {
                                echo "<tbody>";
                                echo "<tr>";
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
                        }        
                        
                        else {
                            echo "There are no listings posted currently.";
                        }

                        mysqli_close($connection);
                        ?> 
                    </div>
                </section>
    <br>
    <br>

                <h2 style="text-align:center;">Views</h2>
                <br>
                <br>
                <div class="call-to-action text-center">
                            <a href="view1.php" class="button button-trans-white">View 1</a> <br> <br>
                            <br><br>
                            <form method="POST" action="view2.php">
                            Enter offset years <input type="number" style="color:black"name="offset" min="0" max="20" /><br><br>
                            <input type = "submit" name="submit" value = "Click for View 2 after entering offset" id="button button-fill-white" /><br><br>
                            </form>
                            <br><br>
                            <a href="view3.php" class="button button-trans-white">View 3</a> <br> <br> 
                            <a href="view4.php" class="button button-trans-white">View 4</a> <br> <br>
                            <a href="view5.php" class="button button-trans-white">View 5</a> <br> <br>
                            <a href="view6.php" class="button button-trans-white">View 6</a> <br> <br>
                            <br><br>
                            <form method="POST" action="view7.php">
                            Enter Location 1 <input type="text" style="color:black" id="location1" name="location1"><br><br>
                            Enter Location 2 <input type="text" style="color:black" id="location2" name="location2"><br><br>
                            <input type = "submit" name="submit" value = "Click for View 7 after entering 2 locations" /><br><br>
                            </form>
                            <br><br>
                            <form method="POST" action="view8.php">
                            <select id="cars" style="color:black" name="vehicleType">
                            <option value="SUV">SUV</option>
                            <option value="Truck">Truck</option>
                            <option value="Sedan">Sedan</option>
                            <option value="Van">Van</option>
                            <option value="Coupe">Coupe</option>
                            <option value="Wagon">Wagon</option>
                            <option value="Convertible">Convertible</option>
                            <option value="Sports Car">Sports Car</option>
                            <option value="Crossover">Crossover</option>
                            <option value="Luxury Car">Luxury Car</option>
                            <option value="Hybrid/Electric">Hybrid/Electric</option>
                            <option value="Certified Pre-Owned">Certified Pre-Owned</option>
                            </select>
                            <br>
                            <br>
                            <input type = "submit" name="submit" value = "Click here for View 8 after selecting vehicle type" /><br><br>
                            </form>
                            <br><br>

                            <form method="POST" action="view9.php">
                            Check years from <input type="number" style="color:black" name="year1" min="1800" max="3000"/> to 
                            <input type="number" name="year2" min="1800" max="3000" /><br><br>
                            <input type = "submit" name="submit" value = "Click here for View 9 after entering a range" /><br><br>
                            </form>
                            <br><br>
                            
                            <form method="POST" action="view10.php"> 
                            Date:   <input type = "date" style="color:black" name = "date" required/><br><br>
                            <input type = "submit" name="submit" value = "Click here for View 10 for all reservations after certain date" /><br><br>
                            </form>
                        </div>

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
