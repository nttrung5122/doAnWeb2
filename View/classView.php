
<?php

// include '../Controller/classController.php';

class ClassView
{

    public static function rederClass($data)
    {
        $result = "";
        while ($row = mysqli_fetch_array($data)) {
            $result .= '            <li>
            <a href="#" class="nav-link link-dark" onclick="renderInfo(\'' . $row['maLop'] . '\')">'

                . $row['tenLop'] .
                '</a>
        </li>';
        }

        return $result;
    }   
    public static function rederMember($data)
    {
        $result = '<div class="card "><div class="card-body scrollClass"><div class="">';
        while ($row = mysqli_fetch_array($data)) {
            $result .= ' <p class="card-text fs-4">' . $row[0] . '</p><hr>';
        }
        $result .= '</div></div></div>';
        return $result;
    }
}
