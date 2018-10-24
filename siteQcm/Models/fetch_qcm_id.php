<?php
    $query = 
    "SELECT id
    FROM qcm
    WHERE nom LIKE :q";

    $query_params = array(':q' => $qcm);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }  
    $res = $stmt -> fetchAll();
    if(!empty($res)){
        $qcm = $res[0]['id'];
    }
?>