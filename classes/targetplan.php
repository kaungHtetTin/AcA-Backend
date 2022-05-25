<?php 
include('connect.php');
include('auth.php');

class TargetPlan{
    public function addNewTargetPlan($data){
        $user_id=$data['user_id'];
        $start_date=$data['start_date']/1000;
        $end_date=$data['end_date']/1000;

        $DB=new Database();
        $query="insert into target_plans (user_id,start_date,end_date) values 
        ($user_id,$start_date,$end_date)";

        $result=$DB->save($query);

        if($result){
            $response['status']="success";
            return $response;
        }else{
            $response['status']="fail";
            return $response;
        }
    }

     public function updateGroupTargetPlan($data){
        $user_id=$data['user_id'];
        $start_date=$data['start_date']/1000;
        $end_date=$data['end_date']/1000;

        $DB=new Database();
        $query="select * from target_plans where user_id=$user_id";
        $check=$DB->read($query);
        if($check){
            $query="update target_plans set start_date=$start_date, end_date=$end_date where user_id=$user_id";
        }else{
            $query="insert into target_plans (user_id,start_date,end_date) values 
            ($user_id,$start_date,$end_date)";
        }

    
        $result=$DB->save($query);

        if($result){
            $response['status']="success";
            return $response;
        }else{
            $response['status']="fail";
            return $response;
        }
    }


    public function getPlans($data){
        $user_id=$data['user_id'];

        $offset=30;
        $page=$data['page'];
        $page=$page-1;
        $count=$page*$offset;


        $query ="select * from target_plans
        where user_id=$user_id
        order by target_plan_id desc
        limit $count,$offset";

        $DB=new Database();
        $result=$DB->read($query);
        $response['plans']=$result;
        return $response;


    }

    public function updateProductQuantity($data){
        $target_plan_id=$data['extra1'];
        $product_id=$data['content_id'];
        $count=$data['value'];

        $DB=new Database();
        //check if exists
        $query="select id from target_plan_details where target_plan_id=$target_plan_id and product_id=$product_id limit 1";
        $result=$DB->read($query);
        if($result){
            $query ="update target_plan_details set count=$count where target_plan_id=$target_plan_id and product_id=$product_id";
        }else{
            $query="insert into target_plan_details (target_plan_id,product_id,count) values
            ($target_plan_id,$product_id,$count)
            ";
        }
        $response['query']=$query;
        $response['data']=$data;
 
        $result=$DB->save($query);
        if($result){
            $response['status']="success";
            return $response;
        }else{
            $response['status']="fail";
            return $response;
        }
    }

    public function getDetails($data){
        $target_plan_id=$data['target_plan_id'];

        $DB=new Database();
        $query="select * from target_plan_details where target_plan_id=$target_plan_id";
        $result=$DB->read($query);

        if($result){
            for($i=0;$i<count($result);$i++){
                $product_id=$result[$i]['product_id'];
                $response[$product_id]['count']=$result[$i]['count'];
            }

            return $response;
        }

       return false;
    }
}

?>