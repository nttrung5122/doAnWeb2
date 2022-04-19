<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Home</title>
</head>

<body class="selector-for-some-widget">

    <!-- Header -->

    <?php
    require("./_partial/Header_Footer/Header_Footer.php");
    head()
    ?>

    <!-- Giới Thiệu -->
    <div id="form"  style=" display: none" >
    <?php include './_partial/form/formSignUp.php'; ?>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col mt-5">
                <h1 style="font-size: 300%;">Cùng nhau <span class="text-success"> học tập, kiểm tra </span> trực tuyến</h1>
                <!-- cần bổ sung -->
                <p>
                    ... mang tới cho bạn một công cụ hỗ trợ việc
                    <span class="fw-bold">
                        quản lý và thực hiện bài kiểm tra theo hình thức online
                    </span>
                    một cách dễ dàng và hiệu quả.
                </p>
                <button type="button" id= "btSignIn" class="btn btn-success shadow" data-bs-toggle="modal" data-bs-target="#form_signUp" >THAM GIA NGAY</button>
            </div>
            <div class="col text-center">
                <img src="../Assets/img/Light bulb.jpg" alt="lightbulb">
            </div>
        </div>
    </div>

    <!-- Đặc điểm -->

    <div class="p-5 text-center" style="background-color: #82dda5; margin-top: 100px;">
        <div class="row gap-3">
            <div class="col-xl-2 m-auto">
                <div class="p-3 bg-info rounded-top">
                    <h6>Tiện dụng</h6>
                </div>
                <div class="bg-white rounded-bottom" style="height: 150px;">
                    <p class="p-4">Dễ dàng sử dụng với những <span class="fw-bold"> thao tác đơn giản </span></p>
                </div>
            </div>
            <div class="col-xl-2 m-auto">
                <div class="p-3 bg-warning rounded-top">
                    <h6>Tự động</h6>
                </div>
                <div class="bg-white rounded-bottom" style="height: 150px;">
                    <p class="p-3">Những tác vụ được <span class="fw-bold"> tự động hoá </span> giúp người dùng có thời gian tập trung vào các công việc chính</p>
                </div>
            </div>
            <div class="col-xl-2 m-auto">
                <div class="p-3 bg-danger rounded-top">
                    <h6>Bảo mật</h6>
                </div>
                <div class="p-3 bg-white rounded-bottom" style="height: 150px;">
                    <p class="p-2">Kiểm duyệt học sinh ra vào lớp, <span class="fw-bold"> chống rò rỉ </span> tài nguyên giảng dạy.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tính năng -->

    <div class="p-5 row" style="margin-right: 0px;">
        <h1 class="mb-5  text-center"> <span class="text-success">Tính năng </span> nổi bật</h1>
        <div class="col-sm-6 text-center border-end">
            <img src="../Assets/img/function.png" alt="function" style="width:70%" class="m-5 img-thumbnail">
        </div>
        <div class="col-sm-6 ps-5">
            <p class="m-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M5.536 21.886C5.682 21.962 5.841 22 6 22C6.2 22 6.398 21.94 6.569 21.822L19.569 12.822C19.839 12.635 20 12.328 20 12C20 11.672 19.839 11.365 19.569 11.178L6.569 2.178C6.264 1.966 5.864 1.941 5.536 2.114C5.206 2.287 5 2.628 5 3V21C5 21.372 5.206 21.713 5.536 21.886ZM7 4.909L17.243 12L7 19.091V4.909Z" fill="#2B2C34" />
                </svg>
                <span>Kho dữ liệu rộng lớn</span>
            </p>
            <p class="m-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M5.536 21.886C5.682 21.962 5.841 22 6 22C6.2 22 6.398 21.94 6.569 21.822L19.569 12.822C19.839 12.635 20 12.328 20 12C20 11.672 19.839 11.365 19.569 11.178L6.569 2.178C6.264 1.966 5.864 1.941 5.536 2.114C5.206 2.287 5 2.628 5 3V21C5 21.372 5.206 21.713 5.536 21.886ZM7 4.909L17.243 12L7 19.091V4.909Z" fill="#2B2C34" />
                </svg>
                <span>Hệ thống chấm thi</span>
            </p>
            <p class="m-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M5.536 21.886C5.682 21.962 5.841 22 6 22C6.2 22 6.398 21.94 6.569 21.822L19.569 12.822C19.839 12.635 20 12.328 20 12C20 11.672 19.839 11.365 19.569 11.178L6.569 2.178C6.264 1.966 5.864 1.941 5.536 2.114C5.206 2.287 5 2.628 5 3V21C5 21.372 5.206 21.713 5.536 21.886ZM7 4.909L17.243 12L7 19.091V4.909Z" fill="#2B2C34" />
                </svg>
                <span>Quản lý đề thi</span>
            </p>
            <p class="m-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M5.536 21.886C5.682 21.962 5.841 22 6 22C6.2 22 6.398 21.94 6.569 21.822L19.569 12.822C19.839 12.635 20 12.328 20 12C20 11.672 19.839 11.365 19.569 11.178L6.569 2.178C6.264 1.966 5.864 1.941 5.536 2.114C5.206 2.287 5 2.628 5 3V21C5 21.372 5.206 21.713 5.536 21.886ZM7 4.909L17.243 12L7 19.091V4.909Z" fill="#2B2C34" />
                </svg>
                <span>Thống kê</span>
            </p>
        </div>
    </div>

    <!-- Footer -->

    <?php
    footer();
    ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        var CV="gv";
        function setCV(cv){
            CV=cv;
        }
        $(document).ready(function(){
            $("#btSignIn").click(function(){
                console.log("1");
                document.getElementById("form").style.display="block";
            });
            $("#btnForm").click(function(e){
                postData();
                
            });
        });
        function postData(){
            let ten=$("#inputTen").val();
                let emails=$("#inputEmail").val();
                let password=$("#inputPass1").val();
                let password2=$("#inputPass2").val();
                let sdt=$("#inputSdt").val();   
                let ngaysinh=$("#inputDate").val();
                let gioitinh=$("#inputGioitinh").val();
                console.log(ten);
                console.log(emails);
                console.log(password);
                console.log(password2);
                console.log(sdt);
                console.log(gioitinh);
                console.log(ngaysinh);
                console.log(CV);
        }

    </script>

</html>