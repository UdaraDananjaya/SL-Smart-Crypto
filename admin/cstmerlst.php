<?php
session_start();
if(!isset($_SESSION['code_SLSC']))
{
    header('Location: login.php');
}
require_once "../config/database.php";
require_once "view/layout/header.php";
require_once "view/layout/footer.php";
html_header("cstmerlst");

$sql = "SELECT id, name, user_id, email, gender, phone, phone_hidden, country,verified_email, blocked, referral_code ,ref_count ,ip ,date  FROM users";
$result = $conn->query($sql);

echo <<<EOT
<h1 class="h3 mb-4 text-gray-800">Customer List</h1>
<!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Customer Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>User ID</th>
                                            <th>E-mail</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Hide Number</th>
                                            <th>Country</th>
                                            <th>Verified E-mail</th>
                                            <th>Blocked</th>
                                            <th>Referral Code</th>
                                            <th>Referral Count</th>
                                            <th>IP</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>User ID</th>
                                            <th>E-mail</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Hide Number</th>
                                            <th>Country</th>
                                            <th>Verified E-mail</th>
                                            <th>Blocked</th>
                                            <th>Referral Code</th>
                                            <th>Referral Count</th>
                                            <th>IP</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
EOT;

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {


                if ($row["blocked"]==="Yes"){
                    $active=  "<i class='fa fa-toggle-on' aria-hidden='true'> </i>";
                    $active_data="No";
                    
                  }else{
                      $active=  "<i class='fa fa-toggle-off' aria-hidden='true'> </i>";
                      $active_data="Yes";
                    }




                echo "<tr><td>"
                .$row["id"]."</td> <td>"
                .$row["name"]."</td> <td>"
                .$row["user_id"]."</td> <td>"
                .$row["email"]."</td> <td>"
                .$row["gender"]."</td> <td>"
                .$row["phone"]."</td> <td>"
                .$row["phone_hidden"]."</td> <td>"
                .$row["country"]."</td> <td>"
                .$row["verified_email"]."</td>
                <td style='text-align:center'> 
                <a href='controller/cstmerlst.php?id=".$row["id"].
                "&data=".$active_data."'>"
                ."$active</a></td> <td>"
                .$row["referral_code"]."</td> <td>"
                .$row["ref_count"]."</td> <td>"
                .$row["ip"]."</td> <td>"
                .$row["date"]."</td></tr>";
            }
     

echo<<<EOT
</tbody></table></div></div></div>
EOT;

        } else {
            echo "</tbody></table></div></div></div>";
        }
        

html_footer();

?>
