<?php
namespace App\Controller;
use App\model\TestModel;
use App\View\TestView;
// include './model/testModel.php';
// include './View/testView.php';


class TestController
{

    public static function createTest($idClass, $nameTest, $thoiGianLamBai, $ngayThi, $daoCauHoi, $loaiDe)
    {
        $data['maDe'] = TestModel::createTest($idClass, $nameTest, $thoiGianLamBai, $ngayThi, $daoCauHoi, $loaiDe);
        $data['status'] = "success";
        $data['notice'] = "Tạo đề thành công";
        return $data;
    }


    public static function saveQuestionInTest($idTest, $arrQuestion, $loaiDe)
    {
        if ($loaiDe == 'default') {
            $data = TestModel::saveQuestionInTestDefault($idTest, json_decode($arrQuestion));
            $result['notice'] = 'Thêm câu hỏi thành công';
            $result['status'] = 'success';
        } else {
            $data = TestModel::saveQuestionInTestPDF($idTest, json_decode($arrQuestion));
            $result['notice'] = 'Tạo đáp án thành công';
            $result['status'] = 'success';
        }
        return $result;
    }

    public static function renderListTest($idClass)
    {
        $data = TestModel::getTestOfClass($idClass);
        $result = TestView::renderListTest($data);
        return $result;
    }

    public static function renderInfoTest($idTest)
    {
        $data = TestModel::getInfoTest($idTest);
        $result = TestView::renderInfoTest($data);
        return $result;
    }

    public static function deleteTest($idTest)
    {
        TestModel::deleteTest($idTest);
        $data['notice'] = "Xóa đề thành công";
        $data['status'] = "success";
        return $data;
    }

    public static function renderListTestInStudent($idClass, $idStudent)
    {
        $listTestNoSubmit = TestModel::getListTestNoSubmit($idClass, $idStudent);
        $listTestSubmit = TestModel::getListTestSubmited($idClass, $idStudent);
        $result = TestView::renderListTestInStudent($listTestNoSubmit, $listTestSubmit);
        return $result;
    }

    public static function renderInfoTestNoSubmit($idTest)
    {
        $data = TestModel::getInfoTest($idTest);
        $result = TestView::renderInfoTestNoSubmit(mysqli_fetch_array($data));
        return $result;
    }

    public static function renderInfoTestSubmited($idTest, $idStudent)
    {
        $data = TestModel::getInfoTestSubmited($idTest, $idStudent);
        $result = TestView::renderInfoTestSubmited(mysqli_fetch_array($data));
        return $result;
    }

    public static function takeATest($idTest)
    {
        $data['infoTest'] = mysqli_fetch_array(TestModel::getInfoTest($idTest));
        if ($data['infoTest']['loaiDe'] == 'default') {
            $listQuestionSql = TestModel::getQuestionOfTest($idTest);
            $listQuestion = array();
            while ($row = mysqli_fetch_array($listQuestionSql)) {
                $listQuestion[] = $row;
            }
            $listAnswer = array();
            $listAnswerSql = TestModel::getAnswerOfTest($idTest);
            while ($row = mysqli_fetch_array($listAnswerSql)) {
                $listAnswer[] = $row;
            }
            if ($data['infoTest']['daoCauHoi'] == 'true') {
                shuffle($listQuestion);
            }
            $data['html'] = TestView::renderTestForStudent($listQuestion, $listAnswer);
        } else {
            $listQuestionSql = TestModel::getQuestionOfTestPDF($idTest);
            $listQuestion = array();
            while ($row = mysqli_fetch_array($listQuestionSql)) {
                $listQuestion[] = $row;
            }
            $data['html'] = TestView::renderTestPDFForStudent($listQuestion, $idTest);
        }
        return $data;
    }

    public static function getListQuestionInTest($idTest)
    {
        $listQuestionSql = TestModel::getQuestionOfTest($idTest);
        $listQuestion = array();
        while ($row = mysqli_fetch_array($listQuestionSql)) {
            $listQuestion[] = $row;
        }
        return $listQuestion;
    }

    public static function chamBai($listAnswer, $idTest, $email)
    {
        $tong = 0;
        $soCauDung = 0;
        $listAnswer = json_decode($listAnswer);
        $cnt=0;
        $infoTest = mysqli_fetch_array(TestModel::getInfoTest($idTest));
        TestModel::taoChiTietBaiLam($listAnswer, $idTest, $email, $infoTest['loaiDe']);
        if ($infoTest['loaiDe'] == 'default') {
            $Question = TestModel::getQuestionAndAnswerOfTest($idTest);
            while ($row = mysqli_fetch_array($Question)) {
                $tong++;
                foreach ($listAnswer as $answer) {
                    if ($row['maCau'] == $answer->maCau) {
                        if ($row['dapAn'] == $answer->luaChon) {
                            $soCauDung++;
                        }
                    }
                }
            }
        } else {
            $Question = TestModel::getQuestionOfTestPDF($idTest);
            while ($row = mysqli_fetch_array($Question)) {
                if ($row['dapAn'] == $listAnswer[$row['maCau']]) {
                    $soCauDung++;
                }
                $tong++;
            }
        }
        TestModel::taoBaiLam($idTest, $email, round(($soCauDung / $tong) * 10, 2));
        return round(($soCauDung / $tong) * 10, 2);
    }

    public static function getTest($idTest)
    {
        $data = TestModel::getInfoTest($idTest);
        return mysqli_fetch_array($data);
    }

    public static function alterInfoTest($idTest, $nameTest, $thoiGianLamBai, $ngayThi, $daoCauHoi, $loaiDe)
    {
        TestModel::alterInfoTest($idTest, $nameTest, $thoiGianLamBai, $ngayThi, $daoCauHoi);
        if ($loaiDe == 'default') {
            $listQuestionsql = TestModel::getQuestionOfTest($idTest);
            $listQuestion = array();
            while ($row = mysqli_fetch_array($listQuestionsql)) {
                $listQuestion[] = $row['maCau'];
            }
        } else {
            $listQuestionsql = TestModel::getQuestionOfTestPDF($idTest);
            $listQuestion = array();
            while ($row = mysqli_fetch_array($listQuestionsql)) {
                $listQuestion[] = $row['dapAn'];
            }
        }
        return $listQuestion;
    }


    public static function getTestscores($idTest, $idClass)
    {
        $data = TestModel::getTestscores($idTest, $idClass);
        $listScores = array();
        while ($row = mysqli_fetch_array($data)) {
            $listScores[] = $row;
        }
        $result['scorce'] = $listScores;
        $result['infoTest'] = TestController::getTest($idTest);
        return $result;
    }

    public static function showTestscores($idTest, $idClass)
    {
        $data = TestModel::getTestscores($idTest, $idClass);
        $result = TestView::showTestscores($data);
        return $result;
    }

    public static function showDetailstestscores($idTest, $idStudent)
    {
        $answer = TestModel::getQuestionAndAnswerOfTest($idTest);
        $listAnswer = array();
        while ($row = mysqli_fetch_array($answer)) {
            $listAnswer[] = $row;
        }
        $baiLam = TestModel::getBaiLam($idTest, $idStudent);
        $data = TestView::showDetailstestscores($listAnswer, $baiLam);
        return $data;
    }

    public static function getDetailstestscores($idTest, $idStudent)
    {
        $soCaudung = 0;
        $soCausai = 0;
        $soCauchualam = 0;
        $infoTest = TestController::getTest($idTest);
        if ($infoTest['loaiDe'] == 'default') {

            $answer = TestModel::getQuestionAndAnswerOfTest($idTest);
            $listAnswer = array();
            while ($row = mysqli_fetch_array($answer)) {
                $listAnswer[] = $row;
            }
            $baiLam = TestModel::getBaiLam($idTest, $idStudent);
            while ($row = mysqli_fetch_array($baiLam)) {
                if ($row['dapAnChon'] == '') {
                    $soCauchualam++;
                    $result[strval($row['maCau'])] = 'Chưa làm';
                } else {
                    // $test++;
                    foreach ($listAnswer as $answer) {
                        if ($row['maCau'] == $answer['maCau']) {
                            if ($row['dapAnChon'] == $answer['dapAn']) {
                                $soCaudung++;
                                $result[strval($row['maCau'])] = 'Đúng';
                            } else {
                                $soCausai++;
                                $result[strval($row['maCau'])] = 'Sai';
                            }
                        }
                    }
                }
            }
        }
        else{
            $dataSql = TestModel::getQuestionOfTestPDF($idTest);
            $listQuestion = array();
            while ($row = mysqli_fetch_array($dataSql)) {
                $listQuestion[] = $row;
            }
            $baiLam = TestModel::getBaiLam($idTest, $idStudent);
            while ($row = mysqli_fetch_array($baiLam)) {
                if ($row['dapAnChon'] == '') {
                    $soCauchualam++;
                    $result[strval($row['maCau'])] = 'Chưa làm';
                } else {
                    // $test++;
                    foreach ($listQuestion as $answer) {
                        if ($row['maCau'] == $answer['maCau']) {
                            if ($row['dapAnChon'] == $answer['dapAn']) {
                                $soCaudung++;
                                $result[strval($row['maCau'])] = 'Đúng';
                            } else {
                                $soCausai++;
                                $result[strval($row['maCau'])] = 'Sai';
                            }
                        }
                    }
                }
            }
            

        }
        $result['Số câu sai'] = $soCausai;
        $result['Số câu đúng'] = $soCaudung;
        $result['Số câu chưa làm'] = $soCauchualam;
        return $result;
    }

    public static function getDetialtest($idTest)
    {
        $infoTest = mysqli_fetch_array(TestModel::getInfoTest($idTest));
        $result['loaiDe'] = $infoTest['loaiDe'];
        $data = array();
        if ($infoTest['loaiDe'] == 'default') {
            $dataSql = TestModel::getDetialtest($idTest);
            while ($row = mysqli_fetch_array($dataSql)) {
                $data[] = $row;
            }
        } else {
            $dataSql = TestModel::getQuestionOfTestPDF($idTest);
            while ($row = mysqli_fetch_array($dataSql)) {
                $data[] = $row;
            }
        }
        $result['data'] = $data;
        // return $data;
        return $result;
    }

    public static function getDetialtestPDF($idTest)
    {
        $dataSql = TestModel::getQuestionOfTestPDF($idTest);
        $data = array();
        while ($row = mysqli_fetch_array($dataSql)) {
            $data[] = $row;
        }
        return $data;
    }
}
if(isset($request_url_parts))
switch (end($request_url_parts)) {
    case "saveQuestionInTest": {
        $data = TestController::saveQuestionInTest($_POST['idTest'], $_POST['arrQuestion'], $_POST['loaiDe']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "createTest": {
        $data = TestController::createTest($_POST["idClass"], $_POST['nameTest'], $_POST["thoiGianLamBai"], $_POST["ngayThi"], $_POST["daoCauHoi"], $_POST["loaiDe"]);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "renderInfoTest": {
        $data = TestController::renderInfoTest($_GET['idTest']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "renderListTest": {
        $data = TestController::renderListTest($_GET['idClass']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "deleteTest": {
        $data = TestController::deleteTest($_POST['idTest']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "showTestscores": {
        $data = TestController::showTestscores($_GET['idTest'], $_GET['idClass']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "showDetailstestscores": {
        $data = TestController::showDetailstestscores($_GET['idTest'], $_GET['idStudent']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "getTest": {
        $date = TestController::getTest($_GET['idTest']);
        echo json_encode($date, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "alterInfoTest": {
        $data = TestController::alterInfoTest($_POST["idTest"], $_POST['nameTest'], $_POST["thoiGianlambai"], $_POST["ngayThi"], $_POST["daoCauHoi"],$_POST["loaiDe"]);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "getDetialtest": {
        $data = testController::getDetialtest($_GET['idTest']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "getDetailstestscores": {
        $data = testController::getDetailstestscores($_GET['idTest'], $_GET['Email']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "getTestscores": {
        $data = testController::getTestscores($_GET['idTest'], $_GET['idClass']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "renderListTestInStudentPage": {
        $data = TestController::renderListTestInStudent($_GET['idClass'], $_SESSION['user'][0]);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "renderInfoTestNoSubmit": {
        $data = TestController::renderInfoTestNoSubmit($_GET['idTest']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "renderInfoTestSubmited": {
        $data = TestController::renderInfoTestSubmited($_GET['idTest'], $_SESSION['user'][0]);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "takeATest": {
        $data = TestController::takeATest($_GET['idTest']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "getListQuestionInTest": {
        $data = TestController::getListQuestionInTest($_GET['idTest']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "chamBai": {
        $data = TestController::chamBai($_POST['listAnswer'], $_POST['idTest'], $_SESSION['user'][0]);
        // echo $_POST['listAnswer'];
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
}