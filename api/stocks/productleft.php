<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/acamobile/classes/stock.php');


$Stock=new Stock();
$result=$Stock->getProductLeftByStock($_GET);
echo json_encode($result);
 
?>