<?php
session_start();
unset($_SESSION["user_id_SLSC"]);
unset($_SESSION["email"]);
header("Location:home.php");
?>