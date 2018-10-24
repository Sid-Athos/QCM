<?php
    include('../Models/db_connect.php');
    if(isset($_POST['qcm'])){
    $pattern = "/^[0-9]$/";
        if(preg_match($pattern,$_POST['qcm']) && preg_match($pattern,$_POST['user'])){
            $user = intval($_POST['user']);
            $qcm = intval($_POST['qcm']);
            include('../Models/dead_stud.php');
            echo "<h4>Looser</h4>";
        }
    }
?>