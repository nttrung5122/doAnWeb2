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

        .scrollClass {
            height: 70vh;
            overflow-y: auto;
        }
    </style>
    <script>
        window.onload = function() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: 'renderListClass',
                },
                success: function(data) {
                    $("#class").html(JSON.parse(data));
                    console.log(data);
                }
            })
        };
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
                    url: "./Controller/controller.php",
                    data: {
                        act: 'logOut'
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
                window.location = './homePage.php';

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
                    url: "./Controller/controller.php",
                    data: {
                        act: "createClass",
                        id: id,
                        name: name,
                        info: info,
                    },
                    success: function(data) {
                        console.log(data);
                        showNotice(JSON.parse(data)['notice']);
                        if (JSON.parse(data)['status'] == 'success') {
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);

                        }
                    }
                })
            });
            $('#btnDeleteClass').click(function() {
                let idClass = $("#idClassCurent").val();
                if (idClass == "")
                    return;
                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: 'deleteClass',
                        idClass: idClass
                    },
                    success: function(data) {
                        console.log(idClass);
                        console.log(data);
                        showNotice(JSON.parse(data)['notice']);
                        if (JSON.parse(data)['status'] == 'success') {
                            setTimeout(() => {
                                window.location.reload();
                            }, 2000);
                        }
                    }
                });
            });
            $("#btnRenderMember").click(function() {
                let idClass = $("#idClassCurent").val();
                if (idClass == "")
                    return;

                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: 'renderMember',
                        idClass: idClass,
                    },
                    success: function(data) {
                        console.log(data);
                        // console.log(JSON.parse(data));
                        $("#content").html(JSON.parse(data));
                    }
                });
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
                url: "./Controller/controller.php",
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
    <?php require("./View/_partial/Header_Footer/Header_Footer.php");
    head($teacherPage);
    include "./View/_partial/form/form_create_class.php";
    include "./View/_partial/popup/notice.php"
    ?>

    <!-- Side Navigation -->
    <div class="d-flex flex-column fixed-top flex-shrink-0 p-2 overflow-auto" style="height:93%; width: 280px; margin-top: 60.2px; background-color: #82dda5; z-index: 1;">
        <!-- Tính năng -->
        <?php require("./View/_partial/TeacherAndStudent_Component/Sidebar.php");
        Sidebar($teacherPage); ?>
        <!-- Danh sách lớp -->
        <span class="fs-3 fw-bold">Danh sách lớp</span>
        <ul id="class" class="nav nav-pills flex-column mb-5 border-top border-dark pt-2">

        </ul>
    </div>

    <!-- Content -->

    <div style="margin-left: 280px; margin-top: 80px;">
        <div class="row" style="margin-left: 0; margin-right: 0;">
        <?php
            if(isset($_GET['act']) && $_GET['act'] == 'bankQuestion' ){
                    require('./View/_partial/TeacherAndStudent_Component/nganHangcauHoi.php');
            }
            else
                require('./View/_partial/TeacherAndStudent_Component/tongQuan_Teacher.php'); 
            // require('./View/_partial/TeacherAndStudent_Component/thanhVien.php');
            ?>
        </div>
    </div>
</body>

</html>