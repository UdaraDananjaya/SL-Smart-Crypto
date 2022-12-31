<?php
  require_once "view/system/config.php";
echo<<<EOT
<!doctype html>
<html lang="en" class="no-js">
<head>
  <base target="_blank">
  <meta charset="UTF-8" />
  <title>SLSC</title>
  <link rel="shortcut icon" href="img/favicon.png" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/loading.css" />
<link rel="stylesheet" href="css/fontawesome.min.css">  <!-- remember, jQuery is completely optional -->
  <script type="text/javascript" src="js/jquery.particleground.js"></script>
  <script type="text/javascript" src="js/loading.js"></script>
</head>

<body>

<div id="particles">
  <div id="intro">
      <h2 style="font-family: 'Syncopate', sans-serif; font-weight: 10;">Sri Lanka SMART CRYPTO</h2>
        <hr style="width: 50%; background-color: #E83951; border-color: #E83951;">
   
    <a href="$fblink" style="color: white;"><i class="fab fa-facebook" style="font-size: 2em;"></i></a>
    &nbsp
    <a href="$telegramlink" style="color: white;"><i class="fab fa-telegram" style="font-size: 2em;"></i></a>
<h5 > Powered By &#169; <a style="color:white; font-family:initial;text-decoration:none" href="https://www.claringtingatlana.com/">Claringting Atlana</a></h5>
  </div>
</div>

</body>
    <script>
         setTimeout(function(){
            window.location.href = 'home.php';
         }, 2500);
    </script>
</html>
EOT;
?>
