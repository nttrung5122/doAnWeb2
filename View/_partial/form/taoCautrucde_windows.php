<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form_createTest">
        Tạo câu hỏi
    </button>
<!-- Kiểm tra lại id của modal để thiết kế nút -->
<div class="modal fade" id="form_createTest" tabindex="-1" aria-labelledby="popupLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popupLabel">Tạo đề kiểm tra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Nội dung của pop-up -->
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Mã đề</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext" value="truyền mã đề zô đây">
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Thời gian làm bài</label>
                    <div class="col-sm-2">
                        <select class="form-select" aria-label="setTime" name="thoiGianlambai">
                            <option selected disabled hidden>Thời gian</option>
                            <option value="45">45 phút</option>
                            <option value="60">60 phút</option>
                            <option value="120">120 phút</option>
                        </select>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row mb-3">
                    <label for="ngayThi" class="col-sm-3 col-form-label">Ngày làm bài</label>
                    <div class="col-sm-4">
                        <input type="datetime-local" class="form-control" name="ngayThi" id="ngayThi">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Đảo câu hỏi và đáp án</label>
                    <div class="col">
                        <input type="radio" class="btn-check" id="checkDaocauhoi1" name="daoCauhoi" autocomplete="off" value="true" checked>
                        <label class="btn btn-outline-primary" for="checkDaocauhoi1">Có</label>
                        <input type="radio" class="btn-check" id="checkDaocauhoi2" name="daoCauhoi" autocomplete="off" value="false">
                        <label class="btn btn-outline-primary" for="checkDaocauhoi2">Không</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Mật khẩu đề thi</label>
                    <div class="col">
                        <input type="text" class="form-control" id="mkDethi" placeholder="Mật khẩu">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Cho phép xem đáp án</label>
                    <div class="col">
                        <input type="radio" class="btn-check" id="xemDapan1" name="xemDapan" autocomplete="off" value="khong" checked>
                        <label class="btn btn-outline-primary" for="xemDapan1">Không</label>
                        <input type="radio" class="btn-check" id="xemDapan2" name="xemDapan" autocomplete="off" value="thixong">
                        <label class="btn btn-outline-primary" for="xemDapan2">Khi thi xong</label>
                        <input type="radio" class="btn-check" id="xemDapan3" name="xemDapan" autocomplete="off" value="tatcathixong">
                        <label class="btn btn-outline-primary" for="xemDapan3">Khi tất cả thi xong</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Cho phép xem điểm</label>
                    <div class="col">
                        <input type="radio" class="btn-check" id="xemDiem1" name="xemDiem" autocomplete="off" value="khong" checked>
                        <label class="btn btn-outline-primary" for="xemDiem1">Không</label>
                        <input type="radio" class="btn-check" id="xemDiem2" name="xemDiem" autocomplete="off" value="thixong">
                        <label class="btn btn-outline-primary" for="xemDiem2">Khi thi xong</label>
                        <input type="radio" class="btn-check" id="xemDiem3" name="xemDiem" autocomplete="off" value="tatcathixong">
                        <label class="btn btn-outline-primary" for="xemDiem3">Khi tất cả thi xong</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-3 col-form-label">Chia sẻ đề</label>
                    <div class="col">
                        <input type="radio" class="btn-check" id="chiaseDe1" name="chiaseDe" autocomplete="off" value="true" checked>
                        <label class="btn btn-outline-primary" for="chiaseDe1">Có</label>
                        <input type="radio" class="btn-check" id="chiaseDe2" name="chiaseDe" autocomplete="off" value="false">
                        <label class="btn btn-outline-primary" for="chiaseDe2">Không</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- data-bs-dismiss="modal" - đóng cửa sổ popup -->
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tạo đề</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>