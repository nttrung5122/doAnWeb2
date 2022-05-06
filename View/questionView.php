<?php

class QuestionView {

    public static function renderBankQuestion($data){
        $result='                <thead class="table-light">
        <tr>
            <th scope="col" width="9%">Mã</th>
            <th scope="col" width="70%">Câu hỏi</th>
            <th scope="col" width="32%">Loại</th>
        </tr>
    </thead>
    <tbody>';
        while ($row = mysqli_fetch_array($data)){
            $result .=' <tr style="transform: rotate(0);">
                            <th scope="row">' . $row['maCau'] . '</th>
                            <td>' . $row['noiDung'] . '</td>
                            <td>' . $row['tenNhomCauHoi'] . '</td>
                            <td>
                                <a class="stretched-link" data-bs-toggle="collapse" href="#cau' . $row['maCau'] . '"></a>
                            </td>
                        </tr>
                        <tr class="collapse" id="cau' . $row['maCau'] . '">
                            <th scope="col" width="9%"></th>
                            <td scope="col" width="70%">
                                <ul class="collapse " id="cau' . $row['maCau'] . '" style="list-style-type:none; margin:0px; padding:0px;">
                                    <li>
                                        <p style="margin:0;"><span class="fw-bold">Câu a: </span>a</p>
                                    </li>
                                    <li>
                                        <p style="margin:0;"><span class="fw-bold">Câu a: </span>a</p>
                                    </li>
                                    <li>
                                        <p style="margin:0;"><span class="fw-bold">Câu a: </span>a</p>
                                    </li>
                                    <li>
                                        <p style="margin:0;"><span class="fw-bold">Câu a: </span>a</p>
                                    </li>
                                    <li>
                                        <p style="margin:0;"><span class="fw-bold">Đáp án: </span>a</p>
                                    </li>
                                </ul>
                            </td>
                            <th scope="col" width="70%"></th>
                        </tr>';
        }
        return $result;
    }

    public static function renderQuestionGroup($data){
        $result='                <select class="form-select" aria-label="Loại câu hỏi" onchange="timCauhoiRadio(this)">
        <option hidden value="" selected>Loại câu hỏi</option>
        <option value="">Tất cả</option>';
        while ($row = mysqli_fetch_array($data)){
            $result.='<option value="'.$row['tenNhomCauHoi'] .'">'.$row['tenNhomCauHoi'] .'</option>';
        }
        return $result;
    }

    public static function renderSltQuestionGroup($data){
        $result='<option selected disabled value="">Nhóm câu hỏi:</option>
        <option value="newGroup">Tạo nhóm mới</option>';
        while ($row = mysqli_fetch_array($data)){
        
        $result.= '<option value="'.$row['maNhomCauHoi'].'">'.$row['tenNhomCauHoi'].'</option>';
        }
        return $result;
    }
}
