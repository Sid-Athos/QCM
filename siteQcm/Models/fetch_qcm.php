<?php
    $query = 
    "SELECT nom, id
    FROM qcm";

        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute(NULL);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        }  

    $results = $stmt -> fetchAll();
?>