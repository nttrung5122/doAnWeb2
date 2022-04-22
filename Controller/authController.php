<?php
include '../model/authModel.php';
if (isset($_POST['act'])){
    if($_POST['act'] =="signUp"){
        if(!AuthModel::checkUsersExit($_POST['user'])){
            AuthModel::createUser($_POST['user'],$_POST['password'],$_POST['hoten'],$_POST['ngaysinh'],$_POST['sdt'],$_POST['cv']);
            // echo json_decode("Tạo tài khoản thành công");
            echo "Tạo tài khoản thành công";
        }       
        else{
            // echo json_decode("Email đã được sử dụng <br> Tạo tài khoản không thành công");
            echo "Email đã được sử dụng <br> Tạo tài khoản không thành công";
        }
    }
}

?>
