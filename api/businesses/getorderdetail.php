<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/acamobile/classes/business.php');


$Business=new Business();
$result=$Business->getOrderDetail($_GET);
echo json_encode($result);


?>