<?php
    $query = 
    "SELECT count(id) as qcmAmount,
    (SELECT count(passer.qcm) FROM passer GROUP BY user ORDER BY count(passer.qcm) DESC LIMIT 1) as passerAmount 
    FROM qcm";

    try {
        $stmt = $db -> prepare($query);
        $stmt -> execute(NULL);
    } catch(PDOException $ex){
        die("<br> Failed to connect execute the query : ".$ex->getMessage());
    }
    $res = $stmt ->fetchAll();
?>