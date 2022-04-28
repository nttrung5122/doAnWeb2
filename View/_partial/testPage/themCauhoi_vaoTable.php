<?php
class themcauhoiModules
{
    // luôn đặt hàm này dưới thẻ <tbody> (thân table)
    public static function themCauhoi($macauhoi, $noidung, $theloai)
    {
        echo '
        <tr>
            <th scope="row">' . $macauhoi . '</th>
            <td>' . $noidung . '</td>
            <td>' . $theloai . '</td>
            <td><input class="form-check-input" type="checkbox" value="' . $macauhoi . '" id="' . $macauhoi . '" onchange="taoMangcauhoi(this.value)"></td>
        </tr>
        ';
    }
}
