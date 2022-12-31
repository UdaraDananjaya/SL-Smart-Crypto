<?php
$dom = new DOMDocument();
$dom->load('../view/system/config.xml');
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

if (isset($_GET['config_Banner'])) { 
    if ($_GET['config_Banner']=="Update") { 
        $dom = new DOMDocument('1.0','UTF-8');
        $dom->formatOutput = true;
        $root = $dom->createElement('setup');
        $dom->appendChild($root);
        $result = $dom->createElement('data');
        $root->appendChild($result);
        $result->setAttribute('id', 1);
        $result->appendChild( $dom->createElement('Popup_Banner',$_GET['Popup_Banner'] ) );
        $result->appendChild( $dom->createElement('Side_Banner',$_GET['Side_Banner'] ) );
        $result->appendChild( $dom->createElement('Top_Banner',$_GET['Top_Banner']) );
        $dom->saveXML();
        $dom->save('../view/system/config.xml') or die('XML Create Error'); 
        header('Location: ../config.php');
    }
}
if (isset($_GET['st_contact'])) { 
    if ($_GET['st_contact']=="Update") { 
       
    }
}

?>
