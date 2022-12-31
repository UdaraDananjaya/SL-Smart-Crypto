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


$sql = "SELECT `name`, `user_id`, `email`, `gender`, `phone`, `phone_hidden`, `country`, `referral_code`, `ref_count`, `date` FROM users WHERE email ='". $_SESSION['email']."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $name=$row["name"];
    $user_id=$row["user_id"];
    $e_mail=$row["email"];
    $gender=$row["gender"];
    $phone=$row["phone"];
    $phone_hidden=$row["phone_hidden"];
    $country=$row["country"];
    $referral_code=$row["referral_code"];
    $ref_count=$row["ref_count"];
    $date=$row["date"];
    }
}
if (strtolower($phone_hidden)==strtolower("Yes")){
    $phone_hidden="H";
}else{
    $phone_hidden="S";
}


if (isset ($_POST['update']) ) {  
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];
    $sql = "UPDATE users SET name='".$name."', gender='".$gender."', phone='".$phone."' , country='".$country."' WHERE email ='". $_SESSION['email']."'";
    $conn->query($sql);
} 

if (isset ($_GET['phone_hidden']) ) {  
    
    if($phone_hidden="S"){
        $sql = "UPDATE users SET phone_hidden='Yes' WHERE email ='". $_SESSION['email']."'";
        $conn->query($sql);
    }elseif($phone_hidden="H"){
        $sql = "UPDATE users SET phone_hidden='No' WHERE email ='". $_SESSION['email']."'";
        $conn->query($sql);
    }

}

if (isset ($_GET['delete']) ) {  
    if  ($_GET['delete']=="delete")  {  
        $sql = "DELETE FROM users WHERE email ='". $_SESSION['email']."'";
        $conn->query($sql);
        header("Location: home.php");
    
    }
}



html_header("Profile");
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
                <h4 class="title">Profile</h4>
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
                                    <h4 class="name"><a>$name</a></h4>
                                    <span class="sub-title">$country</span>
                                </div>
                            </div>
                            <div class="profile-link">
                                <ul>
                                    <li><a href="dashboard.php"><i class="fal fa-tachometer-alt"></i> Dashboard</a></li>
                                    <li><a href="my-ads.php"><i class="fal fa-gem"></i> My Ads</a></li>
                                    <li><a class="active" href="profile.php"><i class="fal fa-user"></i> Profile</a></li>
                                    <li><a href="changepassword.php"><i class="fal fa-unlock-alt"></i> Change Password</a></li>
                                    <li><a href="logout.php"><i class="fal fa-sign-out"></i> Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="profile-edit mt-50">
                        <div class="profile-sidebar-title">
                            <h4 class="title">Edit Profile</h4>
                        </div>
                        <div class="profile-form">
                            <form action="profile.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <label>User Name</label>
                                            <input type="text" name="name" value="$name" placeholder="User Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <label>User Id *Use Your Referral Code</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <a href="signup.php?ref=$user_id"> <i class="fa fa-link" aria-hidden="true"></i></a>
                                                </div>
                                                <input type="text" class="form-control" name="user_id" value="$user_id" placeholder="User Id" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <label>Email</label>
                                            <input type="email" name="email" value="$e_mail" placeholder="Email" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <label>Phone Number * (H) Hide (S) Show</label>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><a href="profile.php?phone_hidden=$phone_hidden" phone_hidden >($phone_hidden)</a></div>
                                                <input type="text" name="phone" class="form-control" value="$phone" placeholder="Phone Number">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="single-form">
                                            <label>Gender</label>
                                            <input type="text" name="gender" list="genders" value="$gender" placeholder="Gender">
                                                <datalist id="genders">
                                                    <option>Male</option> 
                                                    <option>Female</option> 
                                                </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="single-form">
                                            <label>Referral Code</label>
                                            <input type="text" name="referral_code" value="$referral_code" placeholder="Referral Code" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="single-form">
                                            <label>Country</label>
                                            <input type="text" name="country" list="country_list" value="$country" placeholder="Country">
                                                <datalist id="country_list">
                                                    <option>Sri Lanka</option> 
                                                </datalist>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <label>Referral Count</label>
                                            <input type="text" value="$ref_count" placeholder="Referral Count" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <label>Date</label>
                                            <input type="text" value="$date" placeholder="Date" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <button type="submit" name="update"  value="update" class="main-btn">Update Profile</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="single-form">
                                    <button type="button" class="main-btn" data-toggle="modal" data-target="#exampleModal" style="background-color: red;">Delete Profile</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Whoa, There</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      once you delete your account,there's no getting back make sure you want to do this
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        <a href="?delete=delete"> <button  class="btn btn-danger">  Delete IT  </button></a>
      </div>
    </div>
  </div>
</div>

    <!--====== PROFILE PART ENDS ======-->
EOT;

html_footer();
