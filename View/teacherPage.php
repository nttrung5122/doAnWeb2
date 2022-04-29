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
    <script src="https://kit.fontawesome.com/dde1966e52.js" crossorigin="anonymous"></script>
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
                        if (JSON.parse(data)['status'] == 'success') {
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);

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

        function renderInfo(idClass) {
            $.ajax({
                type: "POST",
                url: "../Controller/controller.php",
                data: {
                    act: "getClass",
                    id: idClass,
                },
                success: function(data) {
                    data = JSON.parse(data);
                    $("#nameClass").html(data['tenLop']);
                    $("#infoClass").html(data['ThongTin']);
                    $("#idClass").html("Mã lớp: " + data['maLop']);
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
    <div class="d-flex flex-column fixed-top flex-shrink-0 p-2 overflow-auto" style="height:93%; width: 280px; margin-top: 60.2px; background-color: #82dda5; z-index: 1;">
        <!-- Tính năng -->
        <?php require("./_partial/TeacherAndStudent_Component/Sidebar.php");
        Sidebar($teacherPage); ?>
        <!-- Danh sách lớp -->
        <span class="fs-3 fw-bold">Danh sách lớp</span>
        <ul id="class" class="nav nav-pills flex-column mb-5 border-top border-dark pt-2">
            <?php
            include "../Controller/classController.php";
            ClassController::rederClass($_SESSION['user'][0]);
            ?>
        </ul>
    </div>

    <!-- Content -->
    
    <div style="margin-left: 280px; margin-top: 80px;">
        <div class="row gap-2" style="margin-left: 0; margin-right: 0;">
            <div class="col-sm-8 mt-5 ">
                <!-- Classroom information -->

                <div class="container border border-3" style="">
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
                        <button type="button" class="btn btn-warning text-center fw-bold">
                        <i class="fa-solid fa-trash"></i> Xóa Lớp</button>
                        </div>
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
            <?php require("./_partial/TeacherAndStudent_Component/AnnouncementAndInfo.php");
            // Announcement
            createAnnouncement();
            // Information
            createInformation();
            ?>
        </div>
    </div>
</body>

</html>