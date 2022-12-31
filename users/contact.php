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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';

$sql = "SELECT * FROM `system` WHERE id='1'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$value1= $row["value1"];
$value2= $row["value2"];
$value3= $row["value3"];

if(isset($_POST['submit']))
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        $mail->Username = $value2; // YOUR gmail email
        $mail->Password = $value3; // YOUR gmail password
    
        // Sender and recipient settings
        $mail->setFrom($_POST['email'], $_POST['name']);
        $mail->addAddress($email, 'Contact US');
        $mail->addReplyTo($value2, $value1); // to set the reply to
    
        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = $_POST['subject'] ;
        $mail->Body = "Form :". $_POST['email'] . $_POST['message'];
        $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
    
        $mail->send();
    } 
    catch (Exception $e) { }
    
}



html_header("Contact Us");
echo<<<EOT

    
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
                              <li class="active" aria-haspopup="true"><a href="contact.php">Contact Us</a></li>

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
                <h4 class="title">Contact Us</h4>
                <p>Search from over 2000+ Active Ads in 12+ Categories for Free</p>
            </div>
        </div>
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->
    
    <!--====== CONTACT FORM PART START ======-->

    <section class="contact-area pt-30 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="contact-form mt-45">
                        <h4 class="contact-title">Leave Reply</h4>
                        <form action="contact.php" method="post" data-toggle="validator">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <label>Name :</label>
                                        <input type="text" name="name" data-error="First Name is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <label>Email Address :</label>
                                        <input type="email" name="email" data-error="Valid email is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form form-group">
                                        <label>Subject :</label>
                                        <input type="text" name="subject" data-error="Subject is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> 
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form form-group">
                                        <label>Write a Message :</label>
                                        <textarea name="message" data-error="Please,leave us a message." required="required"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div> 
                                </div>
                                <p class="form-message"></p>
                                <div class="col-md-12">
                                    <div class="single-form form-group">
                                        <button class="main-btn" name="submit" value="submit" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
                 <div class="col-lg-3">
                    <div class="contact-info pt-45">
                        <h4 class="contact-title">Contact Info</h4>
                        <p class="pt-30">We’re here to help and answer any question you might have. We look forward to hearing from you.</p>
                        <ul class="pt-15">
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="icon">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="content pl-15">
                                        <p>Worldwide</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="icon">
                                        <i class="fal fa-envelope-open-text"></i>
                                    </div>
                                    <div class="content pl-15">
                                        <p>$email</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="single-info d-flex align-items-center">
                                    <div class="icon">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                    <div class="content pl-15">
                                        <p>$mobile</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT FORM PART ENDS ======-->
EOT;
html_footer();
?>