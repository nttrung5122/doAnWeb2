<?php

include '../model/dataProvider.php';


class ReportModel{
    public static function createReport($email,$title,$noiDung){
        $sql = "INSERT INTO `report`(`maReport`, `maGv`, `tieuDe`, `noiDung`) VALUES (null,'$email','$title','$noiDung');";
        $data = DataProvider::executeSQL($sql);
    }
}