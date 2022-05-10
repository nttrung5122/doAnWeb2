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
        $gioThi=date('h:i:sa',$d);
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
                                        <i class="fa-solid fa-trash"></i> Xem bài kiểm tra</button>
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
}
