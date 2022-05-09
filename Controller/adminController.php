<?php
include "../View/Admin_Component.php";
include "../model/adminModel.php";
class adminController {
    public static function renderAccountTable() {
        $head = array('Email', 'Mật khẩu', 'Chức vụ', 'Tên', 'Ngày sinh', 'Số điện thoại');
        $data = adminModel::getAllAccounts();
        $result = adminTable::createTable($head, $data, adminTable::$accountModal);
        return $result;
    }
    public static function renderClassTable() {
        $head = array('Mã lớp', 'Tên lớp', 'Thông tin', 'Số lượng', 'Email giảng viên');
        $data = adminModel::getAllClasses();
        $result = adminTable::createTable($head, $data, adminTable::$classModal);
        return $result;
    }
    public static function renderClassQuestion() {
        $head = array('Mã câu', 'Mã nhóm', 'Nội dung');
        $data = adminModel::getAllQuestions();
        $result = adminTable::createTable($head, $data, adminTable::$questionModal);
        return $result;
    }
}