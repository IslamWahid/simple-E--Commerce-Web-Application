<?php 
    require_once 'auto_load.php'; 
    session_start();

    
    if(isset($_GET['error'])) {
        echo "<p class='error'>".$_GET['error']."</p>";
    }
    if(isset($_GET['message'])) {
        echo "<p class='message'>".$_GET['message']."</p>";
    }

    if(isset($_SESSION['loggeduser'])||isset($_COOKIES['email'])) {
        if(isset($_COOKIES['email'])) {
            $usr = new user();
            $user = $usr->selectbyemail($_COOKIES['email']);
            $_SESSION['loggeduser'] = $user;

        } 
        else {
            $user = $_SESSION['loggeduser'];
        }
        if($user->isadmin == 1) {
            header('Location: users-list.php');
        }
        else {
            header('Location: profile.php');
        }
    }
  

?>






<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>eCommerce - Sign In</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="wrapper">
            <header>
                <section id="top-area">
                    <p>Phone orders: 1-800-0000 | Email us: <a href="mailto:office@shop.com">office@shop.com</a></p>
                </section><!-- end top-area -->
                <section id="action-bar">
                    <div id="logo">
                        <a href="#"><span id="logo-accent">e</span>Commerce</a>
                    </div><!-- end logo -->

                    <nav class="dropdown">
                        <ul>
                            <li>
                                <a href="#">Shop by Category <img src="img/down-arrow.gif" alt="Shop by Category" /></a>
                                <ul>
                                    <li><a href="#">Laptops</a></li>
                                    <li><a href="#">Desktop PC</a></li>
                                    <li><a href="#">Smartphones</a></li>
                                    <li><a href="#">Tablets</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>

                    <div id="search-form">
                        <form action="#" method="get">
                            <input type="search" name="search" placeholder="Search by keyword" class="search">
                            <input type="submit" value="Search" class="search submit">
                        </form>
                    </div><!-- end search-form -->

                    <div id="user-menu">
                        
                        <nav id="signin" class="dropdown">
                            <ul>
                                <li>
                                    <a href="#"><img src="img/user-icon.gif" alt="Sign In" /> Sign In <img src="img/down-arrow.gif" alt="Sign In" /></a>
                                    <ul>
                                        <li><a href="#">Sign In</a></li>
                                        <li><a href="new-account.php">Sign Up</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>

                        <!--
                        <nav class="dropdown">
                            <ul>
                                <li>
                                    <a href="#"><img src="img/user-icon.gif" alt="Andrew Perkins" /> Andrew Perkins <img src="img/down-arrow.gif" alt="Andrew Perkins" /></a>
                                    <ul>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="#">Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>-->
                    </div><!-- end user-menu -->

                    <div id="view-cart">
                        <a href="#"><img src="img/blue-cart.gif" alt="View Cart"> View Cart</a>
                    </div><!-- end view-cart -->
                </section><!-- end action-bar -->
            </header>

            <section id="signin-form">
                <h1>I have an account</h1>
                <form action="signin-process.php" method="post">
                    <p>
                        <img src="img/email.gif" alt="Email Address">
                        <input type="email" name="email" placeholder="Email Address">
                    </p>
                    <p>
                        <img src="img/password.gif" alt="Password">
                        <input type="password" name="password" placeholder="******">
                    </p>
                    <p>
                        <label for="remeber" class="check-label">
                            <input type="checkbox" name="remeber" id="remeber">
                            Remember me
                        </label>
                    </p>

                    <button type="submit" class="secondary-cart-btn">
                        SIGN IN
                    </button>
                </form>
            </section><!-- end signin-form -->
            <section id="signup">
                <h2>I'm a new customer</h2>
                <h3>You can create an account in just a few simple steps.<br>
                    Click below to begin.</h3>

                <a href="new-account.php" class="default-btn">CREATE NEW ACCOUNT</a>
            </section><!--- end signup -->

            <hr />

            <footer>
                <section id="contact">
                    <h3>For phone orders please call 1-800-000. You<br>can also email us at <a href="mailto:office@shop.com">office@shop.com</a></h3>
                </section><!-- end contact -->

                <hr />

                <section id="links">
                    <div id="my-account">
                        <h4>MY ACCOUNT</h4>
                        <ul>
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">Sign Up</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Order History</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                        </ul>
                    </div><!-- end my-account -->
                    <div id="info">
                        <h4>INFORMATION</h4>
                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div><!-- end info -->
                    <div id="extras">
                        <h4>EXTRAS</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div><!-- end extras -->
                </section><!-- end links -->

                <hr />

                <section class="clearfix">
                    <div id="copyright">
                        <div id="logo">
                            <a href="#"><span id="logo-accent">e</span>Commerce</a>
                        </div><!-- end logo -->
                        <p id="store-desc">This is a short description of the store.</p>
                        <p id="store-copy">&copy; 2013 eCommerce. Theme designed by Adi Purdila.</p>
                    </div><!-- end copyright -->
                    <div id="connect">
                        <h4>CONNECT WITH US</h4>
                        <ul>
                            <li class="twitter"><a href="#">Twitter</a></li>
                            <li class="fb"><a href="#">Facebook</a></li>
                        </ul>
                    </div><!-- end connect -->
                    <div id="payments">
                        <h4>SUPPORTED PAYMENT METHODS</h4>
                        <img src="img/payment-methods.gif" alt="Supported Payment Methods">
                    </div><!-- end payments -->
                </section>
            </footer>
        </div><!-- end wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
