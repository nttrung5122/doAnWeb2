<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controller\AuthController;
use App\model\DataProvider;

class authControllerTest extends TestCase
{
    static public function dataProviderTestSignIn(){
        return [
            ["admin@gmail.com","11111111","success"],
            ["admin@gmail.com","222222","fail"],
            ["hocsinh1@gmail.com","11111111","fail"],
            ["gv1@gmail.com","11111111","success"],
            ["trung123@gmail.com","22222","fail"]
        ];        
    }

    /**
     * @dataProvider dataProviderTestSignIn
     */
    public function testSignIn($user, $password,$expectedResult)
    {

        $data = AuthController::signIn($user, $password);
        $result = $data['status'];

        $this->assertEquals($expectedResult, $result);
    }



    static public function dataProviderTestSignUp(){
        return [
            ["test1@gmail.com","fail"],
            ["test2@gmail.com","success"],
            ["test3@gmail.com","success"],
            ["test4@gmail.com","fail"],
            ["test5@gmail.com","success"],
        ];        
    }

    /**
     * @dataProvider dataProviderTestSignUp
     */
    public function testSignUp($user,$expectedResult)
    {
        if(strcmp($expectedResult,'fail')==0){
            $sql = "INSERT INTO `taikhoan`(`mail`) VALUES ('$user');";
            DataProvider::executeSQL($sql);
        }
        $data = AuthController::signUp($user, null, null,null,null,null,null,null);
        $result = $data['status'];
        
        $sql = "DELETE FROM taikhoan WHERE `taikhoan`.`mail` = '$user';";
        DataProvider::executeSQL($sql);

        $this->assertEquals($expectedResult, $result);
    }
}
