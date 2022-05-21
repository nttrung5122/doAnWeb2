<?php
include_once '../model/dataProvider.php';
class announcementModel
{
    public static function getAllAnnouncements($idClass)
    {
        $slq = 'SELECT * FROM thongbao where thongbao.idClass = "' . $idClass  . '";';
        $data = DataProvider::executeSQL($slq);
        return $data;
    }

    public static function deleteAnnouncement($id)
    {
        $sql = 'DELETE FROM thongbao WHERE thongbao.idNotice = "' . $id . '";';
        DataProvider::executeSQL($sql);
    }

    public static function editAnnouncement($id, $field, $info)
    {
        $sql = 'UPDATE thongbao SET ' . $field . ' = "' . $info . '" WHERE idNotice = "' . $id . '"';
        DataProvider::executeSQL($sql);
    }

    public static function insertAnnouncement($maThongBao, $maLop, $tieuDe, $noiDung, $thoiGian)
    {
        $sql = 'INSERT INTO `thongbao` (`idNotice`, `idClass`, `title`, `notice`, `date`) VALUES ("' . $maThongBao . '", "' . $maLop . '", "' . $tieuDe . '", "' . $noiDung . '", "' . $thoiGian . '");';
        dataProvider::executeSQL($sql);
    }
}
