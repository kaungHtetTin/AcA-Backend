<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/acamobile/classes/group.php');


$Group=new Group();
$result=$Group->getOrderGroups($_GET);

echo json_encode($result);

?>

