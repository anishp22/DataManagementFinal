<!--Template Name: 
File Name: elements.html
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
                                <li class="nav-item"><a class="nav-link" href="vehicles.php">Vehicles</a></li>
                                <li class="nav-item active"><a class="nav-link" href="signupcustomer.php">Sign Up</a></li>
                                <li class="nav-item"><a class="nav-link" href="hostlogin.php">Log In</a></li>
                            </ul>
                        </div>
                    </div>
                </nav> 
            </header><!-- End Header -->

            <section id="banner" class="banner-area">
                <div class="container inner">
                    <div class="slide-text">
                        <header class="banner-header">
                            <h1>Sign Up</h1>
                        </header>
                        <div class="content">
                            <p>Looking to rent a car? Sign up with us below.</p>
                        </div>
                    </div>
                </div>
            </section>

            <br>
            <div style="text-align:center;">
             <h1 style="text-align:center;">Are you a customer? Create your account below</h1>
                <br>
                 <br>
                 <form  method="POST" style="display:inline-block;">
                    <p style = "display: table-row; line-height:3.5em">First Name:
                    <span style="display: table-cell;">
                        <input type = "text" style="color:black;" name = "fname" placeholder="Enter First Name" required/>
                    </span></p>
                    <p style = "display: table-row; line-height:3.5em">Last Name: 
                    <span style="display: table-cell;">
                        <input type = "text" style="color:black;" name = "lname" placeholder="Enter Last Name" required/>
                    </span></p>
                    <p style = "display: table-row; line-height:3.5em">Address: 
                    <span style="display: table-cell;">
                        <input type = "text" style="color:black;" name = "address" placeholder="Enter Address" required/>
                    </span></p>
                    <p style = "display: table-row; line-height:3.5em">Phone Number:
                    <span style="display: table-cell;">
                    <input type = "tel" style="color:black;" name="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="000-000-0000" required/>
                    </span></p>
                    <p style = "display: table-row; line-height:3.5em">Email: 
                    <span style="display: table-cell;">
                    <input type="email"  style="color:black;"name="email" placeholder="email@domain.xy">
                    </span></p>
                 <br>
                <br>
            <input type = "submit" name="addCus"/><br><br>   
            </div>
            <br>
            <br>
            <br>
            

            <div class="call-to-action text-center">
                            <span class="cta-text tv-white-text position-relative tv-offspace-right-30">Looking to put your vehicle up for rent?</span>
                            <a href="signuphost.php" class="button button-fill-white">Sign up now</a>
                        </div>

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

            
            if(isset($_POST['addCus'])) { 
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $address = $_POST['address'];
                $telephone = $_POST['telephone']; 
                $email = $_POST['email'];
                
                
                  

                $sql="INSERT INTO customers (fname,lname,address,telephone,email) VALUES (
                    '{$connection->real_escape_string($fname)}',
                    '{$connection->real_escape_string($lname)}',
                    '{$connection->real_escape_string($address)}',
                    '{$connection->real_escape_string($telephone)}',
                    '{$connection->real_escape_string($email)}'
                )";
                $insert=$connection->query($sql);

                if ($insert==TRUE){
                    echo"Registered Successfully ";

                } else{
                    die("Error: {$connection->errno}: {$connection->error}");
                } 

                $connection->close(); //close connection
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
