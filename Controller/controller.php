<?php
include './authController.php';
if (isset($_POST['act'])){
    switch ($_POST['act']) {
        case "signUp":{
            $data=AuthController::signUp($_POST['user'],$_POST['password'],$_POST['hoten'],$_POST['ngaysinh'],$_POST['sdt'],$_POST['cv']);
            echo json_encode($data);
        }
        case "signIn":{
            $data=AuthController::signIn($_POST['user'],$_POST['password']);
            echo json_encode($data);
        }
    }
}

?>
