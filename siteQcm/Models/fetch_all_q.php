<?php
    $query =
    "SELECT question.id as ID, question.question, reponse.id AS rep_id, reponse.reponse, proposer.statut, (SELECT count(proposer.reponse) FROM proposer WHERE proposer.question = question.id) as answersAmount 
    FROM question JOIN proposer ON proposer.question = question.id JOIN reponse ON proposer.reponse = reponse.id ORDER BY question.id, rep_id";

    try {
        $stmt = $db -> prepare($query);
        $results = $stmt -> execute(NULL);
    } catch(PDOException $ex){
        die("<br> Failed to connect execute the query : ".$ex->getMessage());
    }
    $res = $stmt->fetchAll();
?>