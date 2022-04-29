<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        .btn-success {
            background-color: #42b72a;
            border-color: #42b72a;
        }

        #dangkyText {
            text-align: center;
        }
    </style>
    <script>

    </script>
</head>

<body>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form_createQuestion">
        Tạo lớp
    </button>
    <div class="modal" id="form_createQuestion" tabindex="-1" aria-labelledby="popUpCreateClass" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popUpCreateClass">Tạo câu hỏi mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-around">
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="txtIdQuestion">
                                <label for="txtIdQuestion">Mã câu hỏi</label>
                            </div>
                            <div class="col-md-6 offset-md-3">
                                <button type="button" class="btn btn-primary" id="btnRandomCodeNumber">
                                    Tạo mã ngẫu nhiên
                                </button>
                            </div>
                        </div>
                        <div class="col-4">
                            <select class="form-select col-sm" name="sltAnswer" aria-label="sltAnswer" id="sltAnswer" required>
                                <option selected disabled value="">Đáp án:</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                            <br>
                            <select class="form-select col-sm" name="sltQuestionGroup" aria-label="sltQuestionGroup" id="sltQuestionGroup" required>
                                <option selected disabled value="">Nhóm câu hỏi:</option>
                                <option value="newGroup">Tạo nhóm mới</option>
                                <option value="nhom1">Nhóm 1</option>
                                <option value="nhom2">Nhóm 2</option>
                                <option value="nhom3">Nhóm 3</option>
                                <option value="nhom4">Nhóm 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-11 ofset-1">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Nội dung câu hỏi</label>
                        <textarea class="form-control" id="txtQuestion" rows="3"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Câu A</span>
                        <textarea class="form-control" aria-label="Câu A"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Câu B</span>
                        <textarea class="form-control" aria-label="Câu B"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Câu C</span>
                        <textarea class="form-control" aria-label="Câu C"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Câu D</span>
                        <textarea class="form-control" aria-label="Câu D"></textarea>
                    </div>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-success" type="button" id="btnCreateClass">Tạo câu hỏi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>