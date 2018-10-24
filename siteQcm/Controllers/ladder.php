<?php
    include('./Controllers/functions/PHP/session_check.php');    
    include('./Models/db_connect.php');
    include('./Controllers/functions/PHP/messages.php');
    include('./Models/fetch_legends.php');
    if($_SESSION['status'] === "t"){
        include('./Views/navbar.php');                
    } else {
        include('./Views/navbar_s.php');                
    }
    if($_SESSION['status'] === "t")
    {
        include('./Models/work_bitch.php');
            if(!empty($res)){
                if(intval($res[0]['qcmAmount']) === intval($res[0]['passerAmount'])){
                    echo "<script> alert('Tous les qcm ont été passés. Work bitch.');</script>";
                }
            }
    }
    include('./Views/show_legends.php');
?>