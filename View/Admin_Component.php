<?php
class adminTable
{
    public static $accountModal = 'Account_Modal';
    public static $classModal = 'Class_Modal';
    public static $questionModal = 'Question_Modal';
    public static function createTable($head, $data, $type)
    {
        // table head
        $table = ' <table id="table-type" name="' . $type . '" class="table align-middle my-5 bg-white">
                    <thead class="bg-success bg-opacity-25">
                        <tr>';
        for ($i = 0; $i < sizeof($head); $i++) {
            $table .= ' <th>' . $head[$i] . '</th>';
        }
        $table .= '        <th class="text-center">Hành động</th>
                    </thead>
                <tbody>';
        // table body
        $i = 0;
        while ($row = mysqli_fetch_array($data)) {
            $table .= ' <tr>';
            for ($j = 0; $j < mysqli_num_fields($data); $j++) {
                $table .= '<td>' . $row[$j] . '</td>';
            }
            $table .= '<td class="text-center">
                        <button class="btn btn-success" name="' . $row[0] . '"  data-bs-target="#a' . $i . '" data-bs-toggle="collapse">
                            Sửa
                        </button>
                        <button class="btn btn-danger" name="' . $row[0] . '" onclick="clickDelete(this)">
                            Xoá
                        </button>
                    </td>   
                    </tr>
                    <tr class="collapse" id="a' . $i . '">
                        <td colspan="12">
                            <div class="collapse multi-collapse" id="a' . $i . '">
                                ' . self::createInput($row, $type, $i) . '
                            </div>
                        </td>
                    </tr>';
            $i++;
        }
        $table .= '</tbody>
                </table>';
        return $table;
    }
    public static function createInput($row, $type, $i)
    {
        //input for table
        $input = '';
        if ($type == self::$accountModal) {
            $input = '  <div class="input-group mb-1">
                        <span class="input-group-text col-2">Email</span>
                        <input type="text" name="email' . $i . '" class="form-control" placeholder="Nhập email mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Mật khẩu</span>
                        <input type="text" name="password' . $i . '" class="form-control" placeholder="Nhập mật khẩu mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Chức vụ</span>
                        <input type="text" name="role' . $i . '" class="form-control" placeholder="Nhập chức vụ mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Tên</span>
                        <input type="text" name="name' . $i . '" class="form-control" placeholder="Nhập tên mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Ngày sinh</span>
                        <input type="date" name="birth' . $i . '" class="form-control">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Số điện thoại</span>
                        <input type="text" name="phone' . $i . '" class="form-control" placeholder="Nhập số điện thoại mới">
                    </div>
                    <div class="input-group mb-1 d-flex justify-content-end">
                        <button name="' . $row['mail'] . '" id="' . $i . '" type="button" onclick="editAccount(this)" class="btn btn-primary">Lưu</button>
                    </div>';
        } else if ($type == self::$classModal) {
            $input = '  <div class="input-group mb-1">
                        <span class="input-group-text col-2">Mã lớp</span>
                        <input type="text" name="maLop'.$i.'" class="form-control" placeholder="Nhập mã lớp mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Tên lớp</span>
                        <input type="text" name="tenLop'.$i.'" class="form-control" placeholder="Nhập tên lớp mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Thông tin</span>
                        <input type="text" name="thongTin'.$i.'" class="form-control" placeholder="Nhập Thông tin mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Email giảng viên</span>
                        <input type="text" name="email'.$i.'"class="form-control" placeholder="Nhập email giảng viên mới">
                    </div>
                    <div class="input-group mb-1 d-flex justify-content-end">
                        <button name="' . $row['maLop'] . '" id="' . $i . '" type="button" onclick="editClass(this)" class="btn btn-primary">Lưu</button>
                    </div>';
        } else {
            $input = '  <div class="input-group mb-1">
                        <span class="input-group-text col-2">Mã câu</span>
                        <input type="text" name="maCau'.$i.'" class="form-control" placeholder="Nhập mã câu mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Mã nhóm</span>
                        <input type="text" name="maNhom'.$i.'" class="form-control" placeholder="Nhập mã nhóm mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Nội dung</span>
                        <input type="text" name="noiDung'.$i.'" class="form-control" placeholder="Nhập nội dung mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Đáp án</span>
                        <input type="text" name="dapAn'.$i.'" class="form-control" placeholder="Nhập nhập đáp án mới">
                    </div>
                    <div class="input-group mb-1 d-flex justify-content-end">
                        <button name="' . $row['maCau'] . '" id="' . $i . '" type="button" onclick="editQuestion(this)" class="btn btn-primary">Lưu</button>
                    </div>';
        }
        return $input;
    }
}
