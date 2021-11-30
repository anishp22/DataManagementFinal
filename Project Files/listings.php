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
                            <h1>Bookings of Your Car</h1>
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

                                $h_id = $_SESSION['hostid'];
                                //print($h_id['h_id']);
                                $sql = "SELECT * FROM bookings WHERE hosts_id = '$h_id[h_id]'";
                                $row=$connection->query($sql);
                                echo "<table><tr><th>Booking ID</th><th>Host ID</th><th>Customer ID</th><th>Vehicle ID</th><th>Start Date</th><th>End Date</th></tr>";
                                foreach ($connection->query($sql) as $row){
                                    echo"<tr><td>" . $row['b_id'] . 
                                        "</td><td>" . $row['hosts_id'] .
                                        "</td><td>" . $row['customer_id'] .
                                        "</td><td>" . $row['vehicle_id'] .
                                        "</td><td>" . $row['start_date'] .
                                        "</td><td>" . $row['end_date'] .   
                                        "</td></tr>";
                                }
                                echo "</table><br><br>";
                                $connection->close(); //close connection

                            ?>
                        </header>
                        <div class="content">
                            <p>Due to COVID 19, the government has placed many restrictions. Don't let your car sit in your garage and catch dust,
                                rent it out and make a profit!
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <br>
            <div style="text-align:center;">
            <h1 style="text-align:center;">List a New Vehicle</h1>
            <br>
            <br>
            <form  method="POST" style="display:inline-block">
            <p style = "display: table-row; line-height:3.5em">Vehicle ID: 
            <span style="display: table-cell;">
            <input type = "text" name = "v_id" style="color:black;" placeholder="Enter Vehicle ID" required />
            </span></p>
            <p style = "display: table-row; line-height:3.5em"> Brand: 
            <span style="display: table-cell;">
            <input type = "text" name = "brand" style="color:black;" placeholder="Enter Brand" required/>
            </span></p>
            <p style = "display: table-row; line-height:3.5em">Model: 
            <span style="display: table-cell;">
            <input type = "text" name = "model" style="color:black;" placeholder="Enter Model" required/>
            </span></p>
            <p style = "display: table-row; line-height:3.5em">Year: 
            <span style="display: table-cell;">
            <input type="number" name="v_year" style="color:black;" placeholder="Enter Vehicle Year">
            </span></p>
            <p style = "display: table-row; line-height:3.5em"> Type: 
            <span style="display: table-cell;">
            <input type="text" name="v_type" style="color:black;" placeholder="Enter Vehicle Type">
            </span></p>
            <p style = "display: table-row; line-height:3.5em"> Location: 
            <span style="display: table-cell;">
            <input type="text" name="location" style="color:black;" placeholder="Enter Vehicle City">
            </span></p>
            <p style = "display: table-row; line-height:3.5em"> Rental Cost: 
            <span style="display: table-cell;">
            <input type="number" name="daily_cost" style="color:black;" placeholder="Enter Daily Rate">
            </span></p>
            <br>
            <br>
            <input type = "submit" name="addVehicle" value="Submit"/>
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

            
                
                if(isset($_POST['addVehicle'])) { 
                    $v_id = $_POST['v_id'];
                    $brand = $_POST['brand'];
                    $model = $_POST['model'];
                    $v_year = $_POST['v_year'];
                    $v_type = $_POST['v_type']; 
                    $location = $_POST['location'];
                    $daily_cost = $_POST['daily_cost'];
                    
                    
                      
    
                    $sql="INSERT INTO vehicles (v_id,hosts_id,brand,model,v_year,v_type,location,daily_cost) VALUES (
                        '{$connection->real_escape_string($v_id)}',
                        '{$connection->real_escape_string($h_id['h_id'])}',
                        '{$connection->real_escape_string($brand)}',
                        '{$connection->real_escape_string($model)}',
                        '{$connection->real_escape_string($v_year)}',
                        '{$connection->real_escape_string($v_type)}',
                        '{$connection->real_escape_string($location)}',
                        '{$connection->real_escape_string($daily_cost)}'
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


