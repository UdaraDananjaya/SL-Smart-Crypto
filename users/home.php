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

  html_header("Welcome");

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
                                <li class="active" aria-haspopup="true"><a href="home.php">Home</a></li>
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

    <!--====== HEADER BANNER PART START ======-->

    <section class="header-banner header-banner-1 bg_cover d-flex align-items-center" style="background-image: url(img/header-1.jpg)">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="header-content text-center">
                        <h2 class="main-title">Welcome to SLSC  </h2>
                        <h3 class="sub-title">This is an advertising platform.<br> You have the opportunity to reach millions of users through this platforms.</h3>

                        <form action="ads.php">
                            <div class="header-form d-flex flex-wrap">
                                <div class="single-form">
                                    <select required name="wallet" id="wallet" >
                                        <option value="" disabled selected>Select Wallet -</option>
                                        <option value="SO">Skrill Only</option>
                                        <option value="BO">Binance Only</option>
                                        <option value="SB"> Skrill & Binance</option>
                                    </select>
                                </div>
                                <div class="single-form">
                                    <select required name="loc" id="loc" class="form-control">
                                        <option value="" disabled selected>Select Location -</option>
                                        <option value="Ampara">Ampara</option>
                                        <option value="Anuradhapura">Anuradhapura</option>
                                        <option value="Badulla">Badulla</option>
                                        <option value="Batticaloa">Batticaloa</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Galle">Galle</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Hambantota">Hambantota</option>
                                        <option value="Jaffna">Jaffna</option>
                                        <option value="Kalutara">Kalutara</option>
                                        <option value="Kandy">Kandy</option>
                                        <option value="Kegalle">Kegalle</option>
                                        <option value="Kilinochchi">Kilinochchi</option>
                                        <option value="Kurunegala">Kurunegala</option>
                                        <option value="Mannar">Mannar</option>
                                        <option value="Matale">Matale</option>
                                        <option value="Matara">Matara</option>
                                        <option value="Monaragala">Monaragala</option>
                                        <option value="Mullaitivu">Mullaitivu</option>
                                        <option value="Nuwara_Eliya">Nuwara Eliya</option>
                                        <option value="Polonnaruwa">Polonnaruwa</option>
                                        <option value="Puttalam">Puttalam</option>
                                        <option value="Ratnapura">Ratnapura</option>
                                        <option value="Trincomalee">Trincomalee</option>
                                        <option value="Vavuniya">Vavuniya</option>
                                    </select>
                                </div>
                                <div class="single-form">
                                    <select required name="type" id="type" class="form-control">
                                        <option value="" disabled selected>Select Currency-</option>
                                        <option value="1">BITCOIN</option>
                                        <option value="2">ETHEREUM</option>
                                        <option value="3">TETHER</option>
                                        <option value="4">BINANCE COIN</option>
                                        <option value="5">DOGECOIN</option>
                                        <option value="6">BITCOIN CASH</option>
                                        <option value="7">LITECOIN</option>
                                        <option value="8">TRON</option>
                                        <option value="9">XRP</option>
                                        <option value="10">XLM</option>
                                        <option value="11">DASH</option>
                                        <option value="12">ESO</option>
                                    </select>

                                     <button title="All field are required" name="find" value="set" type="submit"><i class="fal fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== HEADER BANNER PART ENDS ======-->

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



<!--====== FAQ PART START ======-->

    <section class="faq-area pt-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="faq-accordion pt-30">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">SLSC - Sri Lanka Smart Crypto</a>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                                <div class="card-body">
                                    <p>SLSC is an advertising platform where you can access the currencies  you wish to buy. You have the opportunity to reach millions of users here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Why choose us?</a>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>In this site, you may find beneficial facts which would influence you to make the decision of choosing our site for advertising purposes. The users have the opportunity to reach many other users who interact with our site for advertising. Crypto currency has become an important online money making business with the advancement of technology and the demand of people. Therefore, all the facilities are available for the transaction to be done more easily and quickly. Users have the ability to reach the top categories as well along with prices. Our goal is to give the best services for the users.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How to commence using this SLSC platform?</a>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p> :-: &nbsp; Sign up with our site. <br> :-: &nbsp; Post your ad. <br> :-: &nbsp; Start your business.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">How do I post an Ad?</a>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p>Posting an ad on SLSC is easy. Simply click on the button "Post your Ad" on the top right on the navigation bar, and follow the instructions as given. If you have not logged in yet, you will have to create an account first as the first step of posting your ad.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="faq-help mt-50 text-center">
                    <h5 class="title">Still need help for any problem?</h5>
                    <p>We have provided our email address and other links for you to raise any questions you have regarding our site.</p>
                    <a href="contact.php" class="main-btn">Free Get More <i class="fal fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
    
    <!--====== FAQ PART ENDS ======-->

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
EOT;

html_footer();

?>