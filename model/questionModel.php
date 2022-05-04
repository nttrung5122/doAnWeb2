<?php

include '../model/dataProvider.php';

class QuestionModel {
    public static function getAllQuesstion(){
        $sql = "SELECT * FROM cauhoi_nganhang , nhomcauhoi WHERE cauhoi_nganhang.maNhom=nhomcauhoi.maNhomCauHoi;";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getAllGroupQuestions(){
        $sql = "SELECT * FROM `nhomcauhoi`;";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function createQuestionGroup($name){
        $sql = "INSERT INTO `nhomcauhoi`(`maNhomCauHoi`, `tenNhomCauHoi`) VALUES (NULL,'$name');";
        $data= DataProvider::executeSQL($sql);
        $sql = "SELECT * FROM nhomcauhoi WHERE tenNhomCauHoi='$name';";
        $data= DataProvider::executeSQL($sql);
        return mysqli_fetch_array($data)['maNhomCauHoi'];
    }

    public static function createQuestion($noiDung,$idGroup){
        $sql = "INSERT INTO `cauhoi_nganhang` (`maCau`, `maNhom`, `noiDung`) VALUES (NULL, '$idGroup', '$noiDung');";
        $data= DataProvider::executeSQL($sql);
        $sql = "SELECT * FROM `cauhoi_nganhang` WHERE noiDung='$noiDung';";
        $data= DataProvider::executeSQL($sql);
        return mysqli_fetch_array($data)['maCau'];
    }

    public static function createAnswer($maCau,$maLuaChon,$noiDung,$laDapAn){
        $sql = "INSERT INTO `luachon` (`maLuaChon`, `maCau`, `noiDung`, `laDapAn`) VALUES ('$maLuaChon', '$maCau', '$noiDung', '$laDapAn');";
        $data= DataProvider::executeSQL($sql);
    }
}