<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controller\ClassController;
use App\model\DataProvider;

class classControllerTest extends TestCase{
    static public function dataProviderTestCheckClassExists(){
        return [
            ['malop1',true],
            ['malop2',true],
            ['malop3',false],
            ['malop4',false],
            ['malop5',false],
        ];        
    }

    /**
     * @dataProvider dataProviderTestCheckClassExists
     */

    public function testCheckClassExists($idClass,$expectedResult){
        if($expectedResult){
            $sql = "INSERT INTO `lop`(`maLop`) VALUES ('$idClass');";
            DataProvider::executeSQL($sql);
        }

        $data = ClassController::checkClassExists($idClass);
        $result = $data;

        if($expectedResult){
            $sql = "DELETE FROM `lop` WHERE lop.maLop = '$idClass';";
            DataProvider::executeSQL($sql);
        }

        $this->assertEquals($expectedResult, $result);
    }

}