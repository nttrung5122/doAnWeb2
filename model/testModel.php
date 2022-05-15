<?php

include '../model/dataProvider.php';

class TestModel{

    
    public static function getAllTest(){
        $sql = "SELECT * FROM `bode`   ORDER BY `maDe` DESC;";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function createTest($idClass,$nameTest,$thoiGianLamBai,$ngayThi,$daoCauHoi){
        $sql = "INSERT INTO `bode` (`maDe`,`tenDe`, `maLop`, `thoiGianLamBai`,`ngayThi`, `daoCauHoi`, `xemDiem`, `xemDapAn`) VALUES (NULL,'$nameTest', '$idClass', '$thoiGianLamBai','$ngayThi','$daoCauHoi', '','');";
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
        $sql = "SELECT bode.maDe,bode.tenDe,bode.maLop,bode.thoiGianLamBai,bode.ngayThi,bode.daoCauHoi,bode.xemDiem,bode.xemDapAn,AVG(bailam.diem) as diemtb FROM bode LEFT JOIN bailam on bode.maDe=bailam.maDe WHERE bode.maLop='$idClass' GROUP BY bode.maDe;";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getInfoTest($idTest){
        // $sql = "SELECT bode.maDe, bode.tenDe,bode.thoiGianLamBai,bode.ngayThi,bode.daoCauHoi,bode.xemDapAn,bode.xemDiem, COUNT(chitietdiem.maTaiKhoan) as slBai FROM `bode` LEFT JOIN chitietdiem on chitietdiem.maDe=bode.maDe WHERE bode.maDe='$idTest' GROUP BY bode.maDe;";
        $sql = "SELECT bode.maDe, bode.tenDe,bode.thoiGianLamBai,bode.ngayThi,bode.daoCauHoi,bode.xemDapAn,bode.xemDiem, COUNT(bailam.maTaiKhoan) as slBai FROM `bode` LEFT JOIN bailam on bailam.maDe=bode.maDe WHERE bode.maDe='$idTest' GROUP BY bode.maDe;";

        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function deleteTest($idTest){
        $sql = "DELETE FROM `boDe` WHERE `maDe`='$idTest';";
        $data= DataProvider::executeSQL($sql);    
        //TO DO remove Student, remove Test
    }

    public static function getListTestNoSubmit($idClass,$idStudent){
        $sql = "SELECT * FROM bode WHERE bode.maDe NOT IN ( SELECT bailam.maDe FROM bailam WHERE bailam.maTaiKhoan=\"$idStudent\") AND bode.maLop=\"$idClass\";";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function getListTestSubmited($idClass,$idStudent){
        $sql = "SELECT * FROM bode WHERE bode.maDe IN ( SELECT bailam.maDe FROM bailam WHERE bailam.maTaiKhoan=\"$idStudent\") AND bode.maLop=\"$idClass\";";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getInfoTestSubmited($idTest,$idStudent){
        $sql = "SELECT * FROM bailam,bode WHERE bailam.maDe=bode.maDe and bailam.maTaiKhoan='$idStudent' AND bailam.maDe='$idTest';";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getQuestionOfTest($idTest){
        $sql = "SELECT cauhoi_nganhang.noiDung, cauhoi_nganhang.maCau FROM chitietbode,cauhoi_nganhang WHERE chitietbode.maCau=cauhoi_nganhang.maCau and chitietbode.maBoDe='$idTest';";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getAnswerOfTest($idTest){
        $sql = "SELECT * FROM luachon WHERE luachon.maCau IN ( SELECT chitietbode.maCau FROM chitietbode WHERE chitietbode.maBoDe='$idTest');";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

    public static function taoChiTietBaiLam($listAnswer,$idTest,$email){
        $result="";
        foreach($listAnswer as $Answer){
            $maCau=$Answer->maCau;
            $luaChon=$Answer->luaChon;
            $sql = "INSERT INTO `chitietbailam`(`maTaiKhoan`, `maCau`, `maDe`, `dapAnChon`) VALUES ('$email','$maCau','$idTest','$luaChon');";
            $data = DataProvider::executeSQL($sql);
        }
    }

    public static function getQuestionAndAnswerOfTest($idTest){
        $sql = "SELECT cauhoi_nganhang.noiDung, cauhoi_nganhang.maCau,cauhoi_nganhang.dapAn FROM chitietbode,cauhoi_nganhang WHERE chitietbode.maCau=cauhoi_nganhang.maCau and chitietbode.maBoDe='$idTest';";
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function taoBaiLam($idTest,$email,$diem){
        $sql = "INSERT INTO `bailam`(`maTaiKhoan`, `maDe`, `diem`) VALUES ('$email','$idTest','$diem');";
        $data = DataProvider::executeSQL($sql);
    }

    public static function getBaiLam($idTest,$idStudent){
        $sql = "SELECT * FROM `chitietbailam` WHERE chitietbailam.maTaiKhoan='$idStudent' AND chitietbailam.maDe='$idTest';"; 
        $data = DataProvider::executeSQL($sql);
        return $data;
    }

}