<?php
include_once './model/announcementModel.php';
include_once './View/_partial/TeacherAndStudent_Component/Announcement.php';
class announcementController {
    public static function renderAnnounment($idClass) {
        $data = announcementModel::getAllAnnouncements($idClass);
        $result = Announcement::createAnnouncement($data);
        return $result;
    }

    public static function renderAnnoucementContent($idAnnouncement) {
        $data = announcementModel::getAnnouncementContent($idAnnouncement);
        $result = Announcement::createAnnouncementContent($data);
        return $result;
    }
}

switch (end($request_url_parts)) {
    case "renderStudentAnnounment": {
        $data = announcementController::renderAnnounment($_GET['idClass']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    case "renderAnnoucementContent": {
        $data = announcementController::renderAnnoucementContent($_GET['idAnnouncement']);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    break;
    
}