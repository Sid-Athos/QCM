<?php
    $query = 
    "SELECT 1
    FROM qcm
    WHERE nom = :nom";

    $query_params = array(":nom" => $qc_name);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        $mess = "Success!";
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }

    $res = $stmt -> fetchAll();
?>