<?php
require_once "../../config/database.php";

if (isset($_GET['id'])) { 

    $sql = "UPDATE `categories` SET active='".$_GET['data']."' WHERE `id` = ". $_GET['id'].";";
    $conn->query($sql);

        
    
 header('Location: ../categories.php');
    
}

?>