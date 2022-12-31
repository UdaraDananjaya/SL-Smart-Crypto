<?php

session_start();
if(!isset($_SESSION['code_SLSC']))
{
    header('Location: login.php');
}

require_once "../config/database.php";
require_once "view/layout/header.php";
require_once "view/layout/footer.php";

html_header("pdnapproval");
$sql = "SELECT id, title, districts, user_id,paid,approval,date FROM ads";
$result = $conn->query($sql);

//UPDATE `ads` SET`approval`='No' WHERE `id`=1



echo <<<EOT
<h1 class="h3 mb-4 text-gray-800">Advertisement List</h1>
<!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Pending Approval</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="aling" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Districts</th>
                                            <th>User Name</th>
                                            <th>Paid</th>
                                            <th>Approval</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Districts</th>
                                            <th>User Name</th>
                                            <th>Paid</th>
                                            <th>Approval</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
EOT;

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            if ($row["approval"]==="Yes"){
                $active=  "<i class='fa fa-toggle-on' aria-hidden='true'> </i>";
                $approval="No";
            }else{
                $active=  "<i class='fa fa-toggle-off' aria-hidden='true'> </i>";
                $approval="Yes";
            }
                echo "<tr style='text-align:center'><td>"
                .$row["id"]."</td> <td>"
                .$row["title"]."</td> <td>"
                .$row["districts"]."</td> <td>"
                .$row["user_id"]."</td> <td>"
                .$row["paid"]."</td> <td> <a href='controller/pdnapproval.php?id=".$row['id']."&status=".$approval."'>"
                .$active."</a></td> <td>"
                .$row["date"]."</td> </tr>";
            }

echo<<<EOT
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        

EOT;

        } else {
            echo "0 results";
        }
        




    html_footer();
?>
