<?php
session_start();
if(!isset($_SESSION['code_SLSC']))
{
    header('Location: login.php');
}

require_once "../config/database.php";
require_once "view/layout/header.php";
require_once "view/layout/footer.php";
html_header("categories");

$sql = "SELECT id, name, slug, description, value, type ,active FROM categories";
// value = BTC
$result = $conn->query($sql);


echo <<<EOT
<h1 class="h3 mb-4 text-gray-800">Advertisement Categories</h1>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Categories Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Description</th>
                                            <th>Value</th>
                                            <th>Type</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Description</th>
                                            <th>Value</th>
                                            <th>Type</th>
                                            <th>Active</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
EOT;

        if ($result->num_rows > 0) {

            // output data of each row
            while($row = $result->fetch_assoc()) {

                if ($row["active"]==="Yes"){
                  $active=  "<i class='fa fa-toggle-on' aria-hidden='true'> </i>";
                  $active_data="No";
                  
                }else{
                    $active=  "<i class='fa fa-toggle-off' aria-hidden='true'> </i>";
                    $active_data="Yes";
                  }
                

                echo "<tr style='text-align:center'><td>"
                .$row["id"]."</td> <td>"
                .$row["name"]."</td> <td>"
                .$row["slug"]."</td> <td>"
                .$row["description"]."</td><td>"
                .$row["value"]."</td><td>"
                .$row["type"]."</td><td style='text-align:center'>"
        
                ."<a href='../../controller/categories.php?id=".$row["id"]."&data=".$active_data."'>"
                .$active
                ."</a>"
                ."</td></tr>";
            }

echo<<<EOT
</tbody></table></div></div></div>
EOT;

        } else {
            echo<<<EOT
</tbody></table></div></div></div>
EOT;
}

    html_footer();
?>
