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
                    $('#table').html(JSON.parse(data));
                }
            });
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

        function clickDelete(btn) {
            var id = btn.getAttribute('name');
            var type = $('#table-type').attr('name');
            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "clickDelete",
                    idAdmin: id,
                    typeAdmin: type,
                },
                success: function(data) {
                    $('#table').html(JSON.parse(data));
                }
            });
        }

        function editAccount(btn) {
            var email = $('input[name="email' + btn.id + '"]').val();
            var password = $('input[name="password' + btn.id + '"]').val();
            var role = $('input[name="role' + btn.id + '"]').val();
            var name = $('input[name="name' + btn.id + '"]').val();
            var birth = $('input[name="birth' + btn.id + '"]').val();
            var phone = $('input[name="phone' + btn.id + '"]').val();
            if (checkAccount(email, password, phone)) {

                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: "editAccount",
                        id: btn.name,
                        email: email,
                        password: password,
                        role: role,
                        name: name,
                        birth: birth,
                        phone: phone,
                    },
                    success: function(data) {
                        $('#table').html(JSON.parse(data));
                    }
                });
            }
        };

        function editClass(btn) {
            var maLop = $('input[name="maLop' + btn.id + '"]').val();
            var tenLop = $('input[name="tenLop' + btn.id + '"]').val();
            var thongTin = $('input[name="thongTin' + btn.id + '"]').val();
            var soLuong = $('input[name="soLuong' + btn.id + '"]').val();
            var email = $('input[name="email' + btn.id + '"]').val();

            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "editClass",
                    id: btn.name,
                    maLop: maLop,
                    tenLop: tenLop,
                    thongTin: thongTin,
                    soLuong: soLuong,
                    email: email,
                },
                success: function(data) {
                    $('#table').html(JSON.parse(data));
                }
            });
        };

        function editQuestion(btn) {
            var maCau = $('input[name="maCau' + btn.id + '"]').val();
            var maNhom = $('input[name="maNhom' + btn.id + '"]').val();
            var noiDung = $('input[name="noiDung' + btn.id + '"]').val();

            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "editQuestion",
                    id: btn.name,
                    maCau: maCau,
                    maNhom: maNhom,
                    noiDung: noiDung,
                },
                success: function(data) {
                    console.log(data);
                    $('#table').html(JSON.parse(data));
                }
            });
        };

        function search() {
            // tạo biến
            var input, filterByinput, filterByradio, table, tr, td, i, txtValue, col;
            input = document.getElementById("search");
            filterByinput = input.value.toUpperCase();
            table = document.getElementById("table-type");
            tr = table.getElementsByTagName("tr");
            if (table.getAttribute('name') == "Account_Modal") {
                col = 0;
            } else if (table.getAttribute('name') == "Class_Modal") {
                col = 1;
            } else {
                col = 2;
            }
            // lọc câu hỏi
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[col];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filterByinput) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function checkAccount(emails, password, sdt) {
            if (!checkSdt(sdt) && sdt.trim() != "") {
                showNotice('Số điện thoại của bạn không đúng định dạng!');
                return false;
            }
            if (!checkEmail(emails) && emails.trim() != "") {
                showNotice('Email của bạn không đúng định dạng!');
                return false;
            }
            if (!checkPass(password) && password.trim() != "") {
                showNotice('Mật khẩu không được chứa kí tự đặt biệt và phải hơn 8 kí tự');
                return false;
            }
            return true;
        }

        function checkPass(pass) {
            let pass_regex = /^[a-zA-Z0-9]{8,}$/;
            return pass_regex.test(pass);
        }

        function checkSdt(sdt) {
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            return vnf_regex.test(sdt);
        }

        function checkEmail(email) {
            return String(email)
                .toLowerCase()
                .match(
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
        }
    </script>
    <?php
    include "./View/_partial/popup/notice.php";
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
                <input class="form-control border-0" type="text" placeholder="Search..." id="search" onkeyup="search()">
            </div>
        </div>
        <div class="container" id="table">

        </div>
    </div>

</body>

</html>