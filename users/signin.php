<?php
  require_once "../config/database.php";
  require_once "view/system/config.php";
  require_once "view/layout/header.php";
  require_once "view/layout/footer.php";

session_start();
if(isset($_SESSION['user_id_SLSC']))
{
    header('Location: dashboard.php');
    $sign_in_value_HTML="<a href=''><i class='fal fa-home'></i>Dashboard</a>";
}else{
    $sign_in_value_HTML="<a href='signin.php'><i class='fal fa-sign-in-alt'></i> Sign In</a>";
}

if (isset ($_POST['submit']) ) {  

    if ($stmt = $conn->prepare('SELECT  user_id, blocked, password FROM users WHERE email = ?')) {
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result( $user_id, $blocked, $password);
            $stmt->fetch();
            $post_password=md5($_POST['password']);
            if ($post_password== $password) {
                if ($blocked== "No") {
                    session_regenerate_id();
                    $_SESSION['user_id_SLSC']=$user_id;
                    $_SESSION['email'] = $_POST['email'];
                    header('Location: dashboard.php');
                }else{

                    echo "<script>alert('Blocked');document.location='index.php'</script>";
                }
               
            } else {
                echo "<script>alert('Incorrect Password');document.location='signin.php'</script>";
             //   header('Location: index.php');
            }
        } else {
           echo "<script>alert('Incorrect Email Address');document.location='signin.php'</script>";
           // header('Location: index.php');
        }
    
        $stmt->close();
    }

    $password=$_POST['password'];
    $sql = "Select * from users where email = '" . $_POST["email"] . "'";

}

html_header("SignIn");

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
                        <h4 class="sing-in-title"><i class="fal fa-sign-in-alt"></i> Sign in.</h4>
                        <p class="text">sign in to continue </p>

                        <div class="sing-in-form-wrapper">
                            <form action="signin.php" method="POST">
                                <div class="single-form mt-45">
                                    <label>Email</label>
                                    <input name="email" type="email" placeholder="Email :" required>
                                </div>
                                <div class="single-form mt-45">
                                    <label>Password</label>
                                    <input name="password" type="password" placeholder="********" required>
                                </div>
                                
                                <!-- single-form -->

                                <div class="single-form mt-45">
                                    <button type="submit" name="submit" value="submit" class="main-btn">Login Now</button>
                                </div>
                                <!-- single-form -->
                            </form>
                            <div class="new-user text-center">
                                <p class="text"><a href="signup.php">Register new account?</a></p>
                            </div>
                        </div>
                        <!-- sing in form wrapper -->
                    </div>
                    <!-- sing in form areasing-in-form-area -->
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