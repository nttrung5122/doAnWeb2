<?php
class TestView
{
    public static function renderSettingTest($question)
    {
        $result = "";
        while ($row = mysqli_fetch_array($question)) {
            $result .= '        <tr>
            <th scope="row">' . $row['maCau'] . '</th>
            <td>' . $row['noiDung'] . '</td>
            <td>' . $row['tenNhomCauHoi'] . '</td>
            <td><input class="form-check-input" type="checkbox" value="' . $row['maCau'] . '" id="' . $row['maCau'] . '" onchange="taoMangcauhoi(this.value)"></td>
        </tr>';
        }
        return $result;
    }

    public static function renderListTest($data)
    {
        $result = "";
        while ($row = mysqli_fetch_array($data)) {
            $result .= '        <div class="mt-4 border-top border-2" style="transform: rotate(0); cursor:pointer;">
            <a class="stretched-link" onclick="renderInfoTest(' . $row['maDe'] . ')"></a>
            <p class="mt-3 fs-5 fw-bold">' . $row['tenDe'] . '</p>';
            if ($row['diemtb'] != null) {
                $diemtb = $row['diemtb'] * 10;
                $result .=
                    '<p>Điểm trung bình:</p>
                <div class="progress bg-danger bg-opacity-25">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: ' . $diemtb . '%" aria-valuenow="' . $diemtb . '" aria-valuemin="0" aria-valuemax="100">' . $row['diemtb'] . '</div>
                </div>';
            }
            $result .= '</div>';
        }
        return $result;
    }

    public static function renderInfoTest($data)
    {
        $row = mysqli_fetch_array($data);
        $xemDiem=$row['xemDiem']=='true'?'Có':'Không';
        $xemDapAn=$row['xemDapAn']=='true'?'Có':'Không';
        $daoCauHoi=$row['daoCauHoi']=='true'?'Có':'Không';
        $d=strtotime($row['ngayThi']);
        $ngayThi=date('d-m-Y',$d);
        $gioThi=date('h:i:s A',$d);
        $result = '    <div class="border-start">
                            <p>Thông tin</p>
                            <h4>'.$row['tenDe'].'</h4>
                            <div class="ps-3 text-start row" style="margin:0; padding:0;">
                                <div class="col-sm-6">
                                    <p>Ngày làm bài</p>
                                    <p>Giờ làm bài</p>
                                    <p>Đã nộp</p>
                                    <p>Thời gian</p>
                                    <p>Đảo đề</p>
                                    <p>Xem đáp án</p>
                                    <p>Xem điểm</p>
                                    <div class="col justify-content-end">
                                    <button type="button" class="btn btn-warning text-center fw-bold" onclick="showTest('.$row['maDe'].')">
                                        <i class="fa-solid fa-eye"></i> Xem bài kiểm tra</button>
                                </div>
                                </div>
                                <div class="col-sm-6 fw-bold">
                                    <p>'.$ngayThi.'</p>
                                    <p>'.$gioThi.'</p>
                                    <p>'.$row['slBai'].'    </p>
                                    <p>'.$row['thoiGianLamBai'].' phút</p>
                                    <p>'.$daoCauHoi.'</p>
                                    <p>'.$xemDapAn.'</p>
                                    <p>'.$xemDiem.'</p>
                                    <div class="col justify-content-end">
                                    <button type="button" class="btn btn-warning text-center fw-bold" onclick="deleteTest('.$row['maDe'].')">
                                        <i class="fa-solid fa-trash"></i> Xóa bài kiểm tra</button>
                                </div>
                                </div>

                            </div>

                        </div>';



        return $result;
    }

    public static function renderListTestInStudent($listTestNoSubmit,$listTestSubmit){
        $result="";
        while ($row = mysqli_fetch_array($listTestNoSubmit)){
            $result .= '<button type="button" id="maDe'.$row['maDe'].'" class="list-group-item list-group-item-action row d-flex justify-content-between" aria-current="true" onclick="renderInfoTestNoSubmit('.$row['maDe'].',this)">
                            <div class="col">'.$row['tenDe'].'</div>
                            <div class="col">Chưa làm</div>
                        </button>
                        <hr>';
        }
        while ($row = mysqli_fetch_array($listTestSubmit)){
            $result .= '<button type="button" id="maDe'.$row['maDe'].'" class="list-group-item list-group-item-action row d-flex justify-content-between" aria-current="true" onclick="renderInfoTestSubmited('.$row['maDe'].',this)">
                            <div class="col">'.$row['tenDe'].'</div>
                            <div class="col">Đã làm</div>
                        </button>
                        <hr>';
        }
        return $result;
    }

    public static function renderInfoTestNoSubmit($data){
        $d=strtotime($data['ngayThi']);
        $ngayThi=date('d-m-Y',$d);
        $gioThi=date('h:i:s A',$d);
        $result='<p class="text-center fs-5 fw-bold">'.$data['tenDe'].'</p>
                <div class="">
                    <p class="">Ngày làm bài: '.$ngayThi.'</p>
                    <p class="">Giờ làm bài: '.$gioThi.'</p>

                    <p class="">Thời gian làm bài: '.$data['thoiGianLamBai'].'</p>
                    <hr>
                    <div class="text-center"><a href="#" class="btn btn-success text-center" onclick="takeATest(\''.$data['maDe'].'\')" data-bs-toggle="modal" data-bs-target="#formDoTest" >Làm bài</a></div>
                </div>';
        return $result;
    }

    public static function renderInfoTestSubmited($data){
        $d=strtotime($data['ngayThi']);
        $ngayThi=date('d-m-Y',$d);
        $gioThi=date('h:i:s A',$d);
        $result='<p class="text-center fs-5 fw-bold">'.$data['tenDe'].'</p>
        <div class="">
            <p class="">Ngày làm bài: '.$ngayThi.'</p>
            <p class="">Giờ làm bài: '.$gioThi.'</p>

            <p class="">Thời gian làm bài: '.$data['thoiGianLamBai'].'</p>
            <hr>
            <div class="text-center"><p >Điểm: '.$data['diem'].'</p></a></div>
        </div>';
return $result;
    }

    public static function renderTestForStudent($question,$answer) {
        $result['deThi']='';
        $result['baiLam']='';
        for($i=0;$i<count($question);$i++){
            $result['deThi'].=
            '
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">' . $question[$i]['noiDung'] . '</div>
                    <ul class="list-group list-group-flush">';
                    foreach($answer as $A){
                        if($A['maCau']==$question[$i]['maCau'])
                        $result['deThi'].=
                        '<li class="list-group-item">
                            <input class="form-check-input me-1" name="' . $A['maCau'] . '" type="radio" value="' . $A['maLuaChon'] . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                            ' . $A['noiDung'] . '
                        </li>';
                    }
                    $result['deThi'].=
                    '</ul>
                </div>
            </li>
            ';
            $result['baiLam'].=
            '
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="'.$question[$i]['maCau'].'" onclick="return false;">
                    <label class="form-check-label" for="cauhoi1">
                        Câu ' . $i+1 . '
                    </label>
                </div>
            </div>
            ';
        }
        return $result;
    }
}
