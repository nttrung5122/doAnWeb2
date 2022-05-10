<?php

include '../model/dataProvider.php';

class TestModel{

    
    public static function getAllTest(){
        $sql = "SELECT * FROM `bode`   ORDER BY `maDe` DESC;";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function createTest($idClass,$thoiGianLamBai,$ngayThi,$daoCauHoi,$xemDiem,$xemDapAn){
        $sql = "INSERT INTO `bode` (`maDe`, `maLop`, `thoiGianLamBai`,`ngayThi`, `daoCauHoi`, `xemDiem`, `xemDapAn`) VALUES (NULL, '$idClass', '$thoiGianLamBai','$ngayThi','$daoCauHoi', '$xemDiem','$xemDapAn');";
        $data= DataProvider::executeSQL($sql);
        $data=mysqli_fetch_array(TestModel::getAllTest());
        return $data['maDe'];
    }   

    public static function deleteQuestionInTest($idTest){
        $sql = "DELETE FROM `chitietbode` WHERE maBoDe='$idTest';";
        $data = DataProvider::executeSQL($sql);
    }

    public static function saveQuestionInTest($idTest,$arrQuestion){
        TestModel::deleteQuestionInTest($idTest);
        foreach($arrQuestion as &$value ){            
            $sql = "INSERT INTO `chitietbode` (`maCau`, `maBoDe`) VALUES ('$value', '$idTest');";
            $tmp= DataProvider::executeSQL($sql);
        }
        $data['status'] = 'success';
        return $data;
    }
}