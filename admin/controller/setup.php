<?php
$dom = new DOMDocument();
$dom->load('../view/system/setup.xml');
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
        $dom->save('../view/system/setup.xml') or die('XML Create Error'); 
        header('Location: ../setup.php');
    }
}
if (isset($_GET['st_contact'])) { 
    if ($_GET['st_contact']=="Update") { 
        $dom = new DOMDocument('1.0','UTF-8');
        $dom->formatOutput = true;
        $root = $dom->createElement('setup');
        $dom->appendChild($root);
        $result = $dom->createElement('data');
        $root->appendChild($result);
        $result->setAttribute('id', 1);
        $result->appendChild( $dom->createElement('title',$title ) );
        $result->appendChild( $dom->createElement('keyword',$keyword ) );
        $result->appendChild( $dom->createElement('description',$description) );
        $result->appendChild( $dom->createElement('customjs',$customjs) );
        $result->appendChild( $dom->createElement('email',$_GET['email']) );
        $result->appendChild( $dom->createElement('url', $_GET['url']) );
        $result->appendChild( $dom->createElement('mobile', $_GET['mobile']) );
        $result->appendChild( $dom->createElement('fblink', $_GET['fblink']) );
        $result->appendChild( $dom->createElement('telegramlink', $_GET['telegramlink']) );
        $dom->saveXML();
        $dom->save('../view/system/setup.xml') or die('XML Create Error'); 
        header('Location: ../setup.php');
    }
}

?>
