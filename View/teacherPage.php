<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1f286772f7.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Giảng Viên</title>
    <style>
        .active {
            background-color: #198754 !important;
        }

        .nav-pills .nav-link:hover {
            background-color: #198754;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#class a').click(function() {
                $('#class').find('a.active').addClass('link-dark');
                $('#class').find('a.active').removeClass('active');
                $(this).addClass('active');
                $(this).removeClass('link-dark');
            });
            $('#tabs a').click(function() {
                $('#tabs').find('a.active').addClass('link-dark');
                $('#tabs').find('a.active').removeClass('active');
                $(this).addClass('active');
                $(this).removeClass('link-dark');
            });
            $('#btnRandomCode').click(function() {
                $("#txtIdClass").val(gen_Code(8));
            });
            $('#btnLogOut').click(function() {
                $.ajax({
                    type: 'POST',
                    url: "../Controller/controller.php",
                    data: {
                        act: 'logOut'
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
                window.location = './HomePage.php';

            });
            $("#btnCreateClass").click(function() {
                let id = $("#txtIdClass").val();
                let name = $("#txtNameClass").val();
                let info = $("#txtInfoClass").val();
                console.log(id);
                console.log(name);
                console.log(info);
                $.ajax({
                    type: "POST",
                    url: "../Controller/controller.php",
                    data: {
                        act: "createClass",
                        id: id,
                        name: name,
                        info: info,
                    },
                    success: function(data) {
                        showNotice(JSON.parse(data)['notice']);
                        if (data['status'] == 'success') {
                            window.location="./teacherPage.php";
                        }
                    }
                })
            });
        });

        function gen_Code(length, special) {
            let iteration = 0;
            let password = "";
            let randomNumber;
            if (special == undefined) {
                var special = false;
            }
            while (iteration < length) {
                randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
                if (!special) {
                    if ((randomNumber >= 33) && (randomNumber <= 47)) {
                        continue;
                    }
                    if ((randomNumber >= 58) && (randomNumber <= 64)) {
                        continue;
                    }
                    if ((randomNumber >= 91) && (randomNumber <= 96)) {
                        continue;
                    }
                    if ((randomNumber >= 123) && (randomNumber <= 126)) {
                        continue;
                    }
                }
                iteration++;
                password += String.fromCharCode(randomNumber);
            }
            return password;
        }

        function renderInfo(idClass){
            $.ajax({
                type: "POST",
                url: "../Controller/controller.php",
                data: {
                    act: "getClass",    
                    id: idClass,
                },
                success: function(data) {
                    data=JSON.parse(data);
                    $("#nameClass").html(data['tenLop']);
                    $("#infoClass").html(data['ThongTin']);
                    $("#idClass").html("Mã lớp: "+data['maLop']);
                    $("#soHs").html(data['soLuong']);
                    $("#idClassCurent").val(data['maLop']);
                }
            })
        }
    </script>
</head>

<body>
    <!-- Header -->
    <?php require("./_partial/Header_Footer/Header_Footer.php");
    head($teacherPage);
    include "./_partial/form/form_create_class.php";
    include "./_partial/popup/notice.php"
    ?>

    <!-- Side Navigation -->
    <div class="d-flex flex-column fixed-top flex-shrink-0 p-2" style="height:100vh; width: 280px; margin-top: 60.2px; background-color: #82dda5; z-index: 1;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-3 fw-bold">Danh sách lớp</span>
        </a>
        <hr>
        <ul id="class" class="nav nav-pills flex-column mb-auto">
            <?php
                include "../Controller/classController.php";
                ClassController::rederClass($_SESSION['user'][0]);
            ?>  
        </ul>
        <hr>
        <ul id="tabs" class="nav nav-pills flex-column mb-auto">
            <li class="nav-item ">
                <a href="#" class="nav-link active">
                    <i class="fas fa-chart-bar"></i>
                    Tổng Quan
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fas fa-users"></i>
                    Thành Viên
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fas fa-book"></i>
                    Tài Liệu
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark">
                    <i class="fas fa-bullhorn"></i>
                    Tạo Thông báo
                </a>
            </li>
        </ul>
    </div>
    <!-- Content -->
    <div style="margin-left: 280px; margin-top: 80px;">
        <!-- Top button -->
        <!-- <ul class="nav nav-pills mb-auto gap-5 justify-content-center">
            <li class="nav-item mx-5">
                <button class="fw-bold btn btn-outline-success rounded-pill shadow">
                    <i class="fas fa-chart-bar"></i>
                    Tổng Quan
                </button>
            </li>
            <li class="nav-item mx-5">
                <button class="fw-bold btn btn-outline-success rounded-pill shadow">
                    <i class="fas fa-users"></i>
                    Thành Viên
                </button>
            </li>
            <li class="nav-item mx-5">
                <button class="fw-bold btn btn-outline-success rounded-pill shadow">
                    <i class="fas fa-book"></i>
                    Tài Liệu
                </button>
            </li>
            <li class="nav-item mx-5">
                <button class="fw-bold btn btn-outline-success rounded-pill shadow">
                    <i class="fas fa-bullhorn"></i>
                    Tạo Thông báo
                </button>
            </li>
        </ul> -->
        <div class="row gap-2" style="margin-left: 0; margin-right: 0;">
            <div class="col-sm-8 mt-5 ">
                <!-- Classroom information -->
                <div class="container border border-3">
                    <h4 id="nameClass"></h4>
                    <h4>Chú thích:</h4>
                    <!-- p for chú thích -->
                    <p class="ps-3" id="infoClass"></p>
                    <h4 id="idClass">Mã lớp:</h4>
                    <input type="hidden" name="" value="" id="idClassCurent">
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
                <div class="mt-5 pb-5">
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
        </div>
        <div class="container col-sm-3 overflow-auto text-center fixed-top bg-light" style="margin-right:0px; margin-top:70px; height:90%; z-index: 1;">
            <!-- Announcement -->
            <div class="border-start">

                <h4>Thông báo gần nhất:</h4>
                <p>Nguyễn Văn A đã tạo lớp</p>
                <p>4/8/2022 lúc 07:00</p>
            </div>
            <hr>
            <!-- Information -->
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
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique soluta quo libero minus aperiam accusamus dolorem officiis earum impedit voluptas, reiciendis ullam incidunt sed fugiat laudantium nisi architecto nihil consectetur numquam praesentium sequi quae maxime quasi. Quasi explicabo placeat voluptates! Placeat ab dolorum ipsa laboriosam molestiae? Nisi fugit beatae fugiat iure natus libero totam, unde repellendus cupiditate corporis, obcaecati veritatis repellat consequuntur voluptatibus. Eligendi consequuntur, accusamus voluptates dolore, eos maxime reiciendis, iure suscipit et qui aspernatur fuga sunt cumque alias aut dicta quam accusantium perspiciatis optio soluta labore aliquam nulla. Blanditiis, dolorum provident mollitia ipsam non facilis minus ex dicta.</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique soluta quo libero minus aperiam accusamus dolorem officiis earum impedit voluptas, reiciendis ullam incidunt sed fugiat laudantium nisi architecto nihil consectetur numquam praesentium sequi quae maxime quasi. Quasi explicabo placeat voluptates! Placeat ab dolorum ipsa laboriosam molestiae? Nisi fugit beatae fugiat iure natus libero totam, unde repellendus cupiditate corporis, obcaecati veritatis repellat consequuntur voluptatibus. Eligendi consequuntur, accusamus voluptates dolore, eos maxime reiciendis, iure suscipit et qui aspernatur fuga sunt cumque alias aut dicta quam accusantium perspiciatis optio soluta labore aliquam nulla. Blanditiis, dolorum provident mollitia ipsam non facilis minus ex dicta.</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique soluta quo libero minus aperiam accusamus dolorem officiis earum impedit voluptas, reiciendis ullam incidunt sed fugiat laudantium nisi architecto nihil consectetur numquam praesentium sequi quae maxime quasi. Quasi explicabo placeat voluptates! Placeat ab dolorum ipsa laboriosam molestiae? Nisi fugit beatae fugiat iure natus libero totam, unde repellendus cupiditate corporis, obcaecati veritatis repellat consequuntur voluptatibus. Eligendi consequuntur, accusamus voluptates dolore, eos maxime reiciendis, iure suscipit et qui aspernatur fuga sunt cumque alias aut dicta quam accusantium perspiciatis optio soluta labore aliquam nulla. Blanditiis, dolorum provident mollitia ipsam non facilis minus ex dicta.</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique soluta quo libero minus aperiam accusamus dolorem officiis earum impedit voluptas, reiciendis ullam incidunt sed fugiat laudantium nisi architecto nihil consectetur numquam praesentium sequi quae maxime quasi. Quasi explicabo placeat voluptates! Placeat ab dolorum ipsa laboriosam molestiae? Nisi fugit beatae fugiat iure natus libero totam, unde repellendus cupiditate corporis, obcaecati veritatis repellat consequuntur voluptatibus. Eligendi consequuntur, accusamus voluptates dolore, eos maxime reiciendis, iure suscipit et qui aspernatur fuga sunt cumque alias aut dicta quam accusantium perspiciatis optio soluta labore aliquam nulla. Blanditiis, dolorum provident mollitia ipsam non facilis minus ex dicta.</p>
            </div>
        </div>
    </div>
</body>

</html>