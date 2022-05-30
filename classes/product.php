<?php
include('connect.php');

class Product {
    public function getProducts(){
        $query="Select * from products";
        $DB=new Database();

        $result['main_product']=$DB->read($query);

        $query2="Select * from brands";
        $result['brands']=$DB->read($query2);
    
        $query3="select * from ranks";
        $result['ranks']=$DB->read($query3);

        return $result;
    }

   
}


?>