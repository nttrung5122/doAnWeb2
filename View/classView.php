
<?php

// include '../Controller/classController.php';

class ClassView {

    public static function rederClass($data){
        $result="";
        while ($row = mysqli_fetch_array($data)){
            $result .='            <li>
            <a href="#" class="nav-link link-dark" onclick="renderInfo(\''.$row['maLop'].'\')">'

            .$row['tenLop'].
            '</a>
        </li>';
    }
    return $result;
}
}