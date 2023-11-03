<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controller\TestController;
use App\model\DataProvider;

class testControllerTest extends TestCase
{
    static public function dataProviderTestChamBaiTestDefault()
    {
        return [
            [
                [
                    ['12037', 'a'],
                    ['12038', 'a'],
                    ['12039', 'a'],
                    ['12040', 'a'],
                    ['12041', 'a'],
                    ['12042', 'a'],
                    ['12043', 'a'],
                    ['12044', 'a'],
                    ['12045', 'a'],
                    ['12046', 'a'],
                ],
                "54084", 10
            ],
            [
                [
                    ['12037', 'a'],
                    ['12038', 'a'],
                    ['12039', 'a'],
                    ['12040', 'a'],
                    ['12041', 'a'],
                    ['12042', 'a'],
                    ['12043', ''],
                    ['12044', ''],
                    ['12045', ''],
                    ['12046', ''],
                ],
                "54084", 6
            ],
            [
                [
                    ['12037', 'b'],
                    ['12038', 'b'],
                    ['12039', 'b'],
                    ['12040', 'b'],
                    ['12041', 'b'],
                    ['12042', ''],
                    ['12043', ''],
                    ['12044', ''],
                    ['12045', ''],
                    ['12046', ''],
                ],
                "54084", 0
            ],
        ];
    }
    static public function dataProviderTestChamBaiTestPDF()
    {
        return [
            [
                [
                    'A','A','A','A','A','A','A','A','A','A',
                ],
                "54081", 10
            ],
            [
                [
                    'A','A','A','A','A','A','A','A','B','B',
                ],
                "54081", 8
            ],
            [
                [
                    'A','A','A','A','A','A','B','','','B',
                ],
                "54081", 6
            ],
        ];
    }

    /**
     * @dataProvider dataProviderTestChamBaiTestPDF
     */
    public function testChamBaiTestPDF($listAnswer, $idTest, $expectedResult)
    {

        $listAnswer = json_encode($listAnswer);
        $resutl = TestController::chamBai($listAnswer, $idTest, null);

        $sql = "DELETE FROM chitietbailam WHERE chitietbailam.maTaiKhoan='';";
        DataProvider::executeSQL($sql);
        $sql = "DELETE FROM bailam WHERE bailam.maTaiKhoan='';";
        DataProvider::executeSQL($sql);

        $this->assertEquals($expectedResult, $resutl);
    }


        /**
     * @dataProvider dataProviderTestChamBaiTestDefault
     */
    public function testChamBaiTestDefault($listAnswer, $idTest, $expectedResult)
    {

        $listAnswer =  array_map(fn ($obj)=>[
            'maCau' => $obj[0],
            'luaChon' => $obj[1],
          ], $listAnswer);
        $listAnswer = json_encode($listAnswer);
        $resutl = TestController::chamBai($listAnswer, $idTest, null);

        $sql = "DELETE FROM chitietbailam WHERE chitietbailam.maTaiKhoan='';";
        DataProvider::executeSQL($sql);
        $sql = "DELETE FROM bailam WHERE bailam.maTaiKhoan='';";
        DataProvider::executeSQL($sql);

        $this->assertEquals($expectedResult, $resutl);
    }
}
