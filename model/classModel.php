<?php

include '../model/dataProvider.php';

class ClassModel{

    public static function createClass($idClass,$info,$email,$name){
        $sql = "INSERT INTO `lop`(`maLop`, `tenLop`, `ThongTin`, `soLuong`, `maGiangVien`) VALUES ('$idClass','$name','$info','0','$email');";
        $data= DataProvider::executeSQL($sql);
    }

    public static function getAllClass(){
        $sql = "SELECT * FROM `lop`;";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function deleteClass($idClass){


    }

    public static function getInfoClass($idClass){

    }

    public static function getStudentInClass($idClass){

    }

    public static function addStudent($idClass,$email){

    }

    public static function removeStudent($idClass,$email){

    }


}
    
?>