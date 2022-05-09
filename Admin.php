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
    <title>Admin</title>
    <style>
        .active {
            background-color: #198754 !important;
        }

        .nav-pills .nav-link:hover {
            background-color: #198754;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0;
        }
    </style>
    <script>
        window.onload = function() {
            renderAccountTable();
        }

        function renderAccountTable() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderAccountTable",
                },
                success: function(data) {
                    $('#table').html(JSON.parse(data));
                }
            });
        }

        function renderClassTable() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderClassTable",
                },
                success: function(data) {
                    $('#table').html(JSON.parse(data));
                }
            });
        }
        function renderQuestionTable() {
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "renderQuestionTable",
                },
                success: function(data) {
                    console.log(data);
                    $('#table').html(JSON.parse(data));
                }
            });
        }
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
            $('#account').click(function() {
                renderAccountTable();
            });
            $('#class').click(function() {
                renderClassTable();
            });
            $('#question').click(function() {
                renderQuestionTable();
            });
        });
    </script>
    <?php
    include './View/_partial/popup/modal_modules.php';
    include './View/_partial/form/form_modules.php';
    ?>
</head>

<body>
    <!-- Header -->
    <?php
    require('./View/_partial/Header_Footer/Header_Footer.php');
    head($homePage);
    ?>

    <!-- Side Navigation -->
    <div class="d-flex flex-column fixed-top flex-shrink-0 p-2 overflow-auto" style="height:93%; width: 280px; margin-top: 60.2px; background-color: #82dda5; z-index: 1;">
        <!-- Tính năng -->
        <?php require("./View/_partial/TeacherAndStudent_Component/Sidebar.php");
        Sidebar($admin); ?>
    </div>

    <div style="margin-left: 280px; margin-top: 80px;">
        <!-- Search bar -->
        <div class="d-flex justify-content-center">
            <div class="input-group border-2 border-dark border rounded-pill mt-2 p-2" style="width:75%;">
                <i class="fas fa-search fs-4 my-auto mx-2"></i>
                <input class="form-control border-0" type="text" placeholder="Search...">
            </div>
        </div>
        <div class="container" id="table">
            
        </div>
    </div>

</body>

</html>