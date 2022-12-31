<?php
require_once "../../config/database.php";
if (isset($_GET['Delete'])) { 
    $sql = "DELETE FROM `ads` WHERE `ads`.`id` = ". $_GET['d_id'].";";
    $conn->query($sql);
    header('Location: ../adlist.php');
    $table="";
    $update="display: none;";
}

if (isset($_GET['Update'])) { 

    if ($_GET['mark_per']=="on") { 
        $sql = "UPDATE `ads` SET mark_per='Yes' WHERE `id` = ". $_GET['d_id'].";";
        $conn->query($sql);
    }else{
        $sql = "UPDATE `ads` SET mark_per='No' WHERE `id` = ". $_GET['d_id'].";";
        $conn->query($sql);
    }

    if ($_GET['top']=="on") { 
        $sql = "UPDATE `ads` SET top='Yes' WHERE `id` = ". $_GET['d_id'].";";
        $conn->query($sql);
    }else{
        $sql = "UPDATE `ads` SET top='No' WHERE `id` = ". $_GET['d_id'].";";
        $conn->query($sql);
    }
    if ($_GET['approval']=="on") { 
        $sql = "UPDATE `ads` SET approval='Yes' WHERE `id` = ". $_GET['d_id'].";";
        $conn->query($sql);
    }else{
        $sql = "UPDATE `ads` SET approval='No' WHERE `id` = ". $_GET['d_id'].";";
        $conn->query($sql);
    }

    header('Location: ../adlist.php');
    $table="";
    $update="display: none;";
 
}


?>