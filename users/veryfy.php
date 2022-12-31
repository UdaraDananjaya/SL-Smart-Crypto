<?php

if (isset ($_GET['token']) ) {  
 echo<<<EOT
<!DOCTYPE html>
<html>
<body>
<script src="js/sweetalert.js"></script>
<script>
Swal.fire('Your account was credited!','Check your email inbox to confirm!','success').then(function() {
    window.location = "signin.php";
});
</script>   

EOT;

}

//<script type="text/javascript">Swal.fire('Good job!','You clicked the button!','success');
//var timer = setTimeout(function() {window.location='../view/pages/adlist.php'}, 5000);
    
?>

