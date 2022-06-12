<?php
include('controller.php');

$controller=new Controller;
if($_SERVER['REQUEST_METHOD']=="GET"){


    if(isset($_GET['page'])){
        $result=$controller->getUsers($_GET);
        echo json_encode($result);
    }

    
   
}


?>