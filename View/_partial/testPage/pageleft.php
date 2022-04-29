<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <?php include './cauhoiModules.php'; ?>
</head>

<body>

    <div class="text-center fw-bold fs-2">Tên Đề thi</div>
    <!-- Tạo list câu hỏi -->
    <ol class="list-group list-group-numbered list-group-flush" style="height: 800px;overflow-y: scroll;">
        <!-- Mỗi hàm là 1 câu -->
        <!-- Số cuối hàm là số thứ tự câu trả lời là đáp án -->
        <?php
            taoCauhoi::taoCauhoi('Câu hỏi số 1?', 'Đáp án 1', 'Đáp án 2', 'Đáp án 3', 'Đáp án 4', 'maCauhoi1', 1);
            taoCauhoi::taoCauhoi('Câu hỏi số 2?', 'Đáp án 1', 'Đáp án 2', 'Đáp án 3', 'Đáp án 4', 'maCauhoi2', 3);
            taoCauhoi::taoCauhoi('Câu hỏi số 3?', 'Đáp án 1', 'Đáp án 2', 'Đáp án 3', 'Đáp án 4', 'maCauhoi3', 2);
            taoCauhoi::taoCauhoi('Câu hỏi số 4?', 'Đáp án 1', 'Đáp án 2', 'Đáp án 3', 'Đáp án 4', 'maCauhoi4', 4);
        ?>
    </ol>
</body>