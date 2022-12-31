<?php
require_once "../../config/database.php";
if (isset($_GET['id'])) { 

    if ($_GET['status']=="Yes") { 
        $sql = "UPDATE `ads` SET approval='Yes' WHERE `id` = ". $_GET['id'].";";
        $conn->query($sql);
    }elseif($_GET['status']=="No"){
        $sql = "UPDATE `ads` SET approval='No' WHERE `id` = ". $_GET['id'].";";
        $conn->query($sql);
    }
    header('Location: ../pdnapproval.php');
}
?>