<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/1f286772f7.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Dashboard</title>
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
        });
    </script>
</head>

<body>
    <!-- Header -->
    <?php
    include "./_partial/Header_Footer/Header_Footer.php";
    head($studentPage);
    ?>

    <!-- Sidebar -->

    <div class="d-flex flex-column fixed-top flex-shrink-0 p-2 overflow-auto" style="height:93%; width: 280px; margin-top: 60.2px; background-color: #82dda5; z-index: 1;">
        <!-- Tính năng -->
        <?php require("./_partial/TeacherAndStudent_Component/Sidebar.php");
        Sidebar($studentPage); ?>
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
                <div class="col py-3">
                    <div class="row px-3">
                        <div class="card py-2">
                            <div class="col-md align-self-start">
                                <h4 id="nameClass"></h4>
                                <h4 class="ps-3">Mô tả:</h4>
                                <!-- p for chú thích -->
                                <p class="ps-5" id="infoClass"></p>
                            </div>
                            <div class="row px-3">
                                <div class="col">
                                    <h4 id="idClass">Mã lớp:</h4>
                                </div>
                                <div class="col">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle mb-2" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                    <h4 style="display:inline-block;">Giáo viên:</h4>
                                    <!-- thẻ p cho tên giáo viên -->
                                    <p></p>
                                </div>
                                <div class="col ">
                                    <button type="button" class="btn btn-warning text-dark fw-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                        </svg>
                                        Rời lớp
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row px-3 mt-5">
                        <div class="card py-2 ">
                            <div class="row px-2 ">
                                <div class="col-4 text-center">
                                    <p class=" fs-5 fw-bold">Bài kiểm tra</p>
                                    <ul class="nav nav-pills nav-fill align-items-center align-items-sm-start">
                                        <!-- nav-link active là lớp đang chọn -->
                                        <li class="">
                                            <a class="nav-link active align-items-center align-items-sm-start" aria-current="page" href="#">Bài kiểm tra giữa kì 23/4/2022</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-2 d-flex" style="height: 200px;">
                                    <div class="vr"></div>
                                </div>
                                <div class="col-4">
                                    <p class="text-center fs-5 fw-bold">Bài kiểm tra giữa kì:</p>
                                    <div class="">
                                        <p class="">Ngày bắt đầu:</p>
                                        <p class="">Hạn chót:</p>
                                        <p class="">Thời gian làm bài:</p>
                                        <hr>
                                        <div class="text-center"><a href="#" class="btn btn-success text-center ">Làm bài</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container col-sm-3 overflow-auto text-center fixed-top bg-light" style="margin-right:0px; margin-top:70px; height:90%; z-index: 1;">
            <!-- Announcement -->
            <?php require("./_partial/TeacherAndStudent_Component/AnnouncementAndInfo.php");
            createAnnouncement();
            ?>
        </div>
    </div>
</body>

</html>