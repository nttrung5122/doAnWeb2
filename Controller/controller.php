<?php
// if (isset($_GET['act'])) {
// echo $_POST['act'];
$request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
$request_url = rtrim($request_url, '/');
$request_url = strtok($request_url, '?');
$route_parts = explode('/', $route);
$request_url_parts = explode('/', $request_url);
array_shift($route_parts);
array_shift($request_url_parts);
echo end($request_url_parts);

if (isset($_POST['act'])) {
    switch ($_POST['act']) {
    // switch ($_GET['act']) {

        case "createClass": {
                require './classController.php';
                session_start();
                $data = ClassController::createClass($_POST['id'], $_POST['info'], $_SESSION['user'][0], $_POST['name']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "getClass": {
                require './classController.php';
                $data = ClassController::getClass($_POST['id']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;







        case "renderSltGroupQuestion": {
                require './questionController.php';
                $data = QuestionController::renderSltQuestionGroup();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;




            // case "renderListQuestionInSettingTest":{
            //     require './questionController.php';
            //     $data=QuestionController::renderListQuestionOfTest($_POST['idTest']);
            //     return $data;
            // };
            // break;
        case "renderAccountTable": {
                require './adminController.php';
                $data = adminController::renderAccountTable();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "renderAnnounment": {
                require_once './classController.php';
                $data = ClassController::renderAnnouncement($_POST['idClass']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;


        case "clickDelete": {
                require './adminController.php';
                $data = adminController::clickDelete($_POST['idAdmin'], $_POST['typeAdmin']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "renderClassTable": {
                require './adminController.php';
                $data = adminController::renderClassTable();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "renderQuestionTable": {
                require './adminController.php';
                $data = adminController::renderQuestionTable();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "renderGroupQuestionTable": {
                require './adminController.php';
                $data = adminController::renderGroupQuestionTable();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "createGroupQuestion": {
                require './adminController.php';
                $data = adminController::createGroupQuestion($_POST['tenNhomCauHoi']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "editAccount": {
                require './adminController.php';
                $data = adminController::editAccount($_POST['id'], $_POST['password'], $_POST['role'], $_POST['name'], $_POST['birth'], $_POST['phone']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "active": {
                require './adminController.php';
                $data = adminController::active($_POST['id'], $_POST['active']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "activeAll": {
                require './adminController.php';
                $data = adminController::activeAll();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "unActiveAll": {
                require './adminController.php';
                $data = adminController::unActiveAll();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "editClass": {
                require './adminController.php';
                $data = adminController::editClass($_POST['id'], $_POST['tenLop'], $_POST['thongTin'], $_POST['email']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;





        case "renderListClassOfStudent": {
                require './classController.php';
                session_start();
                $data = ClassController::renderListClassOfStudent($_SESSION['user'][0]);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "renderListTestInStudentPage": {
                require 'testController.php';
                session_start();
                $data = TestController::renderListTestInStudent($_POST['idClass'], $_SESSION['user'][0]);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "renderInfoTestNoSubmit": {
                require 'testController.php';
                $data = TestController::renderInfoTestNoSubmit($_POST['idTest']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "renderInfoTestSubmited": {
                require 'testController.php';
                session_start();
                $data = TestController::renderInfoTestSubmited($_POST['idTest'], $_SESSION['user'][0]);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "addStudentToClass": {
                require './classController.php';
                session_start();
                $data = ClassController::addStudentToClass($_POST['idClass'], $_SESSION['user'][0]);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "removeStudent": {
                require './classController.php';
                session_start();
                $data = ClassController::removeStudent($_POST['idClass'], $_SESSION['user'][0]);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "takeATest": {
                require './testController.php';
                $data = TestController::takeATest($_POST['idTest']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "getListQuestionInTest": {
                require './testController.php';
                $data = TestController::getListQuestionInTest($_POST['idTest']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "chamBai": {
                require './testController.php';
                session_start();
                $data = TestController::chamBai($_POST['listAnswer'], $_POST['idTest'], $_SESSION['user'][0]);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;







        case "saveBasic": {
                require './profileController.php';
                $data = profileController::saveBasic($_POST['name'], $_POST['birth']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "saveContact": {
                require './profileController.php';
                $data = profileController::saveContact($_POST['phone']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "savePass": {
                require './profileController.php';
                $data = profileController::savePass($_POST['password']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;


        case "renderStudentAnnounment": {
                require './announcementController.php';
                $data = announcementController::renderAnnounment($_POST['idClass']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "renderAnnoucementContent": {
                require './announcementController.php';
                $data = announcementController::renderAnnoucementContent($_POST['idAnnouncement']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;



        case "createReport": {
                require './reportController.php';
                session_start();
                $data = ReportController::createReport($_SESSION['user'][0], $_POST['title'], $_POST['noiDung']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "renderReport": {
                require './reportController.php';
                $data = ReportController::renderReport();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "renderAnswer": {
                require './adminController.php';
                $data = adminController::renderAnswer();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "renderReportContent": {
                require './reportController.php';
                $data = ReportController::renderReportContent($_POST['idReport']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        case "verify": {
                require './reportController.php';
                $data = ReportController::verify($_POST['maReport'], $_POST['active']);
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
            break;
        default:
            echo 'default';
    }
}
