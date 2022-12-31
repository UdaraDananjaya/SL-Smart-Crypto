<?php
require_once "../../config/database.php";
session_start();

if (isset ($_POST['submit']) ) {  
    $title=$_POST['title'];
    $category=$_POST['category'];
    $districts=$_POST['districts'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $wallet=$_POST['wallet'];
    $neg_price=$_POST['neg_price'];
    

    $sql = "SELECT user_id, email ,phone,phone_hidden FROM users WHERE `user_id`='".$_SESSION['user_id_SLSC']."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $user_id=$row["user_id"];
    $user_email=$row["email"];
    $user_phone=$row["phone"];
    $hide_phone=$row["phone_hidden"];

    $post_type="Add";
    $mark_per="No";
    $top="No";
    $approval="No";
    $paid="No";
    $paid_id="Invalid";


    $sql =   "INSERT INTO `ads`( `title`, `category`, `districts`, `description`, `price`, `wallet`, `neg_price`, `user_id`, `user_email`, `user_phone`, `hide_phone`, `post_type`, `mark_per`, `top`, `approval`, `paid`, `paid_id`)
     VALUES ('".$title."','".$category."','".$districts."','".$description."','".$price."','".$wallet."','".$neg_price."','".$user_id."','".$user_email."','".$user_phone."','".$hide_phone."','".$post_type."','".$mark_per."','".$top."','".$approval."','".$paid."','".$paid_id."')";
    $conn->query($sql);
    header("Location: ../dashboard.php");

}
  
 function email_exist(){
    echo<<<EOT
    <!DOCTYPE html>
    <html>
    <body>
    <script src="../js/sweetalert.js"></script>
    <script>
    Swal.fire('Email exists!','Please choose another!','warning').then(function() {
        window.location = "../view/pagesx/signup.php?err=mail";
    });
    </script>  
EOT;
 }


?>