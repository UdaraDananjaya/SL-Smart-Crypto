<?php

session_start();
if(!isset($_SESSION['user_id_SLSC']))
{
    header('Location: signin.php');
}

  require_once "../config/database.php";
  require_once "view/system/config.php";
  require_once "view/layout/header.php";
  require_once "view/layout/footer.php";

$sql = "SELECT `name`,`country` FROM `users` WHERE `user_id`='".$_SESSION['user_id_SLSC']."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$SQL_user_name= $row["name"];
$SQL_user_country= $row["country"];

if (isset ($_GET['delete']) ) {  
    $sql = "DELETE FROM `ads` WHERE `ads`.`id` = ". $_GET['delete'].";";
    $conn->query($sql);
}

$raw="SELECT `ads`.`id` FROM `ads` WHERE user_id ='". $_SESSION['user_id_SLSC']."' ";
$raw_result = $conn->query($raw);

$raw_count= $raw_result->num_rows ;
$nop=ceil($raw_count/10);

if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
} 

$limit = ($page-1) * 10;  

$sql = "SELECT `ads`.`id`,`ads`.`title`,`ads`.`districts`,`ads`.`price`,`ads`.`wallet`,`ads`.`approval`,`categories`.`name`,`categories`.`picture` FROM `ads` LEFT JOIN `categories` ON `ads`.`category` = `categories`.`id` WHERE user_id='".$_SESSION['user_id_SLSC']."' ORDER BY `ads`.`top` DESC, `ads`.`date` LIMIT ".$limit .",12";
$result = $conn->query($sql);
$siteurl="?";

html_header("My-Ads");
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
                <h4 class="title">My Ads</h4>
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
                                    <li><a href="dashboard.php"><i class="fal fa-tachometer-alt"></i> Dashboard</a></li>
                                    <li><a class="active" href="my-ads.php"><i class="fal fa-gem"></i> My Ads</a></li>
                                    <li><a href="profile.php"><i class="fal fa-user"></i> Profile</a></li>
                                    <li><a href="changepassword.php"><i class="fal fa-unlock-alt"></i> Change Password</a></li>
                                    <li><a href="logout.php"><i class="fal fa-sign-out"></i> Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="profile-my-ads mt-50">
                        <div class="profile-sidebar-title">
                            <h4 class="title">My Ads</h4>
                        </div>
                        <div class="profile-my-ads-wrapper">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="all-ads" role="tabpanel" aria-labelledby="all-ads-tab">
                                    <div class="profile-ads-table table-responsive mt-30">
                                        <table style="text-align: center;" align="center" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="items">Items</th>
                                                    <th class="category">Category</th>
                                                    <th class="price">Price</th>
                                                    <th style="text-align: center;" class="status">Ad Approval</th>
                                                    <th style="text-align: center;" class="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
EOT;


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //var_dump($row = $result->fetch_assoc());

        echo"<tr>";
        echo"<td class='items'>";
        echo"<div class='table-items d-flex'>";
        echo"<div class='items-thumb'>";
        echo"<img src='img/".$row["picture"]."' alt='ads'>";
        echo"</div>";
        echo"<div class='items-content'>";
        echo"<h5 class='title'><a href=''>".$row["title"]."</a></h5>";
        echo"<ul class='review'>";
        echo"<li><span>".$row["districts"]."</span></li>";
        echo"</ul>";
        echo"</div>";
        echo"</div>";
        echo"</td>";
        echo"<td class='category'>";
        echo"<p class='table-category'>".$row["wallet"]."</p>";
        echo"</td>";
        echo"<td class='price'>";
        echo"<p class='table-price'>$".$row["price"]."</p>";
        echo"</td>";
        echo"<td class='status' align='center'>";
        echo"<p class='table-status featured'>".$row["approval"]."</p>";
        echo"</td>";
        echo"<td class='action' align='center'>";
        echo"<ul class='table-action'>";
        echo"<li><a href='?delete=".$row["id"]."'><i class='fal fa-trash-alt'></i></a></li>";
        echo"</ul>";
        echo"</td>";
        echo"</tr>";
    }

}




echo<<<EOT
                                            </tbody>
                                        </table>
                                    </div>
                                </div>




                                <div class="seylon-pagination mt-50">
                                    <ul class="pagination justify-content-center">
EOT;
                                      
                                    echo "<li><a href='list.php?page=". ($page) . "'><i class='far fa-chevron-left'></i></a></li>";

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
                                    echo "<li><a href='list.php?page=". ($page-1) . "'><i class='far fa-chevron-right'></i></a></li>";

echo<<<EOT


                                    </ul>
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