<?php

session_start();
if(!isset($_SESSION['code_SLSC']))
{
    header('Location: login.php');
}

require_once "../config/database.php";
require_once "view/layout/header.php";
require_once "view/layout/footer.php";
html_header("subscribers");

$sql = "SELECT id, email, date, ip FROM subscribers";
$result = $conn->query($sql);

echo <<<EOT
<h1 class="h3 mb-4 text-gray-800">Subscriber List</h1>
<!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Subscriber Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>email</th>
                                            <th>date</th>
                                            <th>IP</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>email</th>
                                            <th>date</th>
                                            <th>IP</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
EOT;

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>"
                .$row["id"]."</td> <td>"
                .$row["email"]."</td> <td>"
                .$row["date"]."</td><td>"
                .$row["ip"]."</td></tr>";
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
