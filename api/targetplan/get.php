<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/acamobile/classes/targetplan.php');


$targetPlan=new TargetPlan();
$result=$targetPlan->getPlans($_GET);

echo json_encode($result);

?>