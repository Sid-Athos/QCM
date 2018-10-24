<?php
    include('../Models/db_connect.php');
    include('../Models/fetch_qcm_q.php');
    $qcm = htmlspecialchars($_POST['QCM']);
    if($qcm !== "Veulliez sélectionner un QCM"){
        $res = fetch_qcm_q($db,$qcm);
        include('../Views/kill_qcm_q.php');
    }
?>