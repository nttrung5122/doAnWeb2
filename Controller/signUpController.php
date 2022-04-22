<?php

include '../model/dataProvider.php';

$sql = "SELECT * FROM `taikhoan`;";
$data= DataProvider::executeSQL($sql);
// echo json_encode($data);
// echo json_encode(mysqli_fetch_array($data));
$result="";
while ($row = mysqli_fetch_array($data)){
    $result.= json_encode($row);
}
// echo result;
// echo $data;

?>