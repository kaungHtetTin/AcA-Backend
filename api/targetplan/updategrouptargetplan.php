<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/acamobile/classes/targetplan.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
    $targetPlan=new TargetPlan();
    $result=$targetPlan->updateGroupTargetPlan($_POST);
    
    echo json_encode($result);
}

?>