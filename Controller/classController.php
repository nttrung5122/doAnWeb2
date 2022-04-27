<?php

include '../model/classModel.php';

class ClassController{
    
    public static function checkClassExists($idClass){
        $data=ClassModel::getAllClass();
        while ($row = mysqli_fetch_array($data)){
            if($row[0]==$idClass){
                return true;
            }
            
        }
        return false;
    }

    public static function createClass($idClass,$info,$email,$name){
        if(ClassController::checkClassExists($idClass)){
            $data['notice']="Mã lớp đã tồn tại";
            $data['status']="fails";
            return $data;
        }
        else{
            ClassModel::createClass($idClass,$info,$email,$name);
            $data['status']="success";
            $data['notice']="Tạo lớp thành công";
            return $data;
        }

    }
}





?>
