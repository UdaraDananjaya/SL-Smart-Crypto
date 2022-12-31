<?php
session_start();
unset($_SESSION["code_SLSC"]);
unset($_SESSION["username"]);
header("Location:login.php");
?>