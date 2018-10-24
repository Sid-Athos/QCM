<?php

    if(!isset($_SESSION['status'])){
        header('refresh:0;url=./index.php?page=login');
    }

?>