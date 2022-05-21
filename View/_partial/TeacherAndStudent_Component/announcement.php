<?php
class announcement
{
    public static function createTableAnnouncement($head, $data)
    {
        // table head
        $table='<div class="container">
                <div class="d-flex justify-content-center"><button id="" type="button" class="btn btn-info mx-auto" style="margin-top:80px;"   data-bs-toggle="modal" data-bs-target="#form_createNotice">Tạo thông báo</button></div>
                <table id="table-type" class="table align-middle my-5 bg-white">
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
                        <button class="btn btn-danger" name="' . $row[0] . '" onclick="deleteAnnouncement(this)">
                            Xoá
                        </button>
                    </td>   
                    </tr>
                    <tr class="collapse" id="a' . $i . '">
                        <td colspan="12">
                            <div class="collapse multi-collapse" id="a' . $i . '">
                                ' . self::createInput($row, $i) . '
                            </div>
                        </td>
                    </tr>';
            $i++;
        }
        $table .= '</tbody>
                </table></div>';
        return $table;
    }

    public static function createInput($row, $i)
    {
        $input = '
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Tiêu đề</span>
                        <input type="text" name="tieuDe' . $i . '" class="form-control" placeholder="Nhập tiêu đề mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Nội dung</span>
                        <input type="text" name="noiDung' . $i . '" class="form-control" placeholder="Nhập nội dung mới">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text col-2">Thời gian</span>
                        <input type="date" name="thoiGian' . $i . '" class="form-control">
                    </div>
                    <div class="input-group mb-1 d-flex justify-content-end">
                        <button name="' . $row['idNotice'] . '" id="' . $i . '" type="button" onclick="editAnnouncement(this)" class="btn btn-primary">Lưu</button>
                    </div>';
        return $input;
    }
}
