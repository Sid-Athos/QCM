<?php
    $query =
    "SELECT proposer.id as ID, question.question as question,reponse.id as rep_id, reponse.reponse as reponse, proposer.statut,
    (SELECT count(proposer.reponse) FROM proposer WHERE proposer.question = question.id) as answersAmount
    FROM proposer JOIN question ON proposer.question = question.id 
    JOIN reponse ON proposer.reponse = reponse.id 
    WHERE proposer.question = 
    ANY(
        SELECT proposer.question 
        FROM proposer 
        GROUP BY proposer.question 
        HAVING count(proposer.question) > 1
        )";

    try 
    {
        $stmt = $db->prepare($query);
        $stmt->execute(NULL);
    }
    catch (PDOException $ex)
    {
        die("Failed to connect to the database: " . $ex->getMessage());
    }
    $res = $stmt ->fetchAll();
?>