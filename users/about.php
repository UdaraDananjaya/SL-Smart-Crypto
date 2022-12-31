<?php
  require_once "../config/database.php";
  require_once "view/system/config.php";
  require_once "view/layout/header.php";
  require_once "view/layout/footer.php";

session_start();
if(isset($_SESSION['user_id_SLSC']))
{
    $sign_in_value_HTML="<a href='dashboard.php'><i class='fal fa-home'></i>Dashboard</a>";
}else{
    $sign_in_value_HTML="<a href='signin.php'><i class='fal fa-sign-in-alt'></i> Sign In</a>";
}

html_header("About Us");
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
                              <li class="active" aria-haspopup="true"><a href="about.php">About Us </a></li>
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
            <h4 class="title">About Us</h4>
            <p>Search from over 2000+ Active Ads in 12+ Categories for Free</p>
        </div>
    </div>
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section class="about-area pt-70 pb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-image mt-50">
                    <img src="img/about.jpg" alt="about">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content mt-50">
                    <h6 class="sub-title">About Us</h6>
                    <h3 class="main-title">Sri lanka Smart Crypto.</h3>
                    <p>SLSC is an advertising platform where you can display your advertisements according to a certain procedure in our site. You can interact with other users through our platform and get your best deals with the use of our "here." If you'd like to get in touch with us, go to  "contact us."</p>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== ABOUT PART ENDS ======-->
<!--====== BLOG PART START ======-->

<section class="blog-area pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center pb-15">
                    <h2 class="main-title">Letest News</h2>
                    <br>
                </div>
            </div>
        </div>
        <div class="row">
<div style="height:374px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F; padding: 0px; margin: 0px; width: 100%;"><div style="height:354px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=5&pref_coin_id=1505&graph=yes" width="100%" height="350px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://www.claringtingatlana.com" target="_blank" style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size:11px">Powered by</a> @Claringting Atlana</div></div>    
        </div>
    </div>
</section>

<!--====== BLOG PART ENDS ======-->

<!--====== CATEGORY PART START ======-->

<section class="category-area pt-115 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="category-title text-center pb-25">
                    <h4 class="title">Here, you are able to see all the currencies which are available in this site.</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/BITCOIN.png" alt="Icon">
                        <h6 class="title">BITCOIN</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/ETHEREUM.png" alt="Icon">
                        <h6 class="title">ETHEREUM</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/TETHER.png" alt="Icon">
                        <h6 class="title">TETHER</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/BINANCE_COIN.png" alt="Icon">
                        <h6 class="title">BINANCE COIN</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/DOGECOIN.png" alt="Icon">
                        <h6 class="title">DOGECOIN</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/BITCOIN_CASH.png" alt="Icon">
                        <h6 class="title">BITCOIN CASH</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/LITECOIN.png" alt="Icon">
                        <h6 class="title">LITECOIN</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/TRON.png" alt="Icon">
                        <h6 class="title">TRON</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/XRP.png" alt="Icon">
                        <h6 class="title">XRP</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/XLM.png" alt="Icon">
                        <h6 class="title">XLM</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/DASH.png" alt="Icon">
                        <h6 class="title">DASH</h6>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
                <div class="single-category text-center mt-30">
                    <a>
                        <img src="img/icon/ESO.png" alt="Icon">
                        <h6 class="title">ESO</h6>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== CATEGORY PART ENDS ======-->

EOT;
html_footer();
?>