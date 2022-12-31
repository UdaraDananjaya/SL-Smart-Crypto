<?php
  require_once "../config/database.php";
  require_once "view/system/config.php";
  require_once "view/layout/header.php";
  require_once "view/layout/footer.php";

  session_start();
  if(isset($_SESSION['user_id_SLSC']))
  {
  }else{
    header('Location: signin.php');
  }

  
  $sql = "SELECT `name`,`country` FROM `users` WHERE `user_id`='".$_SESSION['user_id_SLSC']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$SQL_user_name= $row["name"];
$SQL_user_country= $row["country"];
 

html_header("dd");
echo<<<EOT
    <!--====== HEADER PART START ======-->

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
                            <li><a href='dashboard.php'><i class='fal fa-home'></i>Dashboard</a></li>
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
                <h4 class="title">Ad Posts</h4>
                <p>Search from over 2000+ Active Ads in 29+ Categories for Free</p>
            </div>
        </div>
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->
    <!--====== AD POSTS PART START ======-->

    <section class="ad-posts-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="ad-posts-wrapper">
                        <div class="ad-posts-title">
                            <h4 class="title">Ad Posts</h4>
                        </div>

                        <div class="ad-posts-form">
                        <form action="controller/adposts.php" method="POST">
                                <div class="single-form">
                                    <label>Ad Title *</label>
                                    <input name="title" type="text" placeholder="Ad Title">
                                </div>
                                <div class="single-form">
                                    <label>Category *</label>
                                    <select required name="category" id="category" >
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
                                </div>
                                <div class="single-form">
                                    <label>Districts *</label>
                                    <select required name="districts" id="districts" class="form-control">
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
                                    <label>Description</label>
                                    <textarea name="description" placeholder="Description"></textarea>
                                </div>
                                <div class="single-form">
                                    <label>Price *</label>
                                    <input name="price" type="text" placeholder="Price">
                                </div>

                                <div class="single-form ">
                                    <label>Wallet</label>

                                    <div class="d-flex">
                                        <div class="ads-custom-fild">
                                            <div class="check-box">
                                                <input type="radio" name="wallet" value="SO" id="wallet1">
                                                <label for="wallet1"></label>
                                                <span>Skrill Only</span>
                                            </div>
                                        </div>
                                        <div class="ads-custom-fild">
                                        <div class="check-box">
                                            <input type="radio" name="wallet" value="BO" id="wallet2">
                                            <label for="wallet2"></label>
                                            <span>Binance Only</span>
                                        </div>
                                    </div>
                                        <div class="ads-custom-fild">
                                            <div class="check-box">
                                                <input type="radio" name="wallet" value="SB" id="wallet3">
                                                <label for="wallet3"></label>
                                                <span>Skrill & Binance</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-form ">
                                    <label>Negotiable Price</label>

                                    <div class="d-flex">
                                        <div class="ads-custom-fild">
                                            <div class="check-box">
                                                <input type="radio" name="neg_price" value="Yes" id="Yes">
                                                <label for="Yes"></label>
                                                <span>Yes</span>
                                            </div>
                                        </div>
                                        <div class="ads-custom-fild">
                                            <div class="check-box">
                                                <input type="radio" name="neg_price" value="No" id="No">
                                                <label for="No"></label>
                                                <span>No</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                               
                               

                                <div class="single-form">
                                    <button type="submit" name="submit" value="submit" class="main-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== AD POSTS PART ENDS ======-->
EOT;
html_footer();
?>