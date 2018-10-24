<?php
    include('../Models/db_connect.php');

    $query = 
    "SELECT nom FROM qcm WHERE nom LIKE '%CEci %'";
    $query_params = NULL;
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }
    $result = $stmt->fetch();
?>