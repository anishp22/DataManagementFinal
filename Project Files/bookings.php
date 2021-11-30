<!--Template Name: 
File Name: elements.php
Author Name: ThemeVault
Author URI: http://www.themevault.net/
License URI: http://www.themevault.net/license/-->

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
            

            <section id="banner" class="banner-area">
                <div class="container inner">
                    <div class="slide-text">
                        <header class="banner-header">
                            <br>
                            <br>
                            <br>
                            <br>
                            <h1>Car Listings</h1>
                            <?php
                            session_start();
                            //Create a database connection

                            $dbhost="localhost";
                            $dbuser="root";
                            $dbpass="";
                            $dbname="group25";
                            $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                            if ($connection->connect_error){
                                die("Connection failed: " . $conn->connect_error);
                            }

                            //remove a reservation from database

                                $c_id = $_SESSION['custid'];
                                //print($h_id['h_id']);
                                $sql = "SELECT * FROM vehicles";
                                $row=$connection->query($sql);
                                echo "<table><tr><th>Vehicle ID</th><th>Host ID</th><th>Brand</th><th>Model</th><th>Year</th><th>Type</th></tr>";
                                foreach ($connection->query($sql) as $row){
                                    echo"<tr><td>" . $row['v_id'] . 
                                        "</td><td>" . $row['hosts_id'] .
                                        "</td><td>" . $row['brand'] .
                                        "</td><td>" . $row['model'] .
                                        "</td><td>" . $row['v_year'] .
                                        "</td><td>" . $row['v_type'] .
                                        "</td><td>" . $row['location'] .
                                        "</td><td>" . $row['daily_cost'] .   
                                        "</td></tr>";
                                }
                                echo "</table><br><br>";
                                $connection->close(); //close connection
                                
                            ?>
                            
                        </header>
                    <br>
                    <br>    
                    </div>
                </div>
            </section>

            <br>
            <div style="text-align:center;">
            <h1 style="text-align:center;">Book a Vehicle</h1>
            <br>
            <br>
            <form  method="POST" style="display:inline-block">
            <p style = "display: table-row; line-height:3.5em">Vehicle ID: 
            <span style="display: table-cell;">
            <input type = "text" name = "v_id" style="color:black;" placeholder="Enter Vehicle ID" required />
            </span></p>
            <p style = "display: table-row; line-height:3.5em"> Host ID: 
            <span style="display: table-cell;">
            <input type = "number" name = "h_id" style="color:black;" placeholder="Enter Host ID" required/>
            </span></p>
            <p style = "display: table-row; line-height:3.5em">Booking Start Date: 
            <span style="display: table-cell;">
            <input type = "text" name = "bStart_date" style="color:black;" placeholder="YYYY-MM-DD" required/>
            </span></p>
            <p style = "display: table-row; line-height:3.5em">Booking End Date: 
            <span style="display: table-cell;">
            <input type="text" name="bEndDate" style="color:black;" placeholder="YYYY-MM-DD" required/>
            </span></p>
            <br>
            <br>
            <input type = "submit" name="bookVehicle" value="Submit"/>
        </div>
<br><br> 

<div class="call-to-action text-center">
                            <span class="cta-text tv-white-text position-relative tv-offspace-right-30">Looking to rent a vehicle?</span>
                            <a href="signupcustomer.php" class="button button-fill-white">Sign up now</a>
                            <br><br>
                        
                            
            
            <?php
            //Create a database connection
            if(!empty($_POST)){
            $dbhost="localhost";
            $dbuser="root";
            $dbpass="";
            $dbname="group25";
            $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            
            }
            if (mysqli_connect_errno()){
                die("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
            }

                
                
                if(isset($_POST['bookVehicle'])) { 
                    $c_id = $_SESSION['custid'];
                    $v_id = $_POST['v_id'];
                    $h_id = $_POST['h_id'];
                    $bookingStartDate = $_POST['bStart_date'];
                    $bookingEndDate = $_POST['bEndDate'];
                    
                    
                    
                      
    
                    $sql="INSERT INTO bookings (hosts_id,customer_id,vehicle_id,bookingStart_date,end_date) VALUES (
                        '{$connection->real_escape_string($h_id)}',
                        '{$connection->real_escape_string($c_id['c_id'])}',
                        '{$connection->real_escape_string($v_id)}',
                        '{$connection->real_escape_string($bookingStartDate)}',
                        '{$connection->real_escape_string($bookingEndDate)}'
                        )";
                    
                    $insert=$connection->query($sql);
    
                    if ($insert==TRUE){
                        echo"listed Successfully ";
    
                    } else{
                        die("Error: {$connection->errno}: {$connection->error}");
                    } 
                        
                    
                //}
                }
            
            ?>
            
            </form>
            

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


