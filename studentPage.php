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
                    act: 'renderInfoClass',
                },
                success: function(data) {
                    $("#class").html(JSON.parse(data));
                    // console.log(data);
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
        });
    </script>
</head>

<body>
    <!-- Header -->
    <?php
    include "./View/_partial/Header_Footer/Header_Footer.php";
    head($studentPage);
    include "./View/_partial/form/form_find_class.php";
    ?>

    <!-- Sidebar -->

    <div class="d-flex flex-column fixed-top flex-shrink-0 p-2 overflow-auto" style="height:93%; width: 280px; margin-top: 60.2px; background-color: #82dda5; z-index: 1;">
        <!-- Tính năng -->
        <?php require("./View/_partial/TeacherAndStudent_Component/Sidebar.php");
        Sidebar($studentPage); ?>
        <!-- Danh sách lớp -->
        <span class="fs-3 fw-bold">Danh sách lớp</span>
        <ul id="class" class="nav nav-pills flex-column mb-5 border-top border-dark pt-2">
            <!-- inner danh sách lớp -->
        </ul>
    </div>

    <!-- Content -->

    <div style="margin-left: 280px; margin-top: 80px;">
        <div class="row gap-2" style="margin-left: 0; margin-right: 0;">
            <?php
            // require('./View/_partial/TeacherAndStudent_Component/tongQuan_Student.php');
            require('./View/_partial/TeacherAndStudent_Component/thanhVien.php');
            ?>
        </div>
    </div>
</body>

</html>