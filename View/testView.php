<?php 
class TestView{
    public static function renderSettingTest($question){
        $result ="";
        while($row = mysqli_fetch_array($question)){
            $result .= '        <tr>
            <th scope="row">' . $row['maCau'] . '</th>
            <td>' . $row['noiDung'] . '</td>
            <td>' . $row['tenNhomCauHoi'] . '</td>
            <td><input class="form-check-input" type="checkbox" value="' .$row['maCau'] . '" id="' .$row['maCau']. '" onchange="taoMangcauhoi(this.value)"></td>
        </tr>';
        }
        return $result;
    }


}