<?php

require_once "../config/database.php";
require_once "view/layout/header.php";
require_once "view/layout/footer.php";

session_start();
if(!isset($_SESSION['code_SLSC']))
{header('Location: login.php');}

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
        $mail->setFrom($value2, $value1);
        $mail->addAddress('claringtingatlana@gmail.com', 'Claringting Atlana');
        $mail->addReplyTo($value2, $value1); // to set the reply to
    
        // Setting the email content
        $mail->IsHTML(true);
        $mail->Subject = $_POST['mailsub'] ;
        $mail->Body =  $_POST['mailmsg'];
        $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
    
        $mail->send();
    } 
    catch (Exception $e) { }
    
}

html_header("contact");

echo<<<EOT

<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Contact CA</h6>
                                </div>
                                <div class="card-body">

                                <form action="" method="POST">
                                <div class="mb-3">
                                <label for="exampleFormControlInput1">Subject :</label>
                                <input class="form-control form-control-solid" name="mailsub" id="mailsub"  type="text" placeholder="Subject" required></div>
                                <div class="mb-3">
                                    <div class="mb-0">
                                    <label for="exampleFormControlTextarea1">Message :</label>
                                    <textarea class="form-control form-control-solid" id="mailmsg" name="mailmsg" placeholder="Message here" rows="15" required ></textarea>
                                    </div>
                                </div>
                                <button type="submit" name="submit" value="submit" class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="icon text-white-50"><i class="fas fa-paper-plane"></i></span><span class="text">Send</span>
                                    </button>
                        
                            </form>

                                </div>
                            </div>





EOT;






    html_footer();
?>
