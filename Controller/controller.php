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
        case "renderBankQuestion":{
            require './questionController.php';
            $data=QuestionController::renderBankQuestion();
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "renderSltGroupQuestion":{
            require './questionController.php';
            $data=QuestionController::renderSltQuestionGroup();
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "createQuestion":{
            require './questionController.php';
            $data=QuestionController::createQuestion($_POST['noidung'],$_POST['cauA'],$_POST['cauB'],$_POST['cauC'],$_POST['cauD'],$_POST['idGroup'],$_POST['tenNhom'],$_POST['dapAn']);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);

        }
        break;
        case "createTest":{
            require './testController.php';
            $data=TestController::createTest($_POST["idClass"],$_POST['nameTest'],$_POST["thoiGianLamBai"],$_POST["ngayThi"],$_POST["daoCauHoi"],$_POST["xemDiem"],$_POST["xemDapAn"]);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "renderQuestionInSettingTest":{
            require './questionController.php';
            $data=QuestionController::renderAllQuestionInSettingTest();
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "saveQuestionInTest" :{
            require './testController.php';
            $data=TestController::saveQuestionInTest($_POST['idTest'],$_POST['arrQuestion']);
            return json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "renderListQuestionInSettingTest":{
            require './questionController.php';
            $data=QuestionController::renderListQuestionOfTest($_POST['idTest']);
            return $data;
        };
        case "renderAccountTable":{
            require './adminController.php';
            $data= adminController::renderAccountTable();
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "renderClassTable":{
            require './adminController.php';
            $data= adminController::renderClassTable();
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "renderQuestionTable":{
            require './adminController.php';
            $data= adminController::renderClassQuestion();
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "renderListTest" :{
            require './testController.php';
            $data=TestController::renderListTest($_POST['idClass']);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        break;
        case "renderInfoTest":{
            require './testController.php';
            $data=TestController::renderInfoTest($_POST['idTest']);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
    } 
}

?>
