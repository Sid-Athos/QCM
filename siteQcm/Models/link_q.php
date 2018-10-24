<?php
    $query = 
    "INSERT INTO appartenir(id, QCM, question)
    VALUES(NULL, :qcm, :q)";

    $query_params = 
    array(":qcm" => $qcm,
          ":q" => $q_id);
    
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }  
?>