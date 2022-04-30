<?php
$studentPage = "Student Page";
$teacherPage = "Teacher Page";
function sidebar($currentPage)
{
    global $studentPage;
    if ($currentPage == $studentPage) {
        echo '<ul id="tabs" class="nav nav-pills flex-column mt-2 mb-5">
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
                            <i class="fas fa-bullhorn"></i>
                            Tạo Thông báo
                        </a>
                    </li>
                </ul>';
    } else {
        echo '<ul id="tabs" class="nav nav-pills flex-column mt-2 mb-5">
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-chart-bar"></i>
                            Tổng Quan
                        </a>
                    </li>
                    <li>
                        <a href="#" id="btnRenderMember" class="nav-link link-dark">
                            <i class="fas fa-users"></i>
                            Thành Viên
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark">
                            <i class="fas fa-book"></i>
                            Tạo đề kiểm tra
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link link-dark">
                            <i class="fas fa-bullhorn"></i>
                            Tạo Thông báo
                        </a>
                    </li>
                </ul>';
    }
}