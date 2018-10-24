<?php
        $query = 
        "SELECT qcm.ID as qc_id, qcm.nom as qc_name, question.id as ID, question.question as question, reponse.id AS rep_id, reponse.reponse, proposer.statut, 
        (SELECT count(proposer.reponse) FROM proposer WHERE proposer.question = question.id) as answersAmount 
        FROM appartenir JOIN qcm ON appartenir.qcm = qcm.ID 
        JOIN question ON appartenir.question = question.id 
        JOIN proposer ON proposer.question = question.id 
        JOIN reponse ON reponse.id = proposer.reponse 
        WHERE proposer.statut = 'bonne' AND qcm.id = :qcm 
        UNION 
        SELECT qcm.ID, qcm.nom, question.id as ID, question.question as question, reponse.id AS rep_id, reponse.reponse, proposer.statut, 
        (SELECT count(proposer.reponse) FROM proposer WHERE proposer.question = question.id) as answersAmount 
        FROM appartenir JOIN qcm ON appartenir.qcm = qcm.ID 
        JOIN question ON appartenir.question = question.id 
        JOIN proposer ON proposer.question = question.id 
        JOIN reponse ON reponse.id = proposer.reponse 
        WHERE proposer.statut = 'fausse' AND qcm.id = :q ORDER BY question, RAND()";

        try {
            $stmt = $db -> prepare($query);
            $stmt -> execute(array(":qcm" => $qcm,":q"=> $qcm));
        } catch(PDOException $ex){
            die("<br> Failed to connect execute the query : ".$ex->getMessage());
        }
    
        $res = $stmt->fetchAll();
?>