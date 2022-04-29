<?php
class taoCauhoi
{
    // dành cho giáo viên lúc tạo đề
    public static function taoCauhoi($noidungcauhoi, $cau1, $cau2, $cau3, $cau4, $macauhoi, $dapan)
    {

        $booleanTocheckA = false;
        $booleanTocheckB = false;
        $booleanTocheckC = false;
        $booleanTocheckD = false;
        // $dapan là số integer
        switch ($dapan) {
            case 1:
                $booleanTocheckA = true;
                break;
            case 2:
                $booleanTocheckB = true;
                break;
            case 3:
                $booleanTocheckC = true;
                break;
            case 4:
                $booleanTocheckD = true;
                break;
            default:
                break;
        }

        echo '
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">' . $noidungcauhoi . '</div>             
                <ul class="list-group list-group-flush">
                    ' . taoCauhoi::taoCauhoidisabled($cau1, $macauhoi, 'A', $booleanTocheckA) . '
                    ' . taoCauhoi::taoCauhoidisabled($cau2, $macauhoi, 'B', $booleanTocheckB) . '
                    ' . taoCauhoi::taoCauhoidisabled($cau3, $macauhoi, 'C', $booleanTocheckC) . '
                    ' . taoCauhoi::taoCauhoidisabled($cau4, $macauhoi, 'D', $booleanTocheckD) . '
                </ul>
            </div>
        </li>
        ';
    }
    // dành cho giáo viên lúc tạo đề
    // $laDapan = true or false
    public static function taoCauhoidisabled($answer, $macauhoi, $value, $laDapan)
    {
        if ($laDapan) {
            return '
            <li class="list-group-item">
                <input class="form-check-input me-1" name="' . $macauhoi . '" type="radio" value="' . $value . '" aria-label="Câu trả lời" disabled checked>
                    ' . $answer . '
            </li>
            ';
        } else {
            return '
            <li class="list-group-item">
                <input class="form-check-input me-1" name="' . $macauhoi . '" type="radio" value="' . $value . '" aria-label="Câu trả lời" disabled>
                    ' . $answer . '
            </li>
            ';
        }
    }

    // dành cho học sinh khi làm bài
    public static function taoCauhoiKhongDisable($answer, $macauhoi, $value)
    {
        return '
        <li class="list-group-item">
            <input class="form-check-input me-1" name="' . $macauhoi . '" type="radio" value="' . $value . '" aria-label="Câu trả lời">
                ' . $answer . '
        </li>
        ';
    }
}
