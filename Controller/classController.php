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

    public static function getClass($idClass){
        return mysqli_fetch_array(ClassModel::getClass($idClass));
    }

    public static function rederClass($email){
        $data=ClassModel::getClassOfUser($email);
        $result="";
        while ($row = mysqli_fetch_array($data)){
            $result .='            <li>
            <a href="#" class="nav-link link-dark" onclick="renderInfo(\''.$row['maLop'].'\')">'

                .$row['tenLop'].
            '</a>
        </li>';
        }
        echo $result;
    }

    public static function deleteClass($idClass){
        ClassModel::deleteClass($idClass);
        $data['notice']="Xóa lớp thành công";
        $data['status']="success";
        return $data;
    }
}





?>
