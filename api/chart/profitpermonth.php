<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/acamobile/classes/chart.php');


$Chart=new Chart();
$result=$Chart-> getProfitPerMonth($_GET);

// echo "<pre>";
//     print_r($result);
// echo "</pre>";

echo json_encode($result);

?>
