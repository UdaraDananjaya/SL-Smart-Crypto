<?php



function html_header($title) {

$dom = new DOMDocument();
$dom->load('../admin/view/system/setup.xml');
$root = $dom->documentElement;
$results = $root->getElementsByTagName( 'data' );
foreach( $results  as $result){
    foreach( $result->getElementsByTagName('title') as $mtitle ){
    $mtitle=$mtitle->nodeValue;
    }
    foreach( $result->getElementsByTagName('keyword') as $keyword ){
    $keyword= $keyword->nodeValue;
    }
    foreach( $result->getElementsByTagName('description') as $description ){
    $description=$description->nodeValue;
    }
    foreach( $result->getElementsByTagName('customjs') as $customjs ){
    $customjs=$customjs->nodeValue;
    }
}
  

echo <<<EOT

<!doctype html>
<html>

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="$description">
    <meta name="keywords" content="$keyword">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script language="javascript">$customjs</script>

    <!--====== Title ======-->
    <title>$mtitle $title</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="css/fontawesome.min.css">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="css/nice-select.css">

    <!--====== Jquery ui css ======-->
    <link rel="stylesheet" href="css/jquery-ui.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="css/magnific-popup.css">
  
    <!--====== Sweetalert css ======-->
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="css/slick.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="css/style.css">


</head>


<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="load"></div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

EOT;
}
?>