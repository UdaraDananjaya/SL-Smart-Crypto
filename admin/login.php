<?php


require_once "../config/database.php";

session_start();

if (isset ($_POST['submit']) ) {  

    if ($stmt = $conn->prepare('SELECT  username, password FROM admin WHERE username = ?')) {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result( $user_name, $password);
            $stmt->fetch();
            $post_password=md5($_POST['password']);
            if ($post_password== $password) {
                session_regenerate_id();
                $_SESSION['code_SLSC']=$_POST['username'];
                $_SESSION['username'] =$user_name;
             
                header('Location: dashboard.php');
            } else {
                echo "<script>alert('Incorrect Password');document.location='login.php'</script>";
             //   header('Location: index.php');
            }
        } else {
           echo "<script>alert('Incorrect Email Address');document.location='login.php'</script>";
           // header('Location: index.php');
        }
    
        $stmt->close();
    }


}


echo<<<EOT

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
	<link href="vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
        body {
            background: #475d62;
        }
        
        .login-dark {
            background: #475d62;
            background-size: cover;
            position: relative;
        }
        
        .login-dark form {
            max-width: 320px;
            width: 90%;
            background-color: #1e2833;
            padding: 40px;
            border-radius: 4px;
            transform: translate(-50%, -50%);
            position: fixed;
            top: 50%;
            left: 50%;
            color: #fff;
            box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.2);
        }
        
        .login-dark .illustration {
            text-align: center;
            padding: 15px 0 20px;
            font-size: 100px;
            color: #2980ef;
        }
        
        .login-dark form .form-control {
            background: none;
            border: none;
            border-bottom: 1px solid #434a52;
            border-radius: 0;
            box-shadow: none;
            outline: none;
            color: inherit;
        }
        
        .login-dark form .btn-primary {
            background: #214a80;
            border: none;
            border-radius: 4px;
            padding: 11px;
            box-shadow: none;
            margin-top: 26px;
            text-shadow: none;
            outline: none;
        }
        
        .login-dark form .btn-primary:hover,
        .login-dark form .btn-primary:active {
            background: #214a80;
            outline: none;
        }
        
        .login-dark form .forgot {
            display: block;
            text-align: center;
            font-size: 12px;
            color: #6f7a85;
            opacity: 0.9;
            text-decoration: none;
        }
        
        .login-dark form .forgot:hover,
        .login-dark form .forgot:active {
            opacity: 1;
            text-decoration: none;
        }
        
        .login-dark form .btn-primary:active {
            transform: translateY(1px);
        }
    </style>
</head>

<body>
    <div class="login-dark">
        <form method="post" action="">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"> <i class="fas fa-user-lock"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" name="submit" value="submit" type="submit">Log In</button></div>
        </form>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>



</html>

EOT;

?>

