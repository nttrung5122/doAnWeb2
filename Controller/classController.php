<?php

include '../model/classModel.php';
include '../View/classView.php';

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

    public static function getClassOfTeacher($email){
        $data= ClassModel::getClassOfTeacher($email);
        return $data;
    }

    public static function getClass($idClass){
        return mysqli_fetch_array(ClassModel::getClass($idClass));
    }

    public static function deleteClass($idClass){
        ClassModel::deleteClass($idClass);
        $data['notice']="Xóa lớp thành công";
        $data['status']="success";
        return $data;
    }

    public static function renderListClass($email){
        $dataSQL=ClassController::getClassOfTeacher($email);
        $data=ClassView::rederClass($dataSQL);
        // $data['status']="success";
        return $data;
    }

    public static function renderMember($idClass){
        $dataSQL= ClassModel::getStudentInClass($idClass);
        $data=ClassView::renderMember($dataSQL);
        return $data;
    }
}
    // echo ClassController::renderMember("5IabAbm4");




?>
