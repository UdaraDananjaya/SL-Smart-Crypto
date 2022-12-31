<?php
require_once "../../../config/database.php";
$sql = "SELECT COUNT(`id`) FROM `ads` WHERE YEAR(date) = ".date("Y")." AND MONTH(date) = ".date("m").";";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$c= $row["COUNT(`id`)"];

$sql = "SELECT COUNT(`id`) FROM `ads` WHERE YEAR(date) = ".date("Y")." AND MONTH(date) = ".(date("m")-1) .";";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$l= $row["COUNT(`id`)"];

$sql = "SELECT COUNT(`id`) FROM `ads` WHERE YEAR(date) = ".date("Y")." AND MONTH(date) = ".(date("m")-2) .";";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$lb= $row["COUNT(`id`)"];


?>


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Last Before", "Last", "Current"],
    datasets: [{
      data: [<?=$lb?>, <?=$l?>, <?=$c?>],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
