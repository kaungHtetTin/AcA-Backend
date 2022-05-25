<?php
    include('../classes/login.php');

    $user_id=$_GET['user_id'];
    $auth_token=$_GET['auth_token'];

    $login=new Login();
    $result=$login-> authRefresh($user_id,$auth_token);
    echo json_encode($result);

?>