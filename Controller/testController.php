<?php

include '../model/testModel.php';
include '../View/testView.php';


class TestController{

    public static function createTest($idClass,$thoiGianLamBai,$ngayThi,$daoCauHoi,$xemDiem,$xemDapAn){
        $data['maDe']=TestModel::createTest($idClass,$thoiGianLamBai,$ngayThi,$daoCauHoi,$xemDiem,$xemDapAn);
        $data['status']="success";
        $data['notice']="Tạo đề thành công";
        return $data;
    }


    public static function saveQuestionInTest($idTest,$arrQuestion){
        $data=TestModel::saveQuestionInTest($idTest,json_decode($arrQuestion));
        return $data;
    }
}


?>