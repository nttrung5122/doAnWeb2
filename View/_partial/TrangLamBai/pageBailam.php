<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formDoTest">
    Đăng nhập
</button> -->
<div class="modal" id="formDoTest" tabindex="-1" aria-labelledby="lable_DoTest" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lable_DoTest">Làm bài kiểm tra</h5>
            </div>
            <div class="modal-body bg-dark">
                <div class="container bg-light  ">
                    <div class="row align-items-start">
                        <div class="col" style="height: 800px; overflow-y: scroll;">
                            <ol class="list-group list-group-numbered list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">' . $noidungcauhoi . '</div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="122" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="122" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="122" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="122" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">' . $noidungcauhoi . '</div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="123" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="123" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="123" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="123" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">' . $noidungcauhoi . '</div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="124" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="124" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="124" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                            <li class="list-group-item">
                                                <input class="form-check-input me-1" name="124" type="radio" value="' . $value . '" aria-label="Câu trả lời" onchange="checkTheBox(this.name);">
                                                ' . $answer . '
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div class="col-4">
                            <div class="d-grid gap-2 col-6 mx-auto mb-3 text-center">
                                <div class="p-2 fw-bold fs-4 bg-primary bg-gradient bg-opacity-75 text-white rounded-2 shadow-sm mt-2">Phiếu bài làm</div>
                            </div>
                            <div class="fw-bold fs-5 mb-5 text-center">Thời gian làm bài còn lại <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                </svg></div>
                            <div class="row row-cols-3 g-3 mx-auto bg-white shadow-sm ">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="122" onclick="return false;">
                                        <label class="form-check-label" for="cauhoi1">
                                            Câu ' . $socau . '
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="123" onclick="return false;">
                                        <label class="form-check-label" for="cauhoi1">
                                            Câu ' . $socau . '
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="124" onclick="return false;">
                                        <label class="form-check-label" for="cauhoi1">
                                            Câu ' . $socau . '
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 col-3 mx-auto">
                                <button class="btn btn-success fs-5" type="button">Nộp bài</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>