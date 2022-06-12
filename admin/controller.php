<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/acamobile/classes/connect.php');

class Controller{
    public function getUsers($data){
        $page=$data['page'];

        $offset=30;
        $page=$data['page'];
        $page=$page-1;
        $count=$page*$offset;

        $query="select
        user_id,official_agent_id,profile_image,name,email,phone
        from users
        order by name
        limit $count,$offset
        ";
        $DB=new Database();
        $result=$DB->read($query);
        return $result;
        
    }
}

?>