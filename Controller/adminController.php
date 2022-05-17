<?php
include "../View/Admin_Component.php";
include "../model/adminModel.php";
class adminController
{
    public static function renderAccountTable()
    {
        $head = array('Email', 'Mật khẩu', 'Chức vụ', 'Tên', 'Ngày sinh', 'Số điện thoại', 'Kích hoạt');
        $data = adminModel::getAllAccounts();
        $result = adminTable::createTable($head, $data, adminTable::$accountModal);
        return $result;
    }
    public static function renderClassTable()
    {
        $head = array('Mã lớp', 'Tên lớp', 'Thông tin', 'Email giảng viên');
        $data = adminModel::getAllClasses();
        $result = adminTable::createTable($head, $data, adminTable::$classModal);
        return $result;
    }
    public static function renderQuestionTable()
    {
        $head = array('Mã câu', 'Mã nhóm', 'Nội dung', 'Đáp án');
        $data = adminModel::getAllQuestions();
        $result = adminTable::createTable($head, $data, adminTable::$questionModal);
        return $result;
    }
    public static function clickDelete($id, $type)
    {
        if ($type == adminTable::$accountModal) {
            adminModel::deleteAccount($id);
            return self::renderAccountTable();
        } else if ($type == adminTable::$classModal) {
            adminModel::deleteClass($id);
            return self::renderClassTable();
        } else {
            adminModel::deleteQuestion($id);
            return self::renderQuestionTable();
        }
    }

    public static function editAccount($id, $password, $role, $name, $birth, $phone)
    {
        if ($password != null) {
            adminModel::editAccount($id, 'password', $password);
        }
        if ($role != null) {
            adminModel::editAccount($id, 'loaiTk', $role);
        }
        if ($name != null) {
            adminModel::editAccount($id, 'hoten', $name);
        }
        if ($birth != null) {
            adminModel::editAccount($id, 'ngaysinh', $birth);
        }
        if ($phone != null) {
            adminModel::editAccount($id, 'sdt', $phone);
        }
        return self::renderAccountTable();
    }

    public static function editClass($id, $tenLop, $thongTin, $email)
    {
        if ($tenLop != null) {
            adminModel::editClass($id, 'tenLop', $tenLop);
        }
        if ($thongTin != null) {
            adminModel::editClass($id, 'ThongTin', $thongTin);
        }
        if ($email != null) {
            adminModel::editClass($id, 'maGiangVien', $email);
        }
        return self::renderClassTable();
    }

    public static function editQuestion($id, $maNhom, $noiDung, $dapAn)
    {
        if ($maNhom != null) {
            adminModel::editQuestion($id, 'maNhom', $maNhom);
        }
        if ($noiDung != null) {
            adminModel::editQuestion($id, 'noiDung', $noiDung);
        }
        if ($dapAn != null) {
            adminModel::editQuestion($id, 'dapAn', $dapAn);
        }
        return self::renderQuestionTable();
    }

    public static function active($id, $active) {
        adminModel::editAccount($id, 'active', $active);
    }
}
