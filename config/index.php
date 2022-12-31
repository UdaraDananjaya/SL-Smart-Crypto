<?php
session_start();
if (!isset($_SESSION['addlog'])) { 
    header('Location: view/pages/dashboard.php'); 
} 
else{header('Location: home.php'); }
?>