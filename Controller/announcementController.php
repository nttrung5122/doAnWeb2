<?php
include_once  '../model/announcementModel.php';
include_once  '../View/_partial/TeacherAndStudent_Component/announcement.php';
class announcementController{
    public static function renderAnnouncement($idClass)
    {
        $head = array('Mã thông báo', 'Mã lớp', 'Tiêu đề', 'Nội dung', 'Thời gian');
        $data = announcementModel::getAllAnnouncements($idClass);
        $result = announcement::createTableAnnouncement($head, $data);
        return $result;
    }

    public static function deleteAnnouncement($id) {
        announcementModel::deleteAnnouncement($id);
    }

    public static function editAnnouncement($id, $tieuDe, $noiDung, $thoiGian)
    {
        if ($tieuDe != null) {
            announcementModel::editAnnouncement($id, 'title', $tieuDe);
        }
        if ($noiDung != null) {
            announcementModel::editAnnouncement($id, 'notice', $noiDung);
        }
        if ($thoiGian != null) {
            announcementModel::editAnnouncement($id, 'date', $thoiGian);
        }
    }
}