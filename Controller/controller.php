<?php
if (isset($_POST['act'])){
    switch ($_POST['act']) {
        case "signUp":{
            require './authController.php';
            $data=AuthController::signUp($_POST['user'],$_POST['password'],$_POST['hoten'],$_POST['ngaysinh'],$_POST['sdt'],$_POST['cv']);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            
        }
        break;
        case "signIn":{
            require './authController.php';
            $data=AuthController::signIn($_POST['user'],$_POST['password']);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "logOut":{        
            session_unset();
            echo json_encode("success");
        }
        break;
        case "createClass":{
            require './classController.php';
            session_start();
            $data=ClassController::createClass($_POST['id'],$_POST['info'],$_SESSION['user'][0],$_POST['name']);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "getClass":{
            require './classController.php';
            $data=ClassController::getClass($_POST['id']);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "deleteClass":{
            require './classController.php';
            $data=ClassController::deleteClass($_POST['idClass']);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "renderListClass":{
           require './classController.php';
           session_start();
           $data=ClassController::renderListClass($_SESSION['user'][0]);
           echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }  
        break;
        case "renderMember":{
            require './classController.php';
            $data=ClassController::renderMember($_POST['idClass']);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
    }
}

?>
