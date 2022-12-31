<?php

require_once "../config/database.php";

function html_footer() {
    $dom = new DOMDocument();
$dom->load('../admin/view/system/setup.xml');
$root = $dom->documentElement;
$results = $root->getElementsByTagName( 'data' );
foreach( $results  as $result){

    foreach( $result->getElementsByTagName('email') as $email ){
    $email=$email->nodeValue;
    }
    foreach( $result->getElementsByTagName('url') as $url ){
    $url=$url->nodeValue;
    }
    foreach( $result->getElementsByTagName('mobile') as $mobile ){
    $mobile=$mobile->nodeValue;
    }
    foreach( $result->getElementsByTagName('fblink') as $fblink ){
    $fblink=$fblink->nodeValue;
    }
    foreach( $result->getElementsByTagName('telegramlink') as $telegramlink ){
        $telegramlink=$telegramlink->nodeValue;
        }
    } 

echo <<<EOT

    <!--====== FOOTER PART START ======-->

    <footer class="footer-area">
        <div class="footer-top pt-20 pb-50">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div class="footer-follow d-flex align-items-center justify-content-center mt-25">
                            <div class="form-group">
                                <h5 class="title">Newsletter &#160;</h5>
                            </div>
                        
                            <div class="form-group">
                        <form action="controller/subscriber.php" method="POST">
                                <input type="email" name="e-mail" class="form-control" placeholder="Your email id">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="sub" value="Subscribed" class="btn btn-primary">subscribe</button>
                        </form>
                            </div>   
                        
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-6">
                        <div class="footer-follow d-flex align-items-center justify-content-center mt-25">
                            <h5 class="title">Follow Us</h5>
                            <ul class="social">
                                <li><a href="$fblink"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="$telegramlink"><i class="fab fa-telegram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-widget pt-20 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-about mt-50">
                            <a href="#">
                                <img src="img/logo-2.png" alt="Logo">
                            </a>
                            <p>SLSC is an advertising platform where our users are able to see all our categorized ads and connect with other users.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">About Us</h4>
                            <div class="link-wrapper d-flex flex-wrap">
                                <div class="link">
                                    <ul>
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="#">Documentation</a></li>
                                        <li><a href="ads.php">Our Services</a></li>
                                        <li><a href="#">Terms & Conditions</a></li>
                                    </ul>
                                </div>
                                <div class="link">
                                    <ul>
                                        <li><a href="signin.php">Get Started Us</a></li>
                                        <li><a href="contact.php">Contact Us</a></li>
                                        <li><a href="signup.php">Join With Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-4">
                        <div class="footer-link mt-45">
                            <h4 class="footer-title">Site MAP</h4>
                            <ul class="link">
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="signin.php">Sign In</a></li>
                                <li><a href="signup.php">Sign Up</a></li>
                                <li><a href="ads.php">All ADS</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-8">
                        <div class="footer-contact mt-45">
                            <h4 class="footer-title">Communication</h4>
                            <div class="single-contact d-flex align-items-center mt-25">
                                <div class="contact-icon">
                                    <i class="fal fa-phone"></i>
                                </div>
                                <div class="contact-content media-body">
                                    <p>Call Us <br> $mobile</p>
                                </div>
                            </div>
                            <div class="single-contact d-flex align-items-center mt-25">
                                <div class="contact-icon">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <div class="contact-content media-body">
                                    <p>Send Message <br> $email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-text pt-15 pb-30">
            <div class="container">
                <div class="footer-copyright-text-wrapper text-center d-md-flex align-items-center justify-content-between">
                    <div class="footer-copyright mt-15">
                        <p>Powered  by <a href="https://www.claringtingatlana.com/">@Claringting Atlana</a>.All Rights Reserved </p>
                    </div>
                    <div class="footer-text mt-15">
                        <ul class="link">
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== GO TO TOP PART START ======-->

    <div class="go-top-area">
        <div class="go-top-wrap">
            <div class="go-top-btn-wrap">
                <div class="go-top go-top-btn">
                    <i class="fal fa-angle-double-up"></i>
                    <i class="fal fa-angle-double-up"></i>
                </div>
            </div>
        </div>
    </div>

    <!--====== jquery js ======-->
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>

    <!--====== Slick js ======-->
    <script src="js/slick.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="js/jquery.magnific-popup.min.js"></script>

    <!--====== Validator js ======-->
    <script src="js/validator.min.js"></script>

    <!--====== Wow js ======-->
    <script src="js/wow.min.js"></script>

    <!--====== Menu Horizontal js ======-->
    <script src="js/menu_horizontal.js"></script>

    <!--====== Nice Select js ======-->
    <script src="js/jquery.nice-select.min.js"></script>

    <!--====== Jquery ui js ======-->
    <script src="js/jquery-ui.min.js"></script>

    <!--====== Main js ======-->
    <script src="js/main.js"></script>


</body>

</html>
EOT;
}
?>
