<?php
  require_once "../config/database.php";
  require_once "view/system/config.php";
  require_once "view/layout/header.php";
  require_once "view/layout/footer.php";

session_start();
  if(isset($_SESSION['user_id_SLSC']))
  {
  }else{
    header('Location: home.php');
  }

  
  $sql = "SELECT `name`,`country` FROM `users` WHERE `user_id`='".$_SESSION['user_id_SLSC']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$SQL_user_name= $row["name"];
$SQL_user_country= $row["country"];

html_header("Dashboard");

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
                        <li><a href=''><i class='fal fa-home'></i>Dashboard</a></li>
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
                <h4 class="title">Dashboard</h4>
                <p>Search from over 2000+ Active Ads in 29+ Categories for Free</p>
            </div>
        </div>
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== PROFILE PART START ======-->

    <section class="profile-area pt-70 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="profile-sidebar pt-20">
                        <div class="profile-card mt-30">
                            <div class="profile-sidebar-title">
                                <h4 class="title">My Profile</h4>
                            </div>
                            <div class="profile-user text-center">
                                <div class="profile-author">
                                    <img src="img/user.png" alt="">
                                </div>
                                <div class="profile-author-name">
                                    <h4 class="name"><a>$SQL_user_name</a></h4>
                                    <span class="sub-title">$SQL_user_country</span>
                                </div>
                            </div>
                            <div class="profile-link">
                                <ul>
                                    <li><a class="active" href="dashboard.php"><i class="fal fa-tachometer-alt"></i> Dashboard</a></li>
                                    <li><a href="my-ads.php"><i class="fal fa-gem"></i> My Ads</a></li>
                                    <li><a href="profile.php"><i class="fal fa-user"></i> Profile</a></li>
                                    <li><a href="changepassword.php"><i class="fal fa-unlock-alt"></i> Change Password</a></li>
                                    <li><a href="logout.php"><i class="fal fa-sign-out"></i> Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="profile-dashboard mt-50">
                        <div class="profile-sidebar-title">
                            <h4 class="title">My Dashboard</h4>
                        </div>
                        <div class="profile-dashboard-wrapper">
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <iframe height="480" width="100%" src="https://ssltvc.forexprostools.com/?pair_ID=945629&height=480&width=780&interval=300&plotStyle=area&domain_ID=1&lang_ID=1&timezone_ID=20"></iframe>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <script src="https://widgets.coingecko.com/coingecko-coin-compare-chart-widget.js"></script>
                                    <coingecko-coin-compare-chart-widget coin-ids="bitcoin,ethereum,tether,binancecoin,dogecoin,bitcoin-cash,litecoin,tron,xrp-bep2,almace-shards,dash,pesobit" currency="usd" locale="en" type="market_cap"></coingecko-coin-compare-chart-widget>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <iframe src="https://www.widgets.investing.com/crypto-currency-rates?theme=lightTheme&roundedCorners=true&pairs=945629,997650,1001803,1010773,940810,1010776,1031068,1014071,1010883,1010785,1058450,1070733" width="100%" height="500px" frameborder="0" allowtransparency="true"
                                        marginwidth="0" marginheight="0"></iframe>

                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== PROFILE PART ENDS ======-->
EOT;

    html_footer();
    
    ?>