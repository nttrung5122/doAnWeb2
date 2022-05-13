<?php

include '../model/testModel.php';
include '../View/testView.php';


class TestController{

    public static function createTest($idClass,$nameTest,$thoiGianLamBai,$ngayThi,$daoCauHoi,$xemDiem,$xemDapAn){
        $data['maDe']=TestModel::createTest($idClass,$nameTest,$thoiGianLamBai,$ngayThi,$daoCauHoi,$xemDiem,$xemDapAn);
        $data['status']="success";
        $data['notice']="Tạo đề thành công";
        return $data;
    }


    public static function saveQuestionInTest($idTest,$arrQuestion){
        $data=TestModel::saveQuestionInTest($idTest,json_decode($arrQuestion));
        $result['notice']='Thêm câu hỏi thành công';
        $result['status'] = 'success';
        return $result;
    }

    public static function renderListTest($idClass){
        $data=TestModel::getTestOfClass($idClass);
        $result=TestView::renderListTest($data);
        return $result;
    }

    public static function renderInfoTest($idTest){
        $data=TestModel::getInfoTest($idTest);
        $result=TestView::renderInfoTest($data);
        return $result;
    }

    public static function deleteTest($idTest){
        TestModel::deleteTest($idTest);
        $data['notice']="Xóa đề thành công";
        $data['status']="success";
        return $data;
    }

    public static function renderListTestInStudent($idClass,$idStudent){
        $listTestNoSubmit=TestModel::getListTestNoSubmit($idClass,$idStudent);
        $listTestSubmit=TestModel::getListTestSubmited($idClass,$idStudent);
        $result=TestView::renderListTestInStudent($listTestNoSubmit,$listTestSubmit);
        return $result;
    }

    public static function renderInfoTestNoSubmit($idTest){
        $data=TestModel::getInfoTest($idTest);
        $result=TestView::renderInfoTestNoSubmit(mysqli_fetch_array($data));
        return $result;
    }

    public static function renderInfoTestSubmited($idTest,$idStudent){
        $data=TestModel::getInfoTestSubmited($idTest,$idStudent);
        $result=TestView::renderInfoTestSubmited(mysqli_fetch_array($data));
        return $result;
    }
}


?>