<?php


include '../model/reportModel.php';

class ReportController{
    public static function createReport($email,$title,$noiDung){
        ReportModel::createReport($email,$title,$noiDung);
        $data['status']="success";
        $data['notice']="Gửi thông báo thành công";
        return $data;
    }
}