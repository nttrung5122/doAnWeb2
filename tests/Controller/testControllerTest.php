<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controller\TestController;
use App\model\DataProvider;

class testControllerTest extends TestCase
{
    static public function dataProviderTestChamBai()
    {
        return [
            [
                [
                    ['12037', 'A'],
                    ['12038', 'A'],
                    ['12039', 'A'],
                    ['12040', 'A'],
                    ['12041', 'A'],
                    ['12042', 'A'],
                    ['12043', 'A'],
                    ['12044', 'A'],
                    ['12045', 'A'],
                    ['12046', 'A'],
                ],
                "54081", 10
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
}
