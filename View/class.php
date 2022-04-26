<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include 'modal_modules.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Class</title>
    <style>
        body{
            font-weight: 900;
            background-color: #f2f2f2f2;
        }
        .navbar{
           
        }
    </style>
</head>
<body>
<?php
    require("./Header_Footer.php");
    head()
    ?>
  <!-- <nav class="navbar navbar-expand-sm bg-success navbar-dark ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Logo</a>

  

      <div class="navbar-nav gap-3">
        <div class="thongBao"><a class="nav-link" href="#">Lop Hoc</a></div>
        <div class="thongBao"><a class="nav-link" href="#">Thong Bao</a></div>
        <div class="vr"></div>
        <div class="taiKhoan"><a class="nav-link " href="#">Nguyen Van A</a></div>
      </div>
    </div>
  </nav> -->
  <!--Content Row -->
  <div class="d-flex flex-row-reverse bd-highlight p-3">
  <?php
      $input = '
      <form class="d-flex">
      <input class="form-control me-2 w-100" type="text" placeholder="Nhập mã lớp tại đây">
      </form>
      ';
      $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
    </svg> ';
        popupModules::btnToCallpopup($icon.'Tìm lớp', 'modal1');
        popupModules::oneButtons('Tìm lớp học', $input , 'Tìm kiếm',  'modal1');
        ?>
  </div>

  <div class="row" style="padding: 20px;">
  <div class="col-md-3 mt-3">
      <div class="card bg-success text-white shadow" style="">
        <!-- Chuyen sang trang lop -->
        <div class="card-header" style="transform: rotate(0);">
        <a href="1" class="stretched-link"></a>
        <div class="fs-3">Lap Trinh Web 2</div>
        <div class="">Nguyen Thanh Sang</div>
        </div>
        <div class="card-body bg-light">
          <p class="card-text text-black">Thong Bao</p>
          <!-- chuyen sang trang kiem tra -->
          <p class="card-text">
      <a href="kiemtra" class="stretched-link text-success" style="position: relative;">Kiem Tra</a>
    </p>
        </div>
      </div>
    </div>
    <div class="col-md-3 mt-3">
      <div class="card bg-success text-white shadow" style="">
        <!-- Chuyen sang trang lop -->
        <div class="card-header" style="transform: rotate(0);">
        <a href="1" class="stretched-link"></a>
        <div class="fs-3">Lap Trinh Web 2</div>
        <div class="">Nguyen Thanh Sang</div>
        </div>
        <div class="card-body bg-light">
          <p class="card-text text-black">Thong Bao</p>
          <!-- chuyen sang trang kiem tra -->
          <p class="card-text">
      <a href="kiemtra" class="stretched-link text-success" style="position: relative;">Kiem Tra</a>
    </p>
        </div>
      </div>
    </div>
    <div class="col-md-3 mt-3">
      <div class="card bg-success text-white shadow" style="">
        <!-- Chuyen sang trang lop -->
        <div class="card-header" style="transform: rotate(0);">
        <a href="1" class="stretched-link"></a>
        <div class="fs-3">Lap Trinh Web 2</div>
        <div class="">Nguyen Thanh Sang</div>
        </div>
        <div class="card-body bg-light">
          <p class="card-text text-black">Thong Bao</p>
          <!-- chuyen sang trang kiem tra -->
          <p class="card-text">
      <a href="kiemtra" class="stretched-link text-success" style="position: relative;">Kiem Tra</a>
    </p>
        </div>
      </div>
    </div>
    <div class="col-md-3 mt-3">
      <div class="card bg-success text-white shadow" style="">
        <!-- Chuyen sang trang lop -->
        <div class="card-header" style="transform: rotate(0);">
        <a href="1" class="stretched-link"></a>
        <div class="fs-3">Lap Trinh Web 2</div>
        <div class="">Nguyen Thanh Sang</div>
        </div>
        <div class="card-body bg-light">
          <p class="card-text text-black">Thong Bao</p>
          <!-- chuyen sang trang kiem tra -->
          <p class="card-text">
      <a href="kiemtra" class="stretched-link text-success" style="position: relative;">Kiem Tra</a>
    </p>
        </div>
      </div>
    </div>
    <div class="col-md-3 mt-3">
      <div class="card bg-success text-white shadow" style="">
        <!-- Chuyen sang trang lop -->
        <div class="card-header" style="transform: rotate(0);">
        <a href="1" class="stretched-link"></a>
        <div class="fs-3">Lap Trinh Web 2</div>
        <div class="">Nguyen Thanh Sang</div>
        </div>
        <div class="card-body bg-light">
          <p class="card-text text-black">Thong Bao</p>
          <!-- chuyen sang trang kiem tra -->
          <p class="card-text">
      <a href="kiemtra" class="stretched-link text-success" style="position: relative;">Kiem Tra</a>
    </p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>