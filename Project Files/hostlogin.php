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
            <header id="header" class="alt">
                <nav class="navbar navbar-main navbar-expand-md">
                    <div class="container-fluid">
                        <div class="logo">
                            <a href="index.php"><strong>CarShare</strong> </a>
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
                                <li class="nav-item"><a class="nav-link" href="vehicles.html">Vehicles</a></li>
                                <li class="nav-item active"><a class="nav-link" href="signupcustomer.php">Sign Up</a></li>
                            </ul>
                        </div>
                    </div>
                </nav> 
            </header><!-- End Header -->

            

            <br>
            <div style="text-align:center;">
            <br><br><br>
            <h1 style="text-align:center;">Host Login</h1>
            
            <br>
            <form  method="POST" style="display:inline-block">
            <p style = "display: table-row; line-height:3.5em">Email: 
            <span style="display: table-cell;">
            <input type = "email" name = "email" style="color:black;" placeholder="Enter Email" required />
            </span></p>
            <p style = "display: table-row; line-height:3.5em">Telephone: 
            <span style="display: table-cell;">
            <input type = "telephone" name = "telephone" style="color:black;" placeholder="Enter Phone #" required />
            
            
            <br>
            <input type = "submit" name="login" value="Login"/>
        </div>
<br><br>

<div class="call-to-action text-center">
                            <span class="cta-text tv-white-text position-relative tv-offspace-right-30">Customer Login</span>
                            <a href="customerlogin.php" class="button button-fill-white">Sign up now</a>
                            <br>
                            <br>
                            <span class="cta-text tv-white-text position-relative tv-offspace-right-30">Looking to rent a vehicle?</span>
                            <a href="signupcustomer.php" class="button button-fill-white">Sign up now</a>
                            <br><br>
                            
                            
                        </div>
            
                        <?php
                        session_start();
                        $dbhost="localhost";
                        $dbuser="root";
                        $dbpass="";
                        $dbname="group25";
                        $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                        
                        if (mysqli_connect_errno()){
                            die("Database connection failed: ".mysqli_connect_error()."(".mysqli_connect_errno().")");
                        }
                        
                        
                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                            // email and telephone sent from form 
                            
                            $myemail = mysqli_real_escape_string($connection,$_POST['email']);
                            $mytelephone = mysqli_real_escape_string($connection,$_POST['telephone']); 
                            //$hostid  = mysqli_real_escape_string($connection,$_POST['h_id'] );
                            
                            $sql = "SELECT h_id FROM hosts WHERE email = '$myemail' and telephone = '$mytelephone'";
                            $result = mysqli_query($connection,$sql);
                            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                            //$active = $row['active'];
                            
                            $count = mysqli_num_rows($result);
                            
                            // If result matched $myemail and $mytelephone, table row must be 1 row
                                
                            if($count == 1) {
                                //echo($result);
                                //session_register("myemail");
                                $_SESSION['myemail'] = $myemail;
                                $_SESSION['login_user'] = $mytelephone;
                                $_SESSION['hostid']= $row;
                                
                                header("location: listings.php"); //should direct to listings.php
                            }else {
                                $error = "Your Email or Telephone is invalid";
                                echo($error);
                            }
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
