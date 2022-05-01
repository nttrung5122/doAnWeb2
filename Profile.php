<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1f286772f7.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/dde1966e52.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Profile</title>
    <style>
        .list-group-item:hover {
            background-color: whitesmoke;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <?php require("./View/_partial/Header_Footer/Header_Footer.php");
    head($homePage); ?>

    <!-- Content -->
    <div class="container p-5" style="margin-top:80px;">
        <!-- Title -->
        <h3 class="text-center">Thông tin cá nhân</h3>
        <p class="text-center">Thông tin về bạn và các lựa chọn ưu tiên của bạn trên các dịch vụ của OnTest</p>

        <!-- Description -->
        <div class="row">
            <div class="col-md-6 pt-5">
                <h2>Thông tin trong hồ sơ của bạn trên OnTest</h2>
                <p>Thông tin cá nhân và các tùy chọn giúp quản lý thông tin đó. Bạn có thể cho phép người khác nhìn thấy một số dữ liệu của thông tin này (chẳng hạn như thông tin liên hệ) để họ có thể dễ dàng liên hệ với bạn. Bạn cũng có thể xem thông tin tóm tắt về các hồ sơ của mình.</p>
            </div>
            <div class="col-md-6">
                <img src="./Assets/img/Indentity.jpg" alt="" style="width: 500px" class="float-end rounded" />
            </div>
        </div>

        <div class="container d-flex justify-content-center mt-5">
            <div class="card shadow" style="width: 50rem;">
                <div class="card-body">
                    <h5 class="card-title ms-1">Thông tin cơ bản</h5>
                    <h6 class="card-subtitle mb-2 ms-1 text-muted">Một số thông tin có thể hiển thị cho những người khác</h6>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row" style="transform: rotate(0);">
                                <div class="col-md-3">
                                    <p class="text-muted">Tên</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">Nguyễn Phước Toàn</p>
                                </div>
                                <div class="col-md-1">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <a class="stretched-link" data-bs-toggle="collapse" href="#info1" role="button" aria-expanded="false" aria-controls="info1"></a>
                            </div>
                            <div class="collapse multi-collapse" id="info1">
                                <input type="text" class="form-control" placeholder="Nhập tên mới">
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row" style="transform: rotate(0);">
                                <div class="col-md-3">
                                    <p class="text-muted">Ngày sinh</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">10/07/2002</p>
                                </div>
                                <div class="col-md-1">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <a class="stretched-link" data-bs-toggle="collapse" href="#info2" role="button" aria-expanded="false" aria-controls="info2"></a>
                            </div>
                            <div class="collapse multi-collapse" id="info2">
                                <input type="date" class="form-control">
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row" style="transform: rotate(0);">
                                <div class="col-md-3">
                                    <p class="text-muted">Chức vụ</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">Học sinh</p>
                                </div>
                                <div class="col-md-1">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <a class="stretched-link" data-bs-toggle="collapse" href="#info3" role="button" aria-expanded="false" aria-controls="info3"></a>
                            </div>
                            <div class="collapse multi-collapse" id="info3">
                                <input type="text" class="form-control" placeholder="Nhập chức vụ mới">
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-end my-3">
                        <button class="btn btn-primary px-4">Lưu</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="container d-flex justify-content-center mt-5">
            <div class="card shadow" style="width: 50rem;">
                <div class="card-body">
                    <h5 class="card-title ms-1">Thông tin liên hệ</h5>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row" style="transform: rotate(0);">
                                <div class="col-md-3">
                                    <p class="text-muted">Email</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">nguyenphuoctoan2002@gmail.com</p>
                                </div>
                                <div class="col-md-1">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <a class="stretched-link" data-bs-toggle="collapse" href="#info4" role="button" aria-expanded="false" aria-controls="info4"></a>
                            </div>
                            <div class="collapse multi-collapse" id="info4">
                                <input type="email" class="form-control" placeholder="Nhập email mới">
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row" style="transform: rotate(0);">
                                <div class="col-md-3">
                                    <p class="text-muted">Điện thoại</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">0708738278</p>
                                </div>
                                <div class="col-md-1">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <a class="stretched-link" data-bs-toggle="collapse" href="#info5" role="button" aria-expanded="false" aria-controls="info5"></a>
                            </div>
                            <div class="collapse multi-collapse" id="info5">
                                <input type="tel" class="form-control" placeholder="Nhập số điện thoại mới">
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-end my-3">
                        <button class="btn btn-primary px-4">Lưu</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="container d-flex justify-content-center mt-5">
            <div class="card shadow" style="width: 50rem;">
                <div class="card-body">
                    <h5 class="card-title ms-1">Mật khẩu</h5>
                    <h6 class="card-subtitle mb-2 ms-1 text-muted">Một mậu khẩu an toàn giúp bảo vệ tài khoản OnTest của bạn</h6>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row" style="transform: rotate(0);">
                                <div class="col-md-3">
                                    <p class="text-muted">Mật khẩu</p>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold fs-3" style="margin:0; line-height:0.5;">...................</p>
                                </div>
                                <div class="col-md-1">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <a class="stretched-link" data-bs-toggle="collapse" href="#info6" role="button" aria-expanded="false" aria-controls="info6"></a>
                            </div>
                            <div class="collapse multi-collapse" id="info6">
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu mới">
                                <input type="password" class="form-control mt-2" placeholder="Nhập lại mật khẩu mới">
                            </div>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-end my-3">
                        <button class="btn btn-primary px-4">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php footer() ?>
</body>

</html>