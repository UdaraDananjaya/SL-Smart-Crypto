<?php
require_once "../../config/database.php";

if (!empty($_SERVER['HTTP_CLIENT_IP']))   
{$ip_address = $_SERVER['HTTP_CLIENT_IP'];}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
{$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];}
else
{$ip_address = $_SERVER['REMOTE_ADDR'];}
if (isset ($_POST['sub']) ) {  
    $sql =   "INSERT INTO `subscribers`(`email`,`ip`)
    VALUES ('". $_POST['e-mail']."','".$ip_address."')";
    $conn->query($sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>