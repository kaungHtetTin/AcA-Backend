<?php
include('connect.php');

class User{

    public function getUserProfile($user_id){
        $DB=new Database();
        $query="SELECT 
        name,profile_image,email,phone,address
        FROM users WHERE user_id=$user_id";

        $result=$DB->read($query);

        return $result;
    }


    public function updatProfileImage($data,$FILE){
        $user_id=$data['user_id'];
        $auth_token=$data['auth_token'];

        $userData=$this->checkAuthAndGetData($user_id,$auth_token);

        $currentProfile=$userData['profile_image'];
        if($userData!=null){
            $file=$FILE['myfile']['name'];
            $file_loc=$FILE['myfile']['tmp_name'];
            $folder="../uploads/profiles/";
            if(move_uploaded_file($file_loc,$folder.$file)){

                $query="update users set profile_image='$file' where user_id=$user_id";
                $DB=new Database();
                $DB->save($query);
                if($currentProfile!="")unlink($folder.$currentProfile);

                $response['status']="success";
                return $response;
            }else{
                $response['status']="fail";
                return $response;
            }
           
        }else{
            $response['status']="fail";
            return $response;
        }
        
    }

    public function updatProfileData($data){
        $user_id=$data['user_id'];
        $auth_token=$data['auth_token'];
        $key=$data['key'];
        $value=$data['value'];

        $userData=$this->checkAuthAndGetData($user_id,$auth_token);
        if($userData!=null){
            $query="update users set $key='$value' where user_id=$user_id";
            $DB=new Database();
            $result=$DB->save($query);
            if($result){
                $response['status']="success";
                return $response;
            }else{
                $response['status']="fail";
                return $response;
            }
           
        }else{
            $response['status']="fail";
            return $response;
        }
    }

    public function checkAuthAndGetData($user_id,$auth_token){
        
        $DB=new Database();
        $query="select * from users where user_id='$user_id' limit 1";
        $result=$DB->read($query);

        if($result){
            $row=$result[0];
            if($row['auth_token']==$auth_token){
                return $row;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

    public function searchByPhone($phone){
        $query ="select
            user_id,
            name,
            profile_image
            from users where  phone='$phone'
        ";

        $DB=new Database();
        $result=$DB->read($query);
        if($result){
            $response['status']="success";
            $response['result']=$result[0];
            return $response;
        }else{
            $response['status']="fail";
            $response['result']="No user was found!";
        }
       
    }
}

?>