<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/acamobile/classes/business.php');

 
if($_SERVER['REQUEST_METHOD']=="POST"){
    $Business=new Business();
    $result=$Business->updateExtraCost($_POST);
    echo json_encode($result);
}


?>