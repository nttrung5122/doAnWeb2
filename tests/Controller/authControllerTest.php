<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controller\AuthController;

class authControllerTest extends TestCase
{
    static public function dataProviderTestSignIn(){
        return [
            ["admin1@gmail.com","11111111","success"],
            ["admin1@gmail.com","222222","fail"],
            ["hocsinh1@gmail.com","11111111","success"],
            ["gv1@gmail.com","22222","success"],
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

}
