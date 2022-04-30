<?php

include '../model/dataProvider.php';

class ClassModel{

    public static function createClass($idClass,$info,$email,$name){
        $sql = "INSERT INTO `lop`(`maLop`, `tenLop`, `ThongTin`, `soLuong`, `maGiangVien`) VALUES ('$idClass','$name','$info','0','$email');";
        $data= DataProvider::executeSQL($sql);
    }

    public static function getClassOfTeacher($email){
        // $sql = "SELECT * FROM `lop` WHERE `maGiangVien`=\`$email\`;";
        $sql = "SELECT * FROM `lop` WHERE `maGiangVien`=\"$email\";";

        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getClassOfStudent($email){

    }

    public static function getAllClass(){
        $sql = "SELECT * FROM `lop`;";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getClass($idClass){
        $sql = "SELECT * FROM `lop` WHERE `maLop`=\"$idClass\";";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function deleteClass($idClass){
        $sql = "DELETE FROM `lop` WHERE `malop`='$idClass';";
        $data= DataProvider::executeSQL($sql);    
        //TO DO remove Student, remove Test
    }  

    public static function getStudentInClass($idClass){
        $sql = "SELECT hoTen FROM chitietlop,taikhoan WHERE chitietlop.maTaiKhoan=taikhoan.mail AND maLop=\"$idClass\";";
        $data= DataProvider::executeSQL($sql);    
        return $data;
    }

    public static function addStudent($idClass,$email){

    }

    public static function removeStudent($idClass,$email){

    }


}
?>