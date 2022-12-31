<?php
  require_once "../config/database.php";
  require_once "view/system/config.php";
  require_once "view/layout/header.php";
  require_once "view/layout/footer.php";

$mail_err="";
if (isset ($_GET['err']) ) {  
    if ($_GET['err']=="mail")
    {
        $mail_err="Email exists, please choose another!";
    }
}

session_start();
if(isset($_SESSION['user_id_SLSC']))
{
    header('Location: dashboard.php');
    $sign_in_value_HTML="<a href=''><i class='fal fa-home'></i>Dashboard</a>";
}else{
    $sign_in_value_HTML="<a href='signin.php'><i class='fal fa-sign-in-alt'></i> Sign In</a>";
}

html_header("Sign-up");

echo<<<EOT


    <!--====== HEADER PART START ======-->
    <section class="header-area">
    <div class="header-top header-top-2">
        <div class="container">
            <div class="header-top-wrapper d-flex justify-content-center justify-content-md-between align-items-center">
                <div class="header-top-left d-none d-md-block">
                    <ul class="header-meta">
                        <li><a href="tel:$mobile""><i class="fal fa-phone"></i> $mobile</a></li>
                        <li><a href="mailto:$email"><i class="fal fa-envelope"></i> $email</a></li>
                    </ul>
                </div>
                <div class="header-top-right">
                    <div class="header-follow d-flex align-items-center">
                        <ul class="social">
                            <li><span>Follow Us:</span></li>
                            <li><a href="$fblink"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="$telegramlink"><i class="fab fa-telegram"></i></a></li>
                        </ul>
                        <ul class="header-login">
                            <li>$sign_in_value_HTML</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-menu header-menu-1">

        <div class="horizontal-header d-lg-none">
            <div class="container">
                <div class="horizontal-header d-flex justify-content-between align-items-center">
                    <a href="javascript:void(0)" id="horizontal-navtoggle" class="navtoggle"><i class="fal fa-bars"></i></a>

                    <span class="smllogo">
                        <img src="img/logo.png" alt="logo" width="120">
                    </span>

                    <a href="tel:$mobile" class="callusbtn"><i class="fal fa-phone" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>

        <div class="horizontal-main">
            <div class="container">
                <div class="horizontal-wrapper d-flex justify-content-between align-items-center">
                    <div class="desktoplogo">
                        <a href="index.php">
                            <img src="img/logo.png" alt="logo">
                        </a>
                    </div>

                    <!--Nav-->
                    <nav class="horizontalMenu">
                        <ul class="horizontalMenu-list">
                            <li aria-haspopup="true"><a href="home.php">Home</a></li>
                            <li aria-haspopup="true"><a href="about.php">About Us </a></li>
                            <li aria-haspopup="true"><a href="contact.php">Contact Us</a></li>

                            <li aria-haspopup="true" class="d-lg-none"> <a class="main-btn" href="adposts.php">Post Free Ad</a> </li>
                        </ul>
                    </nav>

                    <div class="horizontal-btn d-none d-lg-block">
                        <a href="adposts.php" class="main-btn">Post Free Ads</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!--====== HEADER PART ENDS ======-->

    <!--====== PAGE BANNER PART START ======-->

    <section class="page-banner">
        <div class="container">
            <div class="page-banner-content text-center">
                <h4 class="title">Seller Author</h4>
                <p>Search from over 2000+ Active Ads in 29+ Categories for Free</p>
            </div>
        </div>
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->


    <!--====== SING IN PART START ======-->

    <section class="sing-in-area pt-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="sing-in-form-area mt-45 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                        <h4 class="sing-in-title"><i class="fal fa-user"></i> Sign <span>Up.</span></h4>
                        <p class="text">One account for everything SLSC </p>

                        <div class="sing-in-form-wrapper">
                            <form action="controller/signup.php" method="POST">
                                <div class="single-form mt-45">
                                    <label>User name</label>
                                    <input type="text" name="name" placeholder="Your Name :" required>
                                </div>

                                <div class="single-form mt-45">
                                    <label>Email</label>
                                    <input type="email" id="email" name="email" placeholder="Email :" required>
                                   <p style=color:red>$mail_err </p> 
                                </div>
                                <div class="single-form mt-45">
                                    <label>Gender</label>
                                    <input type="text" name="gender" list="genders" placeholder="Gender :" required>
                                    <datalist id="genders">
                                         <option>Male</option> 
                                         <option>Female</option> 
                                    </datalist>
                                </div>
                                <div class="single-form mt-45">
                                    <label>Country</label>
                                    <input type="text" name="country" list="countrys" placeholder="Your Country :" required>
                                    <datalist id="countrys">
                                         <option>Sri Lanka</option> 
                                    </datalist>
                                </div>
                                <div class="single-form mt-45">
                                    <label>Mobile Number</label>
                                    <input type="tel" name="phone" placeholder="077-12-34-567" required>
                                </div>
                                <div class="mt-45">
                                    <input type="checkbox" name="hide_p" id="hide_p" required>
                                    <label for="hide_p"></label> <span>Hide My Number</span>
                                </div>

                                <div class="single-form mt-45">
                                    <label>Password</label>
                                    <input name="password" type="password" placeholder="********" required>
                                </div>

                                <div class="single-form mt-15">

                                </div>

                                <div class="mt-45 d-sm-flex justify-content-between">
                                    <div class="checkbox">
                                        <input type="checkbox" name="agree" id="agree" required>
                                        <label for="checkbox1"></label> <span>I agree to the <a href="#">terms and policy</a>.</span>
                                    </div>
                                </div>

                                <div class="single-form mt-45">
                                    <button type="submit" name="submit" value="submit" class="main-btn">Sign Up !</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>

    <!--====== SING IN PART ENDS ======-->

    <!--====== BRAND PART START ======-->

    <section class="brand-area pt-90 pb-120">
        <div class="container">
            <div class="brand-wrapper-2 d-flex flex-wrap justify-content-center">
                <div class="brand-col-2">
                    <div class="single-brand-2">
                        <img src="img/icon/BITCOIN.png" alt="Icon">
                        <h6 class="title">BITCOIN</h6>
                    </div>
                </div>
                <div class="brand-col-2">
                    <div class="single-brand-2">
                        <img src="img/icon/ETHEREUM.png" alt="Icon">
                        <h6 class="title">ETHEREUM</h6>
                    </div>
                </div>
                <div class="brand-col-2">
                    <div class="single-brand-2">
                        <img src="img/icon/TETHER.png" alt="Icon">
                        <h6 class="title">TETHER</h6>
                    </div>
                </div>
                <div class="brand-col-2">
                    <div class="single-brand-2">
                        <img src="img/icon/BINANCE_COIN.png" alt="Icon">
                        <h6 class="title">BINANCE COIN</h6>
                    </div>
                </div>
                <div class="brand-col-2">
                    <div class="single-brand-2">
                        <img src="img/icon/DOGECOIN.png" alt="Icon">
                        <h6 class="title">DOGECOIN</h6>
                    </div>
                </div>
                <div class="brand-col-2">
                    <div class="single-brand-2">
                        <img src="img/icon/BITCOIN_CASH.png" alt="Icon">
                        <h6 class="title">BITCOIN CASH</h6>
                    </div>
                </div>
                <div class="brand-col-2">
                    <div class="single-brand-2">
                        <img src="img/icon/LITECOIN.png" alt="Icon">
                        <h6 class="title">LITECOIN</h6>
                    </div>
                </div>
                <div class="brand-col-2">
                    <div class="single-brand-2">
                        <img src="img/icon/TRON.png" alt="Icon">
                        <h6 class="title">TRON</h6>
                    </div>
                </div>
                <div class="brand-col-2">
                    <div class="single-brand-2">
                        <img src="img/icon/XRP.png" alt="Icon">
                        <h6 class="title">XRP</h6>
                    </div>
                </div>
                <div class="brand-col-2">
                    <div class="single-brand-2">
                        <img src="img/icon/XLM.png" alt="Icon">
                        <h6 class="title">XLM</h6>
                    </div>
                </div>
                <div class="brand-col-2">
                    <div class="single-brand-2">
                        <img src="img/icon/DASH.png" alt="Icon">
                        <h6 class="title">DASH</h6>
                    </div>
                </div>
                <div class="brand-col-2">
                    <div class="single-brand-2">
                    <img src="img/icon/ESO.png" alt="Icon">
                    <h6 class="title">ESO</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== BRAND PART ENDS ======-->
EOT;

html_footer();

?>