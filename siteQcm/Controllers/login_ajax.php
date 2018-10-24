<?php
    session_start();
    unset($_SESSION);
    include('../Models/db_connect.php');
    include('../Models/log_check.php');
    $email = HTMLSPECIALCHARS($_POST['mail']);
    $pw = HTMLSPECIALCHARS($_POST['pw']);
    $answer = log_check($db,$email,$pw);
?>