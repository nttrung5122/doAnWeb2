<?php

include '../model/dataProvider.php';

class AuthModel{
    public static function getAllUsers(){
        $sql = "SELECT * FROM `taikhoan`;";
        $dataSql= DataProvider::executeSQL($sql);
        return $dataSql;
    }

    public static function getUsers($email){
        $sql = "SELECT * FROM `taikhoan` WHERE `mail` =\"$email\";";
        $dataSql= DataProvider::executeSQL($sql);
        return $dataSql;
    }

    public static function checkUsersExit($email){
        $dataSql=  AuthModel :: getAllUsers();
        while ($row = mysqli_fetch_array($dataSql)){
            if($row[0]==$email){
                return true;
            }
            
        }
        return false;
    }   
    
    public static function createUser($email,$pass,$hoten,$ngaysinh,$sdt,$cv){        
        $sql = "INSERT INTO `taikhoan` (`mail`, `password`, `loaiTk`, `hoten`, `ngaysinh`, `sdt`) VALUES ('$email', '$pass', '$cv', '$hoten', '$ngaysinh', '$sdt');";
        $dataSql=DataProvider::executeSQL($sql);
    }
    

}   
?>

