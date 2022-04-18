<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php include 'form_modules.php'; ?>
<div class="position-relative p-2">
    <div class="mx-auto">Thông tin cá nhân</div>
    <form class="position-relative" action="">
        <hr>
        <!-- input text -->
        <?php
        FormBootstrap::horizontalInput('text', 'Họ và tên', 'inputTen');
        FormBootstrap::horizontalInput('text', 'Email', 'inputEmail');
        FormBootstrap::horizontalInput('text', 'Số điện thoại', 'inputSdt');
        // FormBootstrap::horizontalInput('date', 'Ngày sinh', 'inputDate');
        ?>
        <!-- Ngày sinh -->
        <div class="row g-3 mb-3">
            <label for="inputDate" class="col-sm-2 col-form-label">Ngày sinh</label>
            <div class="col-sm-7">
                <input type="date" class="form-control" id="inputDate">
            </div>
            <select class="form-select col-sm" name="inputGioitinh" aria-label="inputGioitinh">
                <option hidden selected>Giới tính</option>
                <option value="gtNam">Nam</option>
                <option value="gtNu">Nữ</option>
            </select>
        </div>
        <!-- Lựa chọn học sinh hay gv -->
        <div class="position-absolute start-50 translate-middle-x">
            <input type="radio" class="btn-check" name="chucvu" id="radioGV" autocomplete="off" value="gv" checked>
            <label class="btn btn-outline-primary" for="radioGV">Giảng viên</label>
            <input type="radio" class="btn-check" name="chucvu" id="radioHS" value="hs" autocomplete="off">
            <label class="btn btn-outline-primary" for="radioHS">Học sinh</label>
        </div>
        <br>
        <!-- Check box điều khoản -->
        <br>
        <div class="form-check position-absolute start-50 translate-middle-x">
            <input class="form-check-input" type="checkbox" value="" id="">
            <label class="form-check-label" for="">
                Đồng ý với các điều khoản của chúng tôi
            </label>
        </div>
        <br>
        <br>
        <hr>
        <!-- nút -->
        <div class="position-absolute start-50 translate-middle-x">
            <button type="submit" class="btn btn-primary">Đăng ký</button>
            <button type="button" class="btn btn-outline-primary">Hủy</button>
        </div>
    </form>
</div>