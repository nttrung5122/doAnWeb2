<?php
include '../model/dataProvider.php';
class adminModel
{
    public static function getAccount($mail)
    {
        $sql = 'SELECT * FROM TAIKHOAN where mail = "'.$mail.'"';
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function getAllAccounts()
    {
        $sql = 'SELECT * FROM TAIKHOAN';
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function getAllClasses()
    {
        $sql = 'SELECT * FROM lop';
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function getAllQuestions()
    {
        $sql = 'SELECT * FROM cauhoi_nganhang';
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function getAllGroupQuestions()
    {
        $sql = 'SELECT * FROM nhomcauhoi';
        $data = DataProvider::executeSQL($sql);
        return $data;
    }
    public static function deleteAccount($id)
    {
        $sql = 'DELETE FROM taikhoan WHERE taikhoan.mail = "' . $id . '";';
        DataProvider::executeSQL($sql);
    }
    public static function deleteClass($id)
    {
        $sql = 'DELETE FROM lop WHERE lop.maLop = "' . $id . '";';
        DataProvider::executeSQL($sql);
    }
    public static function deleteQuestion($id)
    {
        $sql = 'DELETE FROM cauhoi_nganhang WHERE cauhoi_nganhang.maCau = "' . $id . '";';
        DataProvider::executeSQL($sql);
    }
    public static function deleteGroupQuestion($id)
    {
        $sql = 'DELETE FROM nhomcauhoi WHERE nhomcauhoi.maNhomCauHoi = "' . $id . '";';
        DataProvider::executeSQL($sql);
    }

    public static function editAccount($id, $field, $info)
    {
        $sql = 'UPDATE TAIKHOAN SET ' . $field . ' = "' . $info . '" WHERE mail = "' . $id . '"';
        DataProvider::executeSQL($sql);
    }

    public static function editAccountWithoutCondition($field, $info)
    {
        $sql = 'UPDATE TAIKHOAN SET ' . $field . ' = "' . $info . '"';
        DataProvider::executeSQL($sql);
    }

    public static function editClass($id, $field, $info)
    {
        $sql = 'UPDATE LOP SET ' . $field . ' = "' . $info . '" WHERE maLop = "' . $id . '"';
        DataProvider::executeSQL($sql);
    }
    public static function editQuestion($id, $field, $info)
    {
        $sql = 'UPDATE cauhoi_nganhang SET ' . $field . ' = "' . $info . '" WHERE maCau = "' . $id . '"';
        DataProvider::executeSQL($sql);
    }
    public static function editGroupQuestion($id, $field, $info)
    {
        $sql = 'UPDATE nhomcauhoi SET ' . $field . ' = "' . $info . '" WHERE maNhomCauHoi = "' . $id . '"';
        DataProvider::executeSQL($sql);
    }
    public static function createGroupQuestion($tenNhomCauHoi) {
        $sql = "INSERT INTO `nhomcauhoi`(`maNhomCauHoi`, `tenNhomCauHoi`) VALUES (NULL,'$tenNhomCauHoi');";
        DataProvider::executeSQL($sql);
    }
}
