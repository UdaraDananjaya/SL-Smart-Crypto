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

//peg
$raw="SELECT `ads`.`id` FROM `ads` WHERE approval='Yes' ";
$raw_result = $conn->query($raw);

$raw_count= $raw_result->num_rows ;
$nop=ceil($raw_count/12);

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
} 

$limit = ($page-1) * 12;  

$sql = "SELECT `ads`.`id`,`ads`.`title`,`ads`.`districts`,`ads`.`price`,`ads`.`wallet`,`categories`.`name`,`categories`.`picture` FROM `ads` LEFT JOIN `categories` ON `ads`.`category` = `categories`.`id` ORDER BY `ads`.`top` DESC, `ads`.`date` LIMIT ".$limit .",12";
$result = $conn->query($sql);
$siteurl="ads.php?";

//wallet



if (isset ($_GET['wallet']) ) {  
            $siteurl="ads.php?wallet=".$_GET['wallet']."&";
            $raw="SELECT `ads`.`id` FROM `ads` WHERE approval='Yes' AND wallet='".$_GET['wallet']."' ";
            $raw_result = $conn->query($raw);
            $raw_count= $raw_result->num_rows ;
            $nop=ceil($raw_count/12);

            if (!isset ($_GET['page']) ) {  
                $page = 1;  
            } else {  
                $page = $_GET['page'];  
            } 
            $limit = ($page-1) * 12;  
            $sql = "SELECT `ads`.`id`,`ads`.`title`,`ads`.`districts`,`ads`.`price`,`ads`.`wallet`,`categories`.`name`,`categories`.`picture` FROM `ads` LEFT JOIN `categories` ON `ads`.`category` = `categories`.`id` WHERE approval='Yes' AND wallet='".$_GET['wallet']."' ORDER BY `ads`.`top` DESC, `ads`.`date`";
            $result = $conn->query($sql);
        
} 

if (isset ($_GET['find']) ) {

    $siteurl="?wallet=".$_GET['wallet']."&loc=".$_GET['loc']."&type=".$_GET['type']."&find=".$_GET['find']."&";
    $raw="SELECT `ads`.`id` FROM `ads` WHERE approval='Yes' AND wallet='".$_GET['wallet']."' And districts='".$_GET['loc']."'And category='".$_GET['type']."'";
    $raw_result = $conn->query($raw);
    $raw_count= $raw_result->num_rows ;
    $nop=ceil($raw_count/12);

    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    } 
    $limit = ($page-1) * 12;  
    $sql = "SELECT `ads`.`id`,`ads`.`title`,`ads`.`districts`,`ads`.`price`,`ads`.`wallet`,`categories`.`name`,`categories`.`picture` FROM `ads` LEFT JOIN `categories` ON `ads`.`category` = `categories`.`id` WHERE approval='Yes' AND wallet='".$_GET['wallet']."' And districts='".$_GET['loc']."'And category='".$_GET['type']."' ORDER BY `ads`.`top` DESC, `ads`.`date`";
    $result = $conn->query($sql);

} 


html_header("All Ads");

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

    <section class="page-banner">
        <div class="container">
            <div class="page-banner-content text-center">
                <h4 class="title">All Ads</h4>
                <p>Search from over 2000+ Active Ads in 12+ Categories for Free</p>
            </div>
        </div>
    </section>


    <section class="get-search-area">
    <div class="container">
        <form action="">
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


EOT;
echo<<<EOT



    <section class="ads-grid-page pt-70">
        <div class="container">
            <div class="row flex-lg-row-reverse">
                <div class="col-lg-9">
                    <div class="ads-top-bar d-flex flex-wrap justify-content-between pt-20 align-items-center">
                        
                    </div>
                    <div class="tab-content pt-20" id="myTabContent">
                        <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="grid-tab">
                            <div class="row">
EOT;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //var_dump($row = $result->fetch_assoc());
        if ($row["wallet"] == "SO") {
            $row_wallet = "Skrill Only";
        }elseif ($row["wallet"] == "BO") {
            $row_wallet = "Binance Only";
        }elseif ($row["wallet"] =="SB") {
            $row_wallet = "Skrill & Binance";
        }else{
            $row_wallet=$row["wallet"];
        }
       


        echo "<div class='col-lg-4 col-sm-6'>";
        echo"<div class='single-ads-product mt-30'>";
        echo"<div class='product-image'>";
        echo"<img src='img/".$row["picture"]."' alt='ads'>";
        echo"<p class='stacker'> &#160; ".$row_wallet. "</p>";
        echo"</div>";
        echo"<div class='product-content'>";
        echo"<h6 class='sub-title'> &#160; ".$row["name"]."</h6>";
        echo"<h4 class='main-title'><a href='#'> &#160; ".$row["title"]."</a></h4>";
        echo"<p class='location'><i class='far fa-map-marker-alt'></i> &#160;".$row["districts"]."</p>";
        echo"<div class='price-rating d-flex justify-content-between'>";
        echo"<p class='price'> &#160;".$row["price"]."</p>";
        echo"</div>";            
        echo"<a href='adsdetails.php?addid=".$row["id"]."' class='main-btn main-btn-2'>View Details</a>";      
        echo"</div>";
        echo"</div>";
        echo"</div>";
    }

}

echo<<<EOT
                            </div>
                        </div>
                        
                    </div>
                    <div class="seylon-pagination mt-50">
                        <ul class="pagination justify-content-center">
                            
                           
EOT;

echo "<li><a href='".$siteurl."page=". ($page) . "'><i class='far fa-chevron-left'></i></a></li>";

for($page = 1; $page<= $nop; $page++) {  
   
    if (isset ($_GET['page']) ) {  
        if ($_GET['page']==$page){
            echo "<li><a class='active' href='".$siteurl."page=". $page . "'>".$page." </a></li>" ;
        }else{
            echo "<li><a href='".$siteurl."page=". $page . "'>".$page." </a></li>" ;
        } 
    } else {  
        echo "<li><a href='".$siteurl."page=". $page . "'>".$page." </a></li>" ;
    } 

   
}  
echo "<li><a href='".$siteurl."page=". ($page-1) . "'><i class='far fa-chevron-right'></i></a></li>";
//    echo "<li><a href='ads.php?page=". $page . ">".$page." </a></li>" ;
echo<<<EOT
                            
                            

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ads-sidebar pt-20">

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
                                    <a href="ads.php?wallet=SB">
                                        <div class="single-list-category d-flex justify-content-between align-items-center">
                                            <div class="category-icon">
                                                <img src="img/icon/ctg-3.png" alt="icon">
                                            </div>
                                            <div class="category-text">
                                                <h6 class="title">Skrill & Binance </h6>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="sidebar-ads mt-30">
                            <a><img src="$Side_Banner" alt="Side_Banner"></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== ADS GRID PART ENDS ======-->
    
    

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
EOT;

html_footer();

