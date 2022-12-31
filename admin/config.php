<?php
session_start();
if(!isset($_SESSION['code_SLSC']))
{
    header('Location: login.php');
}

require_once "../config/database.php";
require_once "view/layout/header.php";
require_once "view/layout/footer.php";

html_header("config");

$sql = "SELECT * FROM `system` WHERE id='1'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$value1= $row["value1"];
$value2= $row["value2"];
$value3= $row["value3"];




$dom = new DOMDocument();
$dom->load('view/system/config.xml');
$root = $dom->documentElement;
$results = $root->getElementsByTagName( 'data' );
foreach( $results  as $result){
    foreach( $result->getElementsByTagName('Popup_Banner') as $Popup_Banner ){
    $Popup_Banner=$Popup_Banner->nodeValue;
    }
    foreach( $result->getElementsByTagName('Side_Banner') as $Side_Banner ){
    $Side_Banner= $Side_Banner->nodeValue;
    }
    foreach( $result->getElementsByTagName('Top_Banner') as $Top_Banner ){
    $Top_Banner=$Top_Banner->nodeValue;
    }
    }  


    //pass
    if (isset ($_POST['config_password']) ) {  
        
  
    //    echo '<script language="javascript">alert(Old Password Incorrect)</script>';
        $sql = "SELECT password FROM `admin` WHERE username='" .$_SESSION['code_SLSC']."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $password= $row["password"];
        $new_password=md5($_POST['new_password']);
        $current_password=md5($_POST['current_password']);
    
        if($current_password==$password){
    
            $sql = "UPDATE admin SET password='".$new_password."' WHERE username='" .$_SESSION['code_SLSC']."'";
            $conn->query($sql);
            
            echo '<script language="javascript">alert("password successfully Update!!");</script>';
        }else{

          

        }
    }

    //pass

    if (isset ($_POST['config_mail']) ) {  
        $sql = "UPDATE system SET value1='".$_POST['value1']."',value2='".$_POST['value2']."',value3='".$_POST['value3']."' WHERE id='1'";
        $conn->query($sql);
        echo("<meta http-equiv='refresh' content='1'>");
      
        }

echo<<<EOT

<div class="row">
<div class="col-md-8 mx-auto">

<!-- Circle Buttons -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">SMTP Configuration</h6>
    </div>
    <div class="card-body">
            <form method="POST">
            <div class="form-group row">
                    <label class="col-md-3 col-from-label">SMTP Host</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="smtphost" value="smtp.gmail.com">
                        </div>
                    </div>
            </div>
            <div class="form-group row">
                    <label class="col-md-3 col-from-label">SMTP Port</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="smtpport" value="587">
                        </div>
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-from-label">User Name</label>
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="value1" value="$value1">
                    </div>
                </div>
            </div> 
            <div class="form-group row">
                <label class="col-md-3 col-from-label">SMTP Username</label>
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="value2" value="$value2">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-md-3 col-from-label">SMTP Password</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="password" class="form-control" name="value3" value="$value3">
                        </div>
                    </div>
            </div>
            
            <input class="btn btn-primary" id="config_mail" name="config_mail" type="submit" value="Update">
        </form>
    </div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-8 mx-auto">

<!-- Circle Buttons -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Banner Image</h6>
    </div>
    <div class="card-body">
        <form action="controller/config.php">
            <div class="form-group row">
                    <label class="col-md-3 col-from-label">Popup Banner</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Popup_Banner" placeholder="" value="$Popup_Banner">
                        </div>
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-from-label">Side Banner</label>
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Side_Banner" placeholder="" value="$Side_Banner">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-md-3 col-from-label">Top Banner</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Top_Banner" placeholder="" value="$Top_Banner">
                        </div>
                    </div>
            </div>
            <input class="btn btn-primary" id="config_Banner" name="config_Banner" type="submit" value="Update">
        </form>
    </div>
</div>
</div>
</div>


<!-- cng -->
<div class="row">
<div class="col-md-8 mx-auto">


<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
    </div>
    <div class="card-body">
            <form action="" method="POST">
            <div class="form-group row">
                    <label class="col-md-3 col-from-label">Current Password</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="password" class="form-control" name="current_password" placeholder="" value="">
                        </div>
                    </div>
            </div>
            <div class="form-group row">
                    <label class="col-md-3 col-from-label">New Password</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="password" class="form-control" name="new_password" placeholder="" value="">
                        </div>
                    </div>
            </div>
            <input class="btn btn-primary" id="config_password" name="config_password" type="submit" value="Update">
        </form>
    </div>
</div>
</div>
</div>


EOT;
    html_footer();
?>
