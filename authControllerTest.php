<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use src\Controller\AuthController;

class authControllerTest extends TestCase
{
    // $user, $password,$expectResult
    public function testSignIn()
    {
        $user="";
        $password="";
        $expectedResult="";
        $authController = new AuthController();
        $data = $authController->signIn($user, $password);
        
        $result = $data['status'];
        
        $this->assertEquals($expectedResult, $result);
    }

}
