<?php 
include '../model/dataProvider.php';
class adminModel {
    public static function getAllAccounts() {
        $sql = 'SELECT * FROM TAIKHOAN';
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function getAllClasses() {
        $sql = 'SELECT * FROM LOP';
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function getAllQuestions() {
        $sql = 'SELECT * FROM cauhoi_nganhang';
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
}