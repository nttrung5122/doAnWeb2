<?php
include '../model/authModel.php';

class AuthController {

    static public function signUp($user, $password,$hoten,$ngaysinh,$sdt,$cv){
        // $data = array();
        if(!AuthModel::checkUsersExit($user)){
            AuthModel::createUser($user,$password,$hoten,$ngaysinh,$sdt,$cv);
            // echo json_decode("Tạo tài khoản thành công");
            $data['status']='success';
            $data['notice']="Tạo tài khoản thành công";
            // echo json_encode($data);
        }       
        else{
            // echo json_decode("Email đã được sử dụng <br> Tạo tài khoản không thành công");
            $data['status']='fail';
            $data['notice']="Email đã được sử dụng <br> Tạo tài khoản không thành công";
            
        }
        return ($data);
    }

    static public function signIn($user,$password){
        if(AuthModel::checkUsersExit($user)){
            $data=mysqli_fetch_array(AuthModel::getUsers($user));
            if($data[1]==$password){
                $data['status']='success';
                $data['notice']="Đăng nhập thành công thành công";
            }
 
        }
        else{
            $data['status']='fail';
            $data['notice']="Tài khoản không tồn tại hoắc mất khẩu không chính xác"; 
        }
        return $data;
    }
}


?>
