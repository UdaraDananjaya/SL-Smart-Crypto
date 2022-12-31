<?php
require_once "../../config/database.php";

if (isset($_GET['id'])) { 
 
    $sql = "UPDATE `users` SET blocked='".$_GET['data']."' WHERE `id` = ". $_GET['id'].";";
    $conn->query($sql);

        
    
 header('Location: ../cstmerlst.php');
    
}

?>