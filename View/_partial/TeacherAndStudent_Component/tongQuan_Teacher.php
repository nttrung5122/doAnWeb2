<div class="col-sm-8 mt-5 ">
    <!-- Classroom information -->

    <div class="container border border-3">
        <h4 id="nameClass"></h4>
        <h4>Mô tả:</h4>
        <!-- p for chú thích -->
        <p class="ps-3" id="infoClass"></p>
        <div class="row py-2">
            <div class="col">
                <h4 id="idClass">Mã lớp:</h4>
                <input type="hidden" name="" value="" id="idClassCurent">
            </div>
            <div class="col">
            </div>
            <div class="col justify-content-end">
                <button type="button" class="btn btn-warning text-center fw-bold" id="btnDeleteClass">
                    <i class="fa-solid fa-trash"></i> Xóa Lớp</button>
            </div>x
        </div>
    </div>
    <!-- Statistical Card -->
    <div class="row gap-5 justify-content-center mt-5" style="margin-left: 0; margin-right: 0;">
        <div class="card bg-primary bg-gradient col-sm-3" style="padding-right:0px;">
            <div class="card-body" style="padding-left: 0; padding-right: 0;">
                <div class="card-content">
                    <div class="media d-flex row">
                        <div class="align-self-center col-sm-3">
                            <i class="far fa-user fs-1"></i>
                        </div>
                        <div class="media-body text-end col-sm-8" style="padding-right:0px;">
                            <h3 id="soHs">40</h3>
                            <span>Số học sinh</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-warning bg-gradient col-sm-3" style="padding-right:0px;">
            <div class="card-body" style="padding-left: 0; padding-right: 0;">
                <div class="card-content">
                    <div class="media d-flex row">
                        <div class="align-self-center col-sm-3">
                            <i class="far fa-star fs-1"></i>
                        </div>
                        <div class="media-body text-end col-sm-8" style="padding-right:0px;">
                            <h3>8</h3>
                            <span>Điểm trung bình</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-danger bg-gradient col-sm-3" style="padding-right:0px;">
            <div class="card-body" style="padding-left: 0; padding-right: 0;">
                <div class="card-content">
                    <div class="media d-flex row">
                        <div class="align-self-center col-sm-3">
                            <i class="fas fa-book fs-1"></i>
                        </div>
                        <div class="media-body text-end col-sm-8" style="padding-right:0px;">
                            <h3>3</h3>
                            <span>Bài kiểm tra</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Average grade -->
    <!-- Nhấp vào sẽ hiện thông tin của bài ktra ở phần information -->
    <div class="mt-5 pb-5" id="content">
        <div class="mt-4 border-top border-2" style="transform: rotate(0); cursor:pointer;">
            <p class="mt-3 fs-5 fw-bold">Bài kiểm tra 1</p>
            <p>Điểm trung bình:</p>
            <div class="progress bg-danger bg-opacity-25">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">2.5</div>
            </div>
        </div>
        <div class="mt-4 border-top border-2" style="transform: rotate(0); cursor:pointer;">
            <p class="mt-3 fs-5 fw-bold">Bài kiểm tra 1</p>
            <p>Điểm trung bình:</p>
            <div class="progress bg-danger bg-opacity-25">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">2.5</div>
            </div>
        </div>
        <div class="mt-4 border-top border-2" style="transform: rotate(0); cursor:pointer;">
            <p class="mt-3 fs-5 fw-bold">Bài kiểm tra 1</p>
            <p>Điểm trung bình:</p>
            <div class="progress bg-danger bg-opacity-25">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">2.5</div>
            </div>
        </div>
        <div class="mt-4 border-top border-2" style="transform: rotate(0); cursor:pointer;">
            <p class="mt-3 fs-5 fw-bold">Bài kiểm tra 2</p>
            <p>Điểm trung bình:</p>
            <div class="progress bg-danger bg-opacity-25">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">5</div>
            </div>
        </div>
        <div class="mt-4 border-top border-2" style="transform: rotate(0); cursor:pointer;">
            <p class="mt-3 fs-5 fw-bold">Bài kiểm tra 3</p>
            <p>Điểm trung bình:</p>
            <div class="progress bg-danger bg-opacity-25">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">7.5</div>
            </div>
        </div>
        <div class="mt-4 border-top border-2" style="transform: rotate(0); cursor:pointer;">
            <p class="mt-3 fs-5 fw-bold">Bài kiểm tra 4</p>
            <p>Điểm trung bình:</p>
            <div class="progress bg-danger bg-opacity-25">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">10</div>
            </div>
        </div>
    </div>
</div>
<div class="container col-sm-3 overflow-auto text-center fixed-top bg-light" style="margin-right:0px; margin-top:70px; height:90%; z-index: 1;">
<div class="border-start">
            <p>Thông tin</p>
            <h4>Bài kiểm tra 1</h4>
            <div class="ps-3 text-start row" style="margin:0; padding:0;">
                <div class="col-sm-6">
                    <p>Loại</p>
                    <p>Đã nộp</p>
                    <p>Ngày tạo</p>
                    <p>Chia sẻ</p>
                </div>
                <div class="col-sm-6 fw-bold">
                    <p>Trắc nghiệm</p>
                    <p>14/40</p>
                    <p>1 tháng 4</p>
                    <p><i class="fas fa-share-alt"></i></p>
                </div>
            </div>
        </div>'
</div>