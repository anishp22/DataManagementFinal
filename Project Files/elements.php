<!--Template Name: 
File Name: elements.html
Author Name: ThemeVault
Author URI: http://www.themevault.net/
License URI: http://www.themevault.net/license/-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Snoopy</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="images/favicon.png">

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
                            <a href="index.php"><strong>Snoopy</strong> </a>
                        </div>

                        <!-- Toggler/collapsibe Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="fa fa-bars"></span>
                        </button>

                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                            <ul class="navbar-nav custom-nav">
                                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="landing.html">Landing</a></li>
                                <li class="nav-item"><a class="nav-link" href="generic.html">Generic</a></li>
                                <li class="nav-item active"><a class="nav-link" href="elements.html">Elements</a></li>
                            </ul>
                        </div>
                    </div>
                </nav> 
            </header><!-- End Header -->

            <section id="banner" class="banner-area">
                <div class="container inner">
                    <div class="slide-text">
                        <header class="banner-header">
                            <h1>Elements</h1>
                        </header>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit pellentesque<br>
                                nec libero eu velit finibus scelerisque.</p>
                        </div>
                    </div>
                </div>
            </section>

            <form  method="POST">
            <h1>Customer Create Account</h1>
            First Name: <input type = "text" name = "fname" placeholder="Enter First Name" required/><br>
            Last Name: <input type = "text" name = "lname" placeholder="Enter Last Name" required/><br>
            Address: <input type = "text" name = "address" placeholder="Enter Address" required/><br>
            Phone Number: <input type = "tel" name="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="000-000-0000" required/><br>
            Email: <input type="email" name="email" placeholder="email@domain.xy">
            <input type = "submit" name="addCus"/><br><br>   
            
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
            <main id="main" class="main">
                <section id="elements" class="element-page tv-bg-dark tv-padd-tb-80">
                    <div class="container">
                        <div class="element-list">
                            <h3>Text</h3>
                            <p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
                                This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
                                This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
                            <hr />
                            <h1>Heading Level 1</h1>
                            <h2>Heading Level 2</h2>
                            <h3>Heading Level 3</h3>
                            <h4>Heading Level 4</h4>
                            <h5>Heading Level 5</h5>
                            <h6>Heading Level 6</h6>
                            <hr />
                            <h4>Blockquote</h4>
                            <blockquote>Vivamus nec commodo nibh, eget consequat sapien. Nunc porttitor, leo ut consequat gravida, enim dolor posuere velit, et laoreet tellus odio sit amet libero. turpis non fermentum tincidunt, justo nisl pellentesque velit, ut blandit orci diam hendrerit nulla. Suspendisse pellentesque eleifend condimentum. Fusce eget massa</blockquote>
                            <hr />
                        </div>
                        <div class="element-list">
                            <h3>Lists</h3>
                            <h4 class="small-text">Unordered</h4>
                            <ul class="unorder-list">
                                <li>Dolor pulvinar etiam.</li>
                                <li>Sagittis adipiscing.</li>
                                <li>Felis enim feugiat.</li>
                            </ul>

                            <h4 class="small-text">Alternate</h4>
                            <ul class="alt-list">
                                <li>Dolor pulvinar etiam.</li>
                                <li>Sagittis adipiscing.</li>
                                <li>Felis enim feugiat.</li>
                            </ul>
                            <hr />
                            <h4 class="small-text">Ordered</h4>
                            <ol>
                                <li>Dolor pulvinar etiam.</li>
                                <li>Etiam vel felis viverra.</li>
                                <li>Felis enim feugiat.</li>
                                <li>Dolor pulvinar etiam.</li>
                                <li>Etiam vel felis lorem.</li>
                                <li>Felis enim et feugiat.</li>
                            </ol>
                            <hr />
                            <h4>Icons</h4>
                            <div class="icons">
                                <ul class="link-follow clearfix">
                                    <li class="first"><a class="twitter fa fa-twitter" title="Twitter" href=""></a></li>
                                    <li><a class="google fa fa-google-plus" title="Google" href=""></a></li>
                                    <li><a class="facebook fa fa-facebook" title="Facebook" href=""></a></li>
                                    <li><a class="youtube fa fa-youtube" title="Youtube" href=""></a></li>
                                    <li><a class="flickr fa fa-flickr" title="Flickr" href=""></a></li>
                                </ul>
                            </div>
                            <hr />
                            <h4 class="small-text">Actions</h4>
                            <ul class="actions">
                                <li><a href="#" class="button button-trans-white">Default</a></li>
                                <li><a href="#" class="button button-fill-white">Default</a></li>
                                <li><a href="#" class="button button-trans-white">Default</a></li>
                            </ul>
                            <hr />
                        </div>

                        <div class="element-list">
                            <h4>Default</h4>
                            <div class="table-wrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>List One</td>
                                            <td>consectetur adipiscing elit sed mollis.</td>
                                            <td>14.10</td>
                                        </tr>
                                        <tr>
                                            <td>List Two</td>
                                            <td>Nullam tempus id augue at vulputate.</td>
                                            <td>19.99</td>
                                        </tr>
                                        <tr>
                                            <td>List Three</td>
                                            <td>Integer et condimentum interdum velit.</td>
                                            <td>18.93</td>
                                        </tr>
                                        <tr>
                                            <td>List Four</td>
                                            <td>Donec mollis id dui a sagi Vestibulum</td>
                                            <td>15.99</td>
                                        </tr>
                                        <tr>
                                            <td>List Five</td>
                                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                                            <td>30.99</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>100.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <hr />
                            <h4>Alternate</h4>
                            <div class="table-wrapper">
                                <table class="alt-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>List One</td>
                                            <td>consectetur adipiscing elit sed mollis.</td>
                                            <td>14.10</td>
                                        </tr>
                                        <tr>
                                            <td>List Two</td>
                                            <td>Nullam tempus id augue at vulputate.</td>
                                            <td>19.99</td>
                                        </tr>
                                        <tr>
                                            <td>List Three</td>
                                            <td>Integer et condimentum interdum velit.</td>
                                            <td>18.93</td>
                                        </tr>
                                        <tr>
                                            <td>List Four</td>
                                            <td>Donec mollis id dui a sagi Vestibulum</td>
                                            <td>15.99</td>
                                        </tr>
                                        <tr>
                                            <td>List Five</td>
                                            <td>Lorem ipsum dolor sit amet consectetur.</td>
                                            <td>30.99</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>100.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="call-section tv-position-relative tv-bg-dark tv-padd-tb-80">
                    <div class="tv-left-side-background">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 tv-img-side tv-img-left-side">
                            <div class="img-holder tv-bg-cover" style="background-image: url(images/feature-image.jpg);"></div>
                            <div class="tv-overlay tv-light-blue-overlay"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6  col-lg-6 col-md-12 col-sm-12">
                                <div class="tv-section-title text-left">
                                    <h2>Request A call Back</h2>
                                </div>
                                <p class="tv-eng-col-text">Nulla facilisi. Ut feugiat diam vel auctor tempor. Nam tempus volutpat interdum. In blandit vulputate dictum. Praesent facilisis arcu id orci posuere suscipit. Quisque ultricies luctus tortor, et molestie dui maximus id.</p>
                                <ul class="tv-offspace-top-30 tv-white-text">
                                    <li><p class="tv-contact-line">701 Old York Drive Richmond USA. <i class="ti-map tv-yellow-text"></i></p></li>
                                    <li><p class="tv-contact-line"><a href="tel:+1-202-555-0100"> +1-202-555-0100 <i class="ti-mobile tv-yellow-text"></i></a></p></li>
                                    <li><p class="tv-contact-line"><a href="mailto:demo@info.com"> demo@info.com <i class="ti-email tv-yellow-text"></i></a></p></li>
                                </ul>
                            </div>
                            <div class="col-xl-5 offset-xl-1 col-lg-6 col-md-12 col-sm-12">
                                <div class="contact-form">
                                    <form id="contact-form-1">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input class="form-control" id="Name" name="name" placeholder="Name" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <input class="form-control" id="Email" name="email" placeholder="Email" required="" type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control placeholder-fix" name="message" rows="3" placeholder="Your Message"></textarea>
                                        </div>
                                        <p class="form-submit"><input name="submit" id="submit" class="button" value="Send message" type="submit"></p>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main><!--  End Main  -->

            <footer class="tv-footer-bg">
                <div class="tv-footer-top">
                    <div class="container">
                        <div class="row tv-footer-block">
                            <div class="col-md-12 col-footer-bottomspace">
                                <div class="tv-footer-title">about us</div>
                                <div class="tv-footer-content">
                                    <p class="des">
                                        Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet 
                                        doming id quod <br>mazim placerat facer possim assum...
                                        <a href="#">Readmore</a>
                                    </p>
                                    <div class="tv-social-follow">
                                        <label>Follow Us On Social:</label>
                                        <ul class="link-follow">
                                            <li class="first"><a class="twitter fa fa-twitter" title="Twitter" href="https://twitter.com/themevaultnet"></a></li>
                                            <li><a class="google fa fa-google-plus" title="Google" href=""></a></li>
                                            <li><a class="facebook fa fa-facebook" title="Facebook" href="https://www.facebook.com/themevault"></a></li>
                                            <li><a class="youtube fa fa-youtube" title="Youtube" href="https://www.youtube.com/channel/UC1K1bldYw165MVH9P0zxA6A/featured"></a></li>
                                            <li><a class="flickr fa fa-flickr" title="Flickr" href="https://www.flickr.com/photos/152482981@N07/"></a></li>
                                        </ul>
                                    </div>																	 									 									 									 									
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tv-footer-bottom">
                    <div class="container">
                        <!--                    Do not remove Backlink from footer of the template. To remove it you can purchase the Backlink !-->
                        <div class="copyright">&copy; 2021 All right reserved. Designed by <a target="_blank" href="http://www.themevault.net/">ThemeVault</a></div>
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
