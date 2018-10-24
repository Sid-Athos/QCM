<?php
    function fetch_qcm_q($db,$qcm){
        $query = 
        "SELECT question.id, question.question, reponse.reponse, proposer.statut 
        FROM QCM 
        JOIN appartenir ON appartenir.QCM = qcm.ID 
        JOIN question ON appartenir.question = question.id 
        JOIN proposer ON proposer.question = question.id 
        JOIN reponse ON reponse.id = proposer.reponse
        WHERE qcm.nom like :n
        GROUP BY question.question";
    
        try {
            $stmt = $db -> prepare($query);
            $results = $stmt -> execute(array(":n" => $qcm));
        } catch(PDOException $ex){
            die("<br> Failed to connect execute the query : ".$ex->getMessage());
        }
    
        $res = $stmt->fetchAll();
        return $res;
    }
?>