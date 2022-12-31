<?php
$dom = new DOMDocument();
$dom->load('../admin/view/system/setup.xml');
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


    $dom = new DOMDocument();
    $dom->load('../admin/view/system/config.xml');
    $root = $dom->documentElement;
    $results = $root->getElementsByTagName( 'data' );
    foreach( $results  as $result){
        foreach( $result->getElementsByTagName('Popup_Banner') as $Popup_Banner ){
        $Popup_Banner=$Popup_Banner->nodeValue;
        }
        foreach( $result->getElementsByTagName('Side_Banner') as $Side_Banner ){
        $Side_Banner= $Side_Banner->nodeValue;
        }
        foreach( $result->getElementsByTagName('Top_Banner') as $Top_Banner ){
        $Top_Banner=$Top_Banner->nodeValue;
        }
        }  
    
?>