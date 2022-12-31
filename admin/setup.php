<?php

session_start();
if(!isset($_SESSION['code_SLSC']))
{
    header('Location: login.php');
}

require_once "view/layout/header.php";
require_once "view/layout/footer.php";
html_header("setup");

$dom = new DOMDocument();
$dom->load('view/system/setup.xml');
$root = $dom->documentElement;
$results = $root->getElementsByTagName( 'data' );
foreach( $results  as $result){
    foreach( $result->getElementsByTagName('title') as $title ){
    $title=$title->nodeValue;
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
    foreach( $result->getElementsByTagName('email') as $email ){
    $email=$email->nodeValue;
    }
    foreach( $result->getElementsByTagName('url') as $url ){
    $url=$url->nodeValue;
    }
    foreach( $result->getElementsByTagName('mobile') as $mobile ){
    $mobile=$mobile->nodeValue;
    }
    foreach( $result->getElementsByTagName('fblink') as $fblink ){
    $fblink=$fblink->nodeValue;
    }
    foreach( $result->getElementsByTagName('telegramlink') as $telegramlink ){
        $telegramlink=$telegramlink->nodeValue;
        }
    }  
    if (isset($_GET['st_header'])) { 
        if ($_GET['st_header']=="Update") { 
            $dom = new DOMDocument('1.0','UTF-8');
            $dom->formatOutput = true;
            $root = $dom->createElement('setup');
            $dom->appendChild($root);
            $result = $dom->createElement('data');
            $root->appendChild($result);
            $result->setAttribute('id', 1);
            $result->appendChild( $dom->createElement('title',$_GET['title'] ) );
            $result->appendChild( $dom->createElement('keyword',$_GET['keyword'] ) );
            $result->appendChild( $dom->createElement('description',$_GET['description']) );
            $result->appendChild( $dom->createElement('customjs',$_GET['customjs']) );
            $result->appendChild( $dom->createElement('email', $email) );
            $result->appendChild( $dom->createElement('url', $url) );
            $result->appendChild( $dom->createElement('mobile', $mobile) );
            $result->appendChild( $dom->createElement('fblink', $fblink) );
            $result->appendChild( $dom->createElement('telegramlink', $telegramlink) );
            $dom->saveXML();
            $dom->save('view/system/setup.xml') or die('XML Create Error'); 
        }
    }
echo<<<EOT

<div class="row">
<div class="col-md-8 mx-auto">
<div class="card shadow mb-4">
    <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Website Header Setup</h6>
    </div>
    <div class="card-body">
        <form action="controller/setup.php">
            <div class="form-group row">
                    <label class="col-md-3 col-from-label">Website Title </label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="" name="title" value="$title">
                        </div>
                    </div>
                </div>
            <div class="form-group row">
                <label class="col-md-3 col-from-label"> Meta Keywords </label>
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="" name="keyword" value="$keyword">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-md-3 col-from-label">Meta Description </label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="" name="description" value="$description">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Custom Java Script</label>
                    <div class="col-md-8">
                        <div class="form-group">
                        <textarea name="customjs" class="form-control" id="exampleFormControlTextarea1" rows="3">$customjs</textarea>
                        </div>
                    </div>
                </div>
                <input class="btn btn-primary" id="st_header" name="st_header" type="submit" value="Update">
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
    <h6 class="m-0 font-weight-bold text-primary">Website Contact Setup</h6>
    </div>
    <div class="card-body">
            <form action="controller/setup.php">
            <div class="form-group row">
                    <label class="col-md-3 col-from-label">Email</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" value="$email">
                        </div>
                    </div>
                </div>
            <div class="form-group row">
                <label class="col-md-3 col-from-label">URL</label>
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" value="$url">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-md-3 col-from-label">Mobile</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="mobile" value="$mobile">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Facebook Link</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="fblink" value="$fblink">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-from-label">Telegram Link</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="telegramlink" value="$telegramlink">
                        </div>
                    </div>
                </div>
                <input class="btn btn-primary" id="st_contact" name="st_contact" type="submit" value="Update">
        </form>
    </div>
</div>
</div>
</div>

EOT;
    html_footer();
