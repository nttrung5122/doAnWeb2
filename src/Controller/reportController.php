<?php


include './model/reportModel.php';
include './View/reportView.php';

class ReportController{
    public static function createReport($email,$title,$noiDung){
        ReportModel::createReport($email,$title,$noiDung);
        $data['status']="success";
        $data['notice']="Gửi thông báo thành công";
        return $data;
    }
    public static function renderReport() {
        $data = ReportModel::getAllReports();
        $result = reportView::createReport($data);
        return $result;
    }
    public static function renderReportContent($maReport) {
        $data = ReportModel::getReport($maReport);
        $result = reportView::createReportContent($data);
        return $result;
    }
    public static function verify($maReport, $active) {
        $data = ReportModel::editReport($maReport,'trangThai',$active);
    }
}

switch (end($request_url_parts)) {
    case "renderReport": {
        $data = ReportController::renderReport();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "renderReportContent": {
        $data = ReportController::renderReportContent($_GET['idReport']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "verify": {
        $data = ReportController::verify($_POST['maReport'], $_POST['active']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "createReport": {
        $data = ReportController::createReport($_SESSION['user'][0], $_POST['title'], $_POST['noiDung']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
}