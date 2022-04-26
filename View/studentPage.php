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
    <title>Dashboard</title>
    <style>
        body{
            background-color: #f2f2f2f2;
        }
        .nav-link{
            color: black;
        }
        .nav-pills .nav-link.active{
            color: black;
            background-color: #d5d5d5;
        }
    </style>
</head>
<body>
<?php
    include "./_partial/Header_Footer/Header_Footer.php";

    head($studentPage);
    ?>

<div class="container-fluid position-fixed" style="top:60.2px">
    <div class="row flex-nowrap">
        <!-- px là set padding cho left right, còn py là set padding cho top bottom -->
        <div class="col-2 col-md-2 col-xl-2 px-sm-2 fw-bold" style="background-color: #d6e1cd;">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-black min-vh-100">
                <div class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-black text-decoration-none">
                    <span class="fs-5 d-sm-inline">Danh Sách Lớp:</span>
                    </div>
                <ul class="nav nav-pills nav-fill align-items-center align-items-sm-start">
                    <!-- nav-link active là lớp đang chọn -->
                    <li class="w-100">
                    <a class="nav-link active px-0 " aria-current="page" href="#">Lập trình web 2</a>
                    </li>
                    <li class="w-100">
                    <a class="nav-link px-0" aria-current="page" href="#">Lý thuyết đồ thị</a>
                    </li>
                    
                </ul>
                <hr style="width:80%; background-color:grey;height:3px">
                <ul class="nav nav-pills nav-fill align-items-center align-items-sm-start">
                    <!-- nav-link active là lớp đang chọn -->
                    <li class="w-100">
                    <a class="nav-link active px-0" aria-current="page" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-fill" viewBox="0 0 16 16">
  <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z"/>
</svg> Tổng quan</a>
                    </li>
                    <li class="w-100" >
                    <a class="nav-link px-0" aria-current="page" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.100 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg> Thành viên</a>
                    </li>
                    <li class="w-100">
                    <a class="nav-link px-0" aria-current="page" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
  <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg> Tài liệu</a>
                    </li>
                </ul>
            </div>
            </div>
            
        <div class="col py-3">
            <div class="row px-3">
            <div class="card py-2">
                <div class="col-md align-self-start">
                    <p class="px-3">Lập trình web 2</p>
                    <p class="px-3">Mô tả:</p>
                 </div>
               <div class="row px-3">
                <div class="col">Mã lớp:</div>
                <div class="col"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg> Giáo viên:</div>
                <div class="col "><button type="button" class="btn btn-warning text-dark fw-bold" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg> Rời lớp</button></div>
                </div>
                </div>
            </div>

            <div class="row px-3 mt-5">
                <div class="card py-2 ">
                    <div class="row px-2 ">
                        <div class="col-4 text-center">
                            <p class="">Bài kiểm tra</p>
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
                        <p class="text-center">Bài kiểm tra giữa kì:</p>
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
        
        <div class="container col-3 mt-3 text-center">
                <h4>Thông báo gần nhất:</h4>
                <p>Nguyễn Văn A đã tạo lớp</p>
                <p>4/8/2022 lúc 07:00</p>
                <hr>
            </div>
    </div>
</div>



</body>
</html>