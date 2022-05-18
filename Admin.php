<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ./');
} else if ($_SESSION['user']['loaiTk'] != 'admin') {
    header('Location: ./');
}
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
                    $('#activeRadio').html(`<button id="" type="button" class="btn btn-info mx-2" style="height:50%;"  data-bs-toggle="modal" data-bs-target="#form_signUp">Tạo tài khoản</button>
                                            <select id="radio" class="form-select"  style="width: 50%;" aria-label="Default select example" onchange="searchRadio(this)">
                                                <option disabled selected>Lọc tài khoản kích hoạt</option>
                                                <option value="1">Đã kích hoạt</option>
                                                <option value="0">Chưa kích hoạt</option>
                                                <option value="2">Tất cả</option>
                                            </select>
                                            <button id="activeAll" type="button" class="btn btn-success mx-2" style="height:50%;" onclick="activeAll();">Kích hoạt tất cả</button>
                                            <button id="unActiveAll" type="button" class="btn btn-outline-success mx-2" style="height:50%;" onclick="unActiveAll();">Bỏ kích hoạt tất cả</button>`);
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
                    $('#activeRadio').html('');
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
                    $('#activeRadio').html('');
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
                window.location = './index.php';

            });
            $('#activeAll').click(function() {
                $.ajax({
                    type: 'POST',
                    url: "./Controller/controller.php",
                    data: {
                        act: 'activeAll'
                    },
                    success: function(data) {
                        renderAccountTable();
                    }
                })
            })
            $('#unActiveAll').click(function() {
                $.ajax({
                    type: 'POST',
                    url: "./Controller/controller.php",
                    data: {
                        act: 'unActiveAll'
                    },
                    success: function(data) {
                        renderAccountTable();
                    }
                })
            })
            $("#btnFormSignUp").click(function(e) {
                postDataSignUp();
            });
        });
        var CV = "gv";

        function setCV(cv) {
            CV = cv;
        }

        function activeAll() {
            $.ajax({
                type: 'POST',
                url: "./Controller/controller.php",
                data: {
                    act: 'activeAll'
                },
                success: function(data) {
                    renderAccountTable();
                }
            })
        }

        function unActiveAll() {
            $.ajax({
                type: 'POST',
                url: "./Controller/controller.php",
                data: {
                    act: 'unActiveAll'
                },
                success: function(data) {
                    renderAccountTable();
                }
            })
        }

        function active(s) {
            var id = s.name;
            var active = $('input[name="' + s.name + '"]').is(':checked') == true ? 1 : 0;
            $.ajax({
                type: 'POST',
                url: "./Controller/controller.php",
                data: {
                    act: 'active',
                    active: active,
                    id: id,
                },
                success: function(data) {
                    const myTimeout = setTimeout(renderAccountTable, 200);
                }
            })
        }

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
            var password = $('input[name="password' + btn.id + '"]').val();
            var role = $('input[name="role' + btn.id + '"]').val();
            var name = $('input[name="name' + btn.id + '"]').val();
            var birth = $('input[name="birth' + btn.id + '"]').val();
            var phone = $('input[name="phone' + btn.id + '"]').val();
            if (checkAccount(password, phone, role)) {

                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: "editAccount",
                        id: btn.name,
                        password: password,
                        role: role,
                        name: name,
                        birth: birth,
                        phone: phone,
                    },
                    success: function(data) {
                        renderAccountTable();
                    }
                });
            }
        };

        function editClass(btn) {
            var tenLop = $('input[name="tenLop' + btn.id + '"]').val();
            var thongTin = $('input[name="thongTin' + btn.id + '"]').val();
            var email = $('input[name="email' + btn.id + '"]').val();

            $.ajax({
                type: "POST",
                url: "./Controller/controller.php",
                data: {
                    act: "editClass",
                    id: btn.name,
                    tenLop: tenLop,
                    thongTin: thongTin,
                    email: email,
                },
                success: function(data) {
                    console.log(data);
                    $('#table').html(JSON.parse(data));
                }
            });
        };

        function editQuestion(btn) {
            var maNhom = $('input[name="maNhom' + btn.id + '"]').val();
            var noiDung = $('input[name="noiDung' + btn.id + '"]').val();
            var dapAn = $('input[name="dapAn' + btn.id + '"]').val();

            if (checkQuestion(dapAn)) {
                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: "editQuestion",
                        id: btn.name,
                        maNhom: maNhom,
                        noiDung: noiDung,
                        dapAn: dapAn,
                    },
                    success: function(data) {
                        console.log(data);
                        $('#table').html(JSON.parse(data));
                    }
                });
            }
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

        function searchRadio(loai) {

            console.log(loai.value);

            // tạo biến
            var filterByradio, table, tr, td, i, txtValue;

            radio = document.getElementsByName("loaiCauhoi");
            filterByradio = loai.value.toUpperCase();
            table = document.getElementById("table-type");
            tr = table.getElementsByTagName("tr");

            // lọc câu hỏi
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[6];
                if (loai.value == 2) {
                    tr[i].style.display = "";
                    continue;
                }
                if (td) {
                    console.log(td.childNodes[0].childNodes[0].hasAttribute('checked') == true ? 1 : 0);
                    txtValue = td.childNodes[0].childNodes[0].hasAttribute('checked') == true ? 1 : 0;
                    if (txtValue == loai.value) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function checkQuestion(dapAn) {
            if (!checkAnswer(dapAn) && dapAn.trim() != "") {
                showNotice('Đáp án phải ở định dạng: a (A), b (B), c (C), d (D)');
                return false;
            }
            return true;
        }

        function checkAccount(password, sdt, type) {
            if (!checkSdt(sdt) && sdt.trim() != "") {
                showNotice('Số điện thoại của bạn không đúng định dạng!');
                return false;
            }
            if (!checkPass(password) && password.trim() != "") {
                showNotice('Mật khẩu không được chứa kí tự đặt biệt và phải hơn 8 kí tự');
                return false;
            }
            if (!checkType(type) && type.trim() != "") {
                showNotice('Chức vụ chỉ ở định dạng sau: sv (sinh viên), gv (giảng viên), admin')
                return false;
            }
            return true;
        }

        function checkType(type) {
            return (type == 'sv' || type == 'gv' || type == 'admin');
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

        function check() {
            // return true;
            let emails = $("#inputEmail").val();
            let password = $("#inputPass1").val();
            let password2 = $("#inputPass2").val();
            let sdt = $("#inputSdt").val();
            let ngaysinh = $("#inputDate").val();
            let gioitinh = $("#inputGioitinh").val();
            if (emails.trim() == "" || password.trim() == "" || sdt.trim() == "" || ngaysinh.trim() == "" || gioitinh.trim() == "") {
                showNotice("Vui lòng nhập đầy đủ thông tin");
                return false;
            }
            if (!checkSdt(sdt)) {
                showNotice('Số điện thoại của bạn không đúng định dạng!');
                return false;
            }
            if (!checkEmail(emails)) {
                showNotice('Email của bạn không đúng định dạng!');
                return false;
            }
            if (!checkPass(password)) {
                showNotice('Mật khẩu không được chứa kí tự đặt biệt và phải hơn 8 kí tự');
                return false;
            }
            if (password != password2) {
                showNotice("Mật khẩu không khớp vui lòng nhập lại");
                return false;
            }
            if (!$('#checkCondition').is(':checked')) {
                showNotice("Vui lòng đồng ý với các điều khoản của chúng tôi.")
                return false;
            }
            return true;
        }

        function checkAnswer(dapAn) {
            dapAn = dapAn.toLowerCase();
            return (dapAn == 'a' || dapAn == 'b' || dapAn == 'c' || dapAn == 'd');
        }

        function postDataSignUp() {
            let ten = $("#inputTen").val();
            let emails = $("#inputEmail").val();
            let password = $("#inputPass1").val();
            let password2 = $("#inputPass2").val();
            let sdt = $("#inputSdt").val();
            let ngaysinh = $("#inputDate").val();
            let gioitinh = $("#inputGioitinh").val();
            console.log(ten);
            console.log(emails);
            console.log(password);
            console.log(password2);
            console.log(sdt);
            console.log(gioitinh);
            console.log(ngaysinh);
            console.log(CV);
            if (check()) {
                console.log("ajax")
                $.ajax({
                    type: "POST",
                    url: "./Controller/controller.php",
                    data: {
                        act: 'signUp',
                        user: emails,
                        hoten: ten,
                        password: password,
                        sdt: sdt,
                        ngaysinh: ngaysinh,
                        gioitinh: gioitinh,
                        cv: CV,
                    },
                    success: function(data) {
                        console.log(data);
                        showNotice(JSON.parse(data)['notice']);
                        if (JSON.parse(data)['status'] == 'success') {
                            $('#form_signUp').modal('hide');
                            window.location.reload();
                            // $('#form_signIn').modal('show');
                        }
                    }
                })
            }
        }
    </script>
    <?php
    include "./View/_partial/popup/notice.php";
    include './View/form/formSignUp.php';
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
        <div id="activeRadio" class="d-flex justify-content-center mt-3">

        </div>
        <div class="container" id="table">

        </div>
    </div>

</body>

</html>