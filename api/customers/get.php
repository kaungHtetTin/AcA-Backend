<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/acamobile/classes/sale.php');


$sale=new Sale();
$result=$sale->getCustomers($_GET);
echo json_encode($result);


?>