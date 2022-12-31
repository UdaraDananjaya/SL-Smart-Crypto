<?php
require_once "../../config/database.php";

$sql ='SELECT max(id) FROM users';
$result= $conn->query($sql);
$row = $result->fetch_assoc();
$id= ($row["max(id)"]+1);

if (!empty($_SERVER['HTTP_CLIENT_IP']))   
{$ip_address = $_SERVER['HTTP_CLIENT_IP'];}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
{$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];}
else
{$ip_address = $_SERVER['REMOTE_ADDR'];}

if (isset ($_POST['submit']) ) {  
    $name=$_POST['name'];
    $user_id=strstr($_POST['email'],"@",true).$id;
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $password=md5($_POST['password']);
    $country = $_POST['country'];
    if (isset ($_POST['hide_p']) ) {  
        if ($_POST['hide_p']=="on")
        {$hide_p="Yes";}
        else
        {
            $hide_p="No";}}
        else
        {
            $hide_p="No";
    }
    $v_email="No";
    $token= md5(rand(1,9).$user_id.rand(1,9));
    $blocked="No";
    $ref_code=$user_id;
    $ref_count="0";
    $ip=$ip_address;

$sql = "SELECT  email FROM users WHERE email='".$email."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    //header("Location: ../view/pagesx/signup.php?err=mail");
 //require_once "../view/pagesx/signup.php";
 email_exist();

} else {
    $sql =   "INSERT INTO `users`(`name`, `user_id`, `email`, `gender`, `phone`, `phone_hidden`, `country`, `verified_email`, `token`, `blocked`, `referral_code`, `ref_count`, `password`, `ip`)
    VALUES ('".$name."','".$user_id."','".$email."','".$gender."','".$phone."','".$hide_p."','".$country."','".$v_email."','".$token."','".$blocked."','".$ref_code."','".$ref_count."','".$password."','".$ip."')";
    $conn->query($sql);
   // var_dump($sql);
 $token = sha1(mt_rand(1, 90000) . 'SALT');
 header("Location: ../veryfy.php?token=$token");
}
} 
 function email_exist(){
    echo<<<EOT
    <!DOCTYPE html>
    <html>
    <body>
    <script src="../js/sweetalert.js"></script>
    <script>
    Swal.fire('Email exists!','Please choose another!','warning').then(function() {
        window.location = "../signup.php?err=mail";
    });
    </script>  
EOT;
 }


?>