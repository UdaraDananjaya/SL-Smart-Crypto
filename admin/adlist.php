<?php
session_start();
if(!isset($_SESSION['code_SLSC']))
{
    header('Location: login.php');
}

require_once "../config/database.php";
require_once "view/layout/header.php";
require_once "view/layout/footer.php";
html_header("adlist");

$sql = "SELECT id, title, districts, price,wallet, user_id, date FROM ads";
$result = $conn->query($sql);

$table="";
$update="display: none;";

$id="";$title="";$category="";$districts="";$description="";$price="";$wallet="";$neg_price="";$user_name="";$user_email="";$user_phone="";$hide_phone="";$post_type ="";$mark_per="";$approval="";$top="";$paid ="";$paid_id="";

if (isset($_GET['cancel'])) { 
    $table="";
    $update="display: none;";
}

if (isset($_GET['id'])) { 
    $table="display: none;";
    $update="";
    if ($stmt = $conn->prepare('SELECT id, title, category, districts, description, price, wallet,  neg_price, user_id, user_email, user_phone, hide_phone, post_type, mark_per, approval, top, paid, paid_id FROM ads WHERE id = ?')) {
        $stmt->bind_param('s', $_GET['id']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $title, $category, $districts, $description, $price, $wallet,  $neg_price, $user_name, $user_email, $user_phone, $hide_phone, $post_type, $mark_per, $approval, $top, $paid, $paid_id);
            $stmt->fetch();
            if ($neg_price == "Yes"){
                $neg_price="CHECKED";
            }
            if ($hide_phone == "Yes"){
                $hide_phone="CHECKED";
            }
            if ($mark_per == "Yes"){
                $mark_per="CHECKED";
            }
            if ($top == "Yes"){
                $top="CHECKED";
            }
            if ($approval == "Yes"){
                $approval="CHECKED";
            }
            if ($paid == "Yes"){
                $paid="CHECKED";
            }
        }
        $stmt->close();
    }
} 

echo <<<EOT
<script>
$("#add").modal()
</script>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Advertisement List</h1>
</div>


<!-- DataTales Example -->
                    <div class="card shadow mb-4" style="$table">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> <center>Advertisement Table</center></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Districts</th>
                                            <th>Price</th>
                                            <th>Wallet</th>
                                            <th>User Name</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Districts</th>
                                            <th>Price</th>
                                            <th>Wallet</th>
                                            <th>User Name</th>
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
EOT;

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td><a href='?id=".$row["id"]."'class='d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm' >"
                .$row["id"]."</a></td> <td>"
                .$row["title"]."</td> <td>"
                .$row["districts"]."</td> <td>"
                .$row["price"]."</td><td>"
                .$row["wallet"]."</td><td>"
                .$row["user_id"]."</td><td>"
                .$row["date"]."</td></tr>";
            }

echo<<<EOT
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

EOT;

echo<<<EOT
<div style="$update" class="col-md-8 mx-auto">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"><center>Advertisement Details</center></h6>
                                </div>
                                <div class="card-body">
                                        <form action="controller/adlist.php">
                                        <input type="hidden" name="d_id" class="form-control" value="$id">
                                        <div class="form-group row">
                                        <label class="col-md-3 col-from-label">ID : </label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="id" class="form-control" value="$id" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Title : </label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="title" class="form-control" value="$title" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Category : </label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="category" class="form-control" value="$category" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">District : </label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="districts" class="form-control" value="$districts" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Description : </label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="description" class="form-control" value="$description" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Price : </label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="price" class="form-control" value="$price" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-md-3 col-from-label">wallet : </label>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" name="wallet" class="form-control" value="$wallet" disabled>
                                            </div>
                                        </div>
                                </div>
                                    
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Price Negotioble : </label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="checkbox" name="neg_price" class="form-control" $neg_price disabled>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">User Name</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="user_name" class="form-control" value="$user_name" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">User E-mail</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="user_email" class="form-control" value="$user_email" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">User Phone</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="user_phone" class="form-control" value="$user_phone" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Hide Phone</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="checkbox" name="hide_phone" class="form-control" $hide_phone disabled >
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Post Type</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="post_type" class="form-control" value="$post_type" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Mark Per</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="checkbox" name="mark_per" class="form-control" $mark_per>
                                                </div>
                                                
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Top List</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="checkbox" name="top" class="form-control" $top>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Approval</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                
                                                    <input type="checkbox" name="approval" class="form-control" $approval>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Paid</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="checkbox" name="paid" class="form-control" $paid disabled>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-from-label">Paid Id</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="paid_id" class="form-control" value="#$paid_id" disabled>
                                                </div>
                                            </div>
                                    </div>
                                    <a href="?cancel=Cancel" class="btn btn-warning">Cancel</a>
                                    <input class="btn btn-primary" id="Update" name="Update" type="submit" value="Update">
                                    <input class="btn btn-danger" id="Delete" name="Delete" type="submit" value="Delete">
                               </form>
                            </div>
                            </div>
                            </div>
EOT;

        } else {
            echo "0 results";
        }
        




    html_footer();
?>
