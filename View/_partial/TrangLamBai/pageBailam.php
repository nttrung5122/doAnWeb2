<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<title>Làm bài</title>
<script>
    // sử dụng jQuery
    function checkTheBox(name) {
        console.log(name);
        // bắt id của checkbox rùi check
        $("#" + name + "").prop("checked", true);
    }
</script>


<body class="bg-light">
    <div class="container bg-light mt-3">
        <div class="row align-items-start">
            <div class="col" style="height: 800px; overflow-y: scroll;">
                <?php include './phanLambai.php'; ?>
            </div>
            <div class="col">
                <?php include './phieutraloiCauhoi.php'; ?>
            </div>
        </div>
    </div>
</body>