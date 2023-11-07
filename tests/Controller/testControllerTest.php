<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Controller\TestController;
use App\model\DataProvider;

class testControllerTest extends TestCase
{


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

        $listAnswer =  array_map(fn ($obj) => [
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

    /**
     * @dataProvider dataProvidertestGetDetailstestscores
     */
    public function testGetDetailstestscores($idTest, $idStudent, $expectedResult)
    {


        $resutl = TestController::getDetailstestscores($idTest, $idStudent);

        $this->assertEquals($expectedResult, $resutl);
    }

    static public function dataProvidertestGetDetailstestscores()
    {
        return [
            ['54037', 'L1SV1@gmail.com', [
                'Số câu sai' => 6,
                'Số câu đúng' => 1,
                'Số câu chưa làm' => 0,
                12001 => 'Sai',
                12002 => 'Đúng',
                12003 => 'Sai',
                12004 => 'Sai',
                12005 => 'Sai',
                12006 => 'Sai',
                12007 => 'Sai',
            ]],
            ['54037', 'L1SV2@gmail.com', [
                'Số câu sai' => 7,
                'Số câu đúng' => 0,
                'Số câu chưa làm' => 0,
                12001 => 'Sai',
                12002 => 'Sai',
                12003 => 'Sai',
                12004 => 'Sai',
                12005 => 'Sai',
                12006 => 'Sai',
                12007 => 'Sai',
            ]],
            ['54037', 'L2SV2@gmail.com', [
                'Số câu sai' => 4,
                'Số câu đúng' => 3,
                'Số câu chưa làm' => 0,
                12001 => 'Đúng',
                12002 => 'Sai',
                12003 => 'Đúng',
                12004 => 'Sai',
                12005 => 'Đúng',
                12006 => 'Sai',
                12007 => 'Sai',
            ]],
            ['54037', 'nttnguyen2002@gmail.com', [
                'Số câu sai' => 6,
                'Số câu đúng' => 1,
                'Số câu chưa làm' => 0,
                12001 => 'Sai',
                12002 => 'Sai',
                12003 => 'Sai',
                12004 => 'Sai',
                12005 => 'Đúng',
                12006 => 'Sai',
                12007 => 'Sai',
            ]],
            ['54037', 'tunguy12b4thptlh2020@gmail.com', [
                'Số câu sai' => 4,
                'Số câu đúng' => 2,
                'Số câu chưa làm' => 1,
                12001 => 'Sai',
                12002 => 'Đúng',
                12003 => 'Sai',
                12004 => 'Sai',
                12005 => 'Sai',
                12006 => 'Đúng',
                12007 => 'Chưa làm',
            ]],
            ['54086', 'hocsinh1@gmail.com', [
                'Số câu sai' => 4,
                'Số câu đúng' => 5,
                'Số câu chưa làm' => 1,
                0 => 'Đúng',
                1 => 'Đúng',
                2 => 'Đúng',
                3 => 'Đúng',
                4 => 'Đúng',
                5 => 'Sai',
                6 => 'Sai',
                7 => 'Chưa làm',
                8 => 'Sai',
                9 => 'Sai',
            ]],
        ];
    }

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
                    'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A',
                ],
                "54081", 10
            ],
            [
                [
                    'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'B', 'B',
                ],
                "54081", 8
            ],
            [
                [
                    'A', 'A', 'A', 'A', 'A', 'A', 'B', '', '', 'B',
                ],
                "54081", 6
            ],
        ];
    }
}
