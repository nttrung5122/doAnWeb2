<?php

include '../model/dataProvider.php';

class TestModel{

    
    public static function getAllTest(){
        $sql = "SELECT * FROM `bode`   ORDER BY `maDe` DESC;";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function createTest($idClass,$nameTest,$thoiGianLamBai,$ngayThi,$daoCauHoi,$xemDiem,$xemDapAn){
        $sql = "INSERT INTO `bode` (`maDe`,`tenDe`, `maLop`, `thoiGianLamBai`,`ngayThi`, `daoCauHoi`, `xemDiem`, `xemDapAn`) VALUES (NULL,'$nameTest', '$idClass', '$thoiGianLamBai','$ngayThi','$daoCauHoi', '$xemDiem','$xemDapAn');";
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

    public static function getTestOfClass($idClass){
        $sql = "SELECT bode.maDe,bode.tenDe,bode.maLop,bode.thoiGianLamBai,bode.ngayThi,bode.daoCauHoi,bode.xemDiem,bode.xemDapAn,AVG(chitietdiem.diem) as diemtb FROM bode LEFT JOIN chitietdiem on bode.maDe=chitietdiem.maDe WHERE maLop='$idClass' GROUP BY bode.maDe;";
        // $sql = "SELECT * FROM `bode` WHERE 1";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getInfoTest($idTest){
        $sql = "SELECT bode.maDe, bode.tenDe,bode.thoiGianLamBai,bode.ngayThi,bode.daoCauHoi,bode.xemDapAn,bode.xemDiem, COUNT(chitietdiem.maTaiKhoan) as slBai FROM `bode` LEFT JOIN chitietdiem on chitietdiem.maDe=bode.maDe WHERE bode.maDe='$idTest' GROUP BY bode.maDe;";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function deleteTest($idTest){
        $sql = "DELETE FROM `boDe` WHERE `maDe`='$idTest';";
        $data= DataProvider::executeSQL($sql);    
        //TO DO remove Student, remove Test
    }

}