<?php
session_start();
if(!isset($_SESSION['code_SLSC']))
{
    header('Location: login.php');
}

require_once "../config/database.php";
require_once "view/layout/header.php";
require_once "view/layout/footer.php";

$sql = "SELECT SUM(`payment`) FROM `payment` WHERE YEAR(date) = ".date("Y")." AND MONTH(date) =".date("m"). ";";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$em= $row["SUM(`payment`)"];

$sql = "SELECT SUM(`payment`) FROM `payment` WHERE YEAR(date) = ".date("Y"). ";";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$ea= $row["SUM(`payment`)"];

$sql = "SELECT COUNT(`id`) FROM `ads`;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$aa= $row["COUNT(`id`)"];

$sql = "SELECT COUNT(`id`) FROM `ads` WHERE `approval` = 'NO' ;";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$pa= $row["COUNT(`id`)"];

//SELECT * FROM `payment` WHERE YEAR(date) = 2021 AND MONTH(date) = 6;

html_header("dashboard");

//SELECT * FROM `payment` WHERE MONTH(`date`) = 6 AND YEAR(`date`) = 2021;
//SELECT * FROM `payment` WHERE YEAR(date) = 2021 AND MONTH(date) = 6;
echo <<<EOT
<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<!-- Content Row -->
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Earnings (Monthly)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$em</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Earnings (Annual)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$ea</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        All Advertisement </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$aa</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Pending Approval</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$pa</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-hourglass-start fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Content Row -->

<div class="row">
                    <div class="col-lg-7 col-xl-8">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="text-primary font-weight-bold m-0">Annual Payment Overview</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand"><div class="">
                                    </div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                    <div class="">
                                    </div>
                                    </div>
                                    </div>
                                    <canvas id="myAreaChart" style="display: block; width: 668px; height: 320px;" width="668" height="320" class="chartjs-render-monitor"></canvas>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="card shadow mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h6 class="text-primary font-weight-bold m-0">Past Three Month Ads Overview</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="myPieChart" width="301" height="245" style="display: block; width: 301px; height: 245px;" class="chartjs-render-monitor"></canvas>
                                </div>
                                <div class="text-center small mt-4">
                                <span class="mr-2">
                                <i class="fas fa-circle text-primary">
                                </i>&nbsp;Last Before</span>
                                <span class="mr-2">
                                <i class="fas fa-circle text-success">
                                </i>&nbsp;Last</span>
                                <span class="mr-2">
                                <i class="fas fa-circle text-info">
                                </i>&nbsp;Current</span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>



EOT;
    html_footer();
?>
