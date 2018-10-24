<?php
    include('../Models/db_connect.php');
    include('../Models/fetch_qcm_q.php');
    $qcm = htmlspecialchars($_POST['QCM']);
    $res = fetch_qcm_q($db,$qcm);
    include('../Views/select_qcm_q.php');
    unset($db);
?>