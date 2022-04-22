<?php

include './dataProvider.php';

class AuthModel{
    public static function getAllUsers(){
        $sql = "SELECT * FROM `taikhoan`;";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function getUsers($email){
        $sql = "SELECT * FROM `taikhoan` WHERE maTaiKhoan=\".$email.\";";
        $data= DataProvider::executeSQL($sql);
        return $data;
    }

    public static function checkUsers($email){
        $data=  AuthModel :: getAllUsers();
        while ($row = mysqli_fetch_array($data)){
            if($row[0]==$email){
                return true;
            }
            
        }
        return false;
    }   
    
    public static function createUser($email,$pass,$hoten,$ngaysinh,$sdt,$cv){        
        $sql = "INSERT INTO `taikhoan` (`mail`, `password`, `loaiTk`, `hoten`, `ngaysinh`, `sdt`) VALUES ('.$email.', '.$pass.', '.$cv.', '.$hoten.', '.$ngaysinh.', '.$sdt.');";
        $data=DataProvider::executeSQL($sql);
    }


}   
?>

