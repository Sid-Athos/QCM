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
    $qcm = $res[0]['id'];
    
    $query = 
    "SELECT question.id as ID, question.question, reponse.id AS rep_id, reponse.reponse, proposer.statut, 
    (SELECT count(proposer.reponse) FROM proposer WHERE proposer.question = question.id) as answersAmount 
    FROM question 
    JOIN proposer on question.id = proposer.question 
    JOIN reponse ON proposer.reponse = reponse.id 
    WHERE question.id != ALL(SELECT question FROM appartenir WHERE qcm = :qcm)";

    $query_params = array(':qcm' => $qcm);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }  
    $res = $stmt -> fetchAll();
?>