<?php
class adminTable
{
    public static $accountModal = 'Account_Modal';
    public static $classModal = 'Class_Modal';
    public static $questionModal = 'Question_Modal';
    public static function createTable($head, $data, $type)
    {
        //input for table
        $input = '';
        if ($type == self::$accountModal) {
            $input = '  <div class="input-group mb-1">
                        <span class="input-group-text col-2">Email</span>
                        <input type="text" class="form-control" placeholder="Nhập email mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Mật khẩu</span>
                        <input type="text" class="form-control" placeholder="Nhập mật khẩu mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Chức vụ</span>
                        <input type="text" class="form-control" placeholder="Nhập chức vụ mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Tên</span>
                        <input type="text" class="form-control" placeholder="Nhập tên mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Ngày sinh</span>
                        <input type="date" class="form-control">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Số điện thoại</span>
                        <input type="text" class="form-control" placeholder="Nhập số điện thoại mới">
                    </div>';
        } else if ($type == self::$classModal) {
            $input = '  <div class="input-group mb-1">
                        <span class="input-group-text col-2">Mã lớp</span>
                        <input type="text" class="form-control" placeholder="Nhập mã lớp mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Tên lớp</span>
                        <input type="text" class="form-control" placeholder="Nhập tên lớp mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Thông tin</span>
                        <input type="text" class="form-control" placeholder="Nhập Thông tin mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Số lượng</span>
                        <input type="text" class="form-control" placeholder="Nhập số lượng mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Email giảng viên</span>
                        <input type="text" class="form-control" placeholder="Nhập email giảng viên mới">
                    </div>';
        } else {
            $input = '  <div class="input-group mb-1">
                        <span class="input-group-text col-2">Mã câu</span>
                        <input type="text" class="form-control" placeholder="Nhập mã câu mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Mã nhóm</span>
                        <input type="text" class="form-control" placeholder="Nhập mã nhóm mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Nội dung</span>
                        <input type="text" class="form-control" placeholder="Nhập nội dung mới">
                    </div>';
        }
        // table head
        $table = ' <table class="table align-middle my-5 bg-white">
                    <thead class="bg-success bg-opacity-25">
                        <tr>';
        for ($i = 0; $i < sizeof($head); $i++) {
            $table .= ' <th>' . $head[$i] . '</th>';
        }
        $table .= '        <th class="text-center">Hành động</th>
                    </thead>
                <tbody>';
        // table body
        for ($i = 0; $row = mysqli_fetch_array($data); $i++) {
            $table .= ' <tr>';
            for ($j = 0; $j < mysqli_num_fields($data); $j++) {
                $table .= '<td>' . $row[$j] . '</td>';
            }
            $table .= '<td class="text-center">
                        <button class="btn btn-success"  data-bs-target="#a' . $i . '" data-bs-toggle="collapse">
                            Sửa
                        </button>
                    </td>   
                    </tr>
                    <tr class="collapse" id="a' . $i . '">
                        <td colspan="12">
                            <div class="collapse multi-collapse" id="a' . $i . '">
                                ' . $input . '
                            </div>
                        </td>
                    </tr>';
        }
        $table .= '</tbody>
                </table>';
        return $table;
    }
}
