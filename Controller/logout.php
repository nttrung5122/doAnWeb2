<?php

    echo $_SESSION['user'];
    echo $_SESSION['user'][3];

    unset($_SESSION['user'][3]);
    echo $_SESSION['user'];

    //header('Location:../View/HomePage.php');
?>
