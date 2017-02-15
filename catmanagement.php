<?php
    require_once 'isadmin.php';
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>eCommerce - Shopping Cart & Checkout</title>
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
            <?php
                require_once 'header.php'
            ?>

            <hr />

            <section id="main-content" class="clearfix">
                <div id="shopping-cart">
                    <h1>Categories Management</h1>
                    <a href=add-category.php>add new category</a></br></br>
                    <?php
                    require_once 'auto_load.php';
                    $cat=new category();
                    $sup=$cat->selectsup(); 
                    foreach($sup as $sp){
                        echo "<ul><h4>".$sp->name."</h4><a href=add-subcategory.php?id=".$sp->idcategory."&name=".$sp->name.">Add Subcategory</a>
                                                        <a href=update-category.php?id=".$sp->idcategory."&name=".$sp->name."&super=".$sp->idsupercategory.">update</a>
                                                        <a href=control-delete-category.php?id=".$sp->idcategory.">delete</a>";
                        $sub=$cat->selectcatbysupid($sp->idcategory);
                        foreach($sub as $sb){
                            echo "<li>".$sb->name."<a href=update-category.php?id=".$sb->idcategory."&name=".$sb->name."&super=".$sb->idsupercategory.">update</a>
                                                        <a href=control-delete-category.php?id=".$sb->idcategory.">delete</a></li>";
                        }
                        echo "</ul></br>";
                    }
                    $ind=$cat->selectind2();
                    foreach($ind as $in){
                        echo "<h4>".$in->name."</h4><a href=add-subcategory.php?id=".$in->idcategory."&name=".$in->name.">Add Subcategory</a>
                                                    <a href=update-category.php?id=".$in->idcategory."&name=".$in->name."&super=".$in->idsupercategory.">update</a>
                                                    <a href=control-delete-category.php?id=".$in->idcategory.">delete</a>";
                    }
                    
                    
                    ?>
                    
                </div><!-- end new-account -->
            </section><!-- end main-content -->

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

