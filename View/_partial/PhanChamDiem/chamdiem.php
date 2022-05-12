<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<title>Chấm điểm</title>
<?php include './chamdiemModules.php'; ?>

<body>
    <div class="container">
        <div class="row align-items-start mb-3">
            <div class="text-center fw-bold fs-2 mb-3">Chấm điểm</div>
        </div>
        <!-- 1 dòng -->
        <div class="hstack gap-3">
            <div class="fs-3 fw-bold">Điểm:</div>
            <div class="ms-auto fs-3 fw-bold" style="width: 3rem;">10</div>
        </div>
        <hr>
        <!-- số câu đúng -->
        <div class="hstack gap-3">
            <div class="fs-4 fw-bold">Số câu đúng:</div>
            <div class="ms-auto fs-4 fw-bold" style="width: 3rem;">0</div>
        </div>
        <!--  -->
        <div class="hstack gap-3">
            <div class="fs-4 fw-bold">Số câu sai:</div>
            <div class="ms-auto fs-4 fw-bold" style="width: 3rem;">0</div>
        </div>
        <!--  -->
        <div class="hstack gap-3 mb-4">
            <div class="fs-4 fw-bold">Số câu chưa làm:</div>
            <div class="ms-auto fs-4 fw-bold" style="width: 3rem;">0</div>
        </div>

        <!-- đáp án -->
        <div class="text-center fw-bold fs-3 mb-3">Đáp án</div>
        <div style="height: 500px; overflow-y: scroll;" class="mb-3">
            <!-- 1 dòng dáp án -->
            <?php echo
            chamdiemModules::cauDung(1, 'A') .
                chamdiemModules::cauDung(2, 'B') .
                chamdiemModules::cauDung(3, 'A') .
                chamdiemModules::cauSai(4, 'C') .
                chamdiemModules::cauSai(5, 'D') .
                chamdiemModules::cauDung(6, 'D') .
                chamdiemModules::cauDung(7, 'C') .
                chamdiemModules::cauSai(8, 'B') .
                chamdiemModules::cauDung(9, 'A');
            ?>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto mb-3">
            <button class="btn btn-outline-primary" type="button">Tiếp tục</button>
        </div>
    </div>
</body>