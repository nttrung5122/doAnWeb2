<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var count = 0;

        // cập nhật số câu hỏi
        function capnhatCauhoi() {

            count = document.getElementsByClassName("card h-100").length;
            document.getElementById("soCauhoi").value = count - 1;
            // console.log(count);
        }

        // hàm này chèn thẻ vào trước nút thêm câu hỏi
        // chưa thiết kế id hay name cho câu hỏi để đẩy dữ liệu
        function addCard(socau) {
            socau = count;
            var card =
                `<div class="col cardcauhoi">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Câu ` + count + `</h5>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="">Đáp án</label>
                                <select class="form-select" id="">
                                    <option selected hidden>Chọn</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>`;
            $(card).insertBefore("#buttonAddCard");
            count++;
        }
        // xóa thẻ
        function xoaCard() {
            // console.log(count-1);
            const elmnt = document.getElementsByClassName("col cardcauhoi")[count - 2];
            elmnt.remove();
        }
    </script>
</head>

<body onload="capnhatCauhoi()">
    <div class="container">
        <div class="btn-group mb-3" role="group" aria-label="" style="width: 100%;">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="btnradio1">Tạo đáp án</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">Radio 2</label>
        </div>
        <!-- Tạo đáp án -->
        <div class="row align-items-start mb-3">
            <div class="text-center fw-bold fs-2 mb-3">Tạo đáp án</div>
            <!-- Hiển thị số câu -->
            <div class="col">
                <div class="row">
                    <div class="col">
                        <label for="soCauhoi" class="form-label fw-bold">Số câu</label>
                        <input type="text" readonly class="form-control-plaintext" id="soCauhoi" name="soCauhoi">
                    </div>
                </div>
            </div>
            <!-- Chọn thang điểm -->
            <div class="col">
                <div class="row">
                    <div class="col">
                        <label for="inputThangdiem" class="form-label fw-bold">Thang điểm</label>
                        <select class="form-select" name="inputThangdiem">
                            <option selected value="10">10</option>
                            <option value="100">100</option>
                            <option value="1000">1000</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vùng tạo câu hỏi -->
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
            <!-- Thẻ tạo câu hỏi đặt ở đây -->

            <div class="col" id="buttonAddCard">
                <div class="card h-100 text-center">
                    <div class="card-body">
                        <h6 class="card-tittle">Thêm câu hỏi mới</h6>
                        <button type="button" class="btn btn-outline-primary" onclick="addCard(); capnhatCauhoi();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nút -->
        <div class="d-grid gap-2 d-md-block text-center">
            <button class="btn btn-primary" type="button">Tiếp tục</button>
            <button class="btn btn-outline-danger" type="button" onclick="xoaCard(); capnhatCauhoi();">Xóa câu cuối</button>
        </div>
    </div>
</body>