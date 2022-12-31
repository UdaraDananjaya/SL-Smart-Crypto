<?php
require_once "../config/database.php";
require_once "view/system/config.php";
require_once "view/layout/header.php";
require_once "view/layout/footer.php";



if (isset ($_GET['addid']) ) {  

    $sql = "SELECT `ads`.`id` , `ads`.`title` ,`ads`.`category`,`ads`.`description`, `ads`.`price`,`ads`.`wallet`,`ads`.`user_id`,`ads`.`user_email`,`ads`.`user_phone`,`ads`.`hide_phone`,
    `ads`.`date`,`categories`.`slug`,`categories`.`picture`,`users`.`country`,`users`.`name`
   FROM `ads` JOIN categories ON `ads`.`category`= `categories`.`id` JOIN users ON `ads`.`user_id`=  `users`.`user_id`WHERE `ads`.`id`='".$_GET['addid']."';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $SQL_title= $row["title"];
    $SQL_categories_slug= $row["slug"];
    $SQL_description= $row["description"];
    $SQL_price= $row["price"]; 
    $SQL_wallet = $row["wallet"];  
    $SQL_user_id= $row["user_id"];  
    $SQL_user_email= $row["user_email"];  
    $SQL_user_phone= $row["user_phone"];  
    $SQL_hide_phone= $row["hide_phone"]; 
    $SQL_user_name= $row["name"]; 
    $SQL_date= $row["date"];  
    $SQL_picture= $row["picture"];  
    $SQL_country= $row["country"];  
}else{
    header('Location: ads.php');
}

 


session_start();
if(isset($_SESSION['user_id_SLSC']))
{
    $sign_in_value_HTML="<a href='dashboard.php'><i class='fal fa-home'></i>Dashboard</a>";
}else{
    $sign_in_value_HTML="<a href='signin.php'><i class='fal fa-sign-in-alt'></i> Sign In</a>";
}

html_header("Ads Detail");
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
                <h4 class="title">Ads Details</h4>
                <p>Search from over 2000+ Active Ads in 29+ Categories for Free</p>
            </div>
        </div>
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== GET SEARCH FORM PART START ======-->

    <section class="get-search-area">
    <div class="container">
        <form action="ads.php">
            <div class="get-search-form search-form-bg d-flex flex-wrap">
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
</section>

    <!--====== GET SEARCH FORM PART ENDS ======-->

    <!--====== ADS DETAILS PART START ======-->

    <section class="ads-details-page pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="ads-details pt-20">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="ads-details-image mt-30">
                                    <div class="details-image">
                                        <div class="single-details-image">
                                            <img src="img/$SQL_picture" alt="ads">
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="ads-details-content mt-30">
                                    <h4 class="title">$SQL_title</h4>
                                    <div class="price-stock d-flex flex-wrap align-items-center">
                                        <p class="price">$SQL_categories_slug : $SQL_price</p>
                                        <p>Wallet : $SQL_wallet</p>
                                        
                                    </div>
                                    
                                    <p class="text">$SQL_description</p>
                                    
                                    <div class="ads-details-wrapper">                                       
                                        <div class="ads-details-contact">
                                            <h6 class="title">Contact :</h6>
                                            
                                            <div class="ads-details-contact-wrapper d-flex flex-wrap align-items-center mt-20">
                                                <div class="contact-btn">
                                                    <a href="tel:$SQL_user_phone">$SQL_user_phone</a>
                                                    <p>Phone Number</p>
                                                    <i class="fal fa-phone"></i>
                                                </div>

                                                <div class="ads-details-message">
                                                    <a href="mailto:$SQL_user_email"><i class="fal fa-envelope-open-text"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                    <div class="ads-sidebar pt-20">
                        
                        <div class="sidebar-seller mt-25">
                            <div class="ads-sidebar-title">
                                <h4 class="title">Seller Information</h4>
                            </div>
                            <div class="single-seller-author mt-25">
                                <div class="seller-author-wrapper d-flex">
                                    <div class="author-image">
                                        <img src="img/user.png" alt="author">
                                    </div>
                                    <div class="author-content media-body">
                                        <h5 class="author-name"><a>$SQL_user_name</a></h5>
                                        <span class="country">Country : $SQL_country</span>
                                        <span class="country">UserID : $SQL_user_id</span>
                                        
                                        
                                    </div>
                                </div>
                                <div class="seller-wrapper d-flex align-items-center mt-30">
                                    <div class="author-btn">
                                        <a href="tel:$SQL_user_phone">$SQL_user_phone</a>
                                        <p>Phone Number</p>
                                        <i class="fal fa-phone"></i>
                                    </div>

                                    <div class="author-message">
                                        <a href="mailto:$SQL_user_email"><i class="fal fa-envelope-open-text"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-category mt-30">
                            <ul class="list">
                                <li>
                                    <a href="ads.php?wallet=SO">
                                        <div class="single-list-category d-flex justify-content-between align-items-center">
                                            <div class="category-icon">
                                                <img src="img/icon/ctg-1.png" alt="icon">
                                            </div>
                                            <div class="category-text">
                                                <h6 class="title">Skrill Only</h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="ads.php?wallet=BO">
                                        <div class="single-list-category d-flex justify-content-between align-items-center">
                                            <div class="category-icon">
                                                <img src="img/icon/ctg-2.png" alt="icon">
                                            </div>
                                            <div class="category-text">
                                                <h6 class="title">Binance Only</h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="ads.php?wallet=SS">
                                        <div class="single-list-category d-flex justify-content-between align-items-center">
                                            <div class="category-icon">
                                                <img src="img/icon/ctg-3.png" alt="icon">
                                            </div>
                                            <div class="category-text">
                                                <h6 class="title">Skrill & Binance</h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>

                        <div class="sidebar-ads mt-30">
                            <a href="#"><img src="$Side_Banner" alt="Side_Banner"></a>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== ADS DETAILS PART ENDS ======-->
    
    <!--====== ADS PART START ======-->

    <section class="ads-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-10">
                        <h5 class="sub-title">Classified ads</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <img src="$Top_Banner" alt="Top_Banner">
            </div>
        </div>
    </section>

    <!--====== ADS PART ENDS ======-->

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