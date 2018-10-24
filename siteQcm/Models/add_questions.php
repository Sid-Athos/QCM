<?php

    $query = 
    "SELECT id
    FROM question
    WHERE question LIKE :q";

    $query_params = array(':q' => $q);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }  
    $res = $stmt -> fetchAll();
    $tab['question'] = $res;

    $query = 
    "SELECT id
    FROM reponse
    WHERE reponse LIKE :a";

    $query_params = array(':a' => $a);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }  
    $res = $stmt -> fetchAll();
    $tab['answer'] = $res;
    if(empty($tab['answer'][0]['id']) && empty($tab['question'][0]['id'])){
        $query = 
        "INSERT INTO question(ID, question, rmq) 
        VALUES(NULL, :q, NULL)";
    
        $query_params = array(":q" => $q);
    
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        }  
    
        $id_q = $db->lastInsertId();
    
        $query =
        "INSERT INTO appartenir(id, QCM, question,rmq)
        VALUES(NULL,:qcm, :q, NULL)";
    
        $query_params = array(":qcm" => $_SESSION['qcm'],
                                ":q" => $id_q);
    
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        } 
    
        $query = 
        "INSERT INTO reponse(ID, reponse, rmq)
        VALUES(NULL, :a, NULL)";
    
        $query_params = array(":a" => $a);
    
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        }  
        $id_a = $db->lastInsertId();
    
        $query = 
        "INSERT INTO proposer (ID, question, reponse, statut) 
        VALUES(NULL, :q ,:a, 'bonne')";
    
        $query_params = array(":q"=>$id_q,
                                ":a"=>$id_a);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        }  
    } else if(!empty($tab['answer'][0]['id']) && empty($tab['question'][0]['id'])){
        $query = 
        "INSERT INTO question(ID, question, rmq) 
        VALUES(NULL, :q, NULL)";
    
        $query_params = array(":q" => $q);
    
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        }  
    
        $id_q = $db->lastInsertId();
        
        $query = 
        "INSERT INTO proposer (ID, question, reponse, statut) 
        VALUES(NULL, :q ,:a, 'bonne')";
    
        $query_params = array(":q"=>$id_q,
                                ":a"=>$tab['answer'][0]['id']);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        }  
        $query =
        "INSERT INTO appartenir(id, QCM, question,rmq)
        VALUES(NULL,:qcm, :q, NULL)";
    
        $query_params = array(":qcm" => $_SESSION['qcm'],
                                ":q" => $id_q);
    
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        } 
    } else if(empty($tab['answer'][0]['id']) && !empty($tab['question'][0]['id'])){
        $query = 
        "INSERT INTO reponse(ID, reponse, rmq)
        VALUES(NULL, :a, NULL)";
    
        $query_params = array(":a" => $a);
    
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        }  
        $id_a = $db->lastInsertId();

        $query = 
        "INSERT INTO proposer (ID, question, reponse, statut) 
        VALUES(NULL, :q ,:a, 'bonne')";
    
        $query_params = array(":q"=>$tab['question'][0]['id'],
                                ":a"=>$id_a);
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        }  
        $query =
        "INSERT INTO appartenir(id, QCM, question,rmq)
        VALUES(NULL,:qcm, :q, NULL)";
    
        $query_params = array(":qcm" => $_SESSION['qcm'],
                                ":q" => $tab['question'][0]['id']);
    
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        } 
    } else if(!empty($tab['answer'][0]['id']) && !empty($tab['question'][0]['id'])){
        $query =
        "SELECT 1 FROM appartenir
        WHERE qcm = :qcm
        AND question = :q";
    
        $query_params = array(":qcm" => $_SESSION['qcm'],
                                ":q" => $tab['question'][0]['id']);
        
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        } 
        $res = $stmt -> fetchAll();

        if(empty($res)){
            $query =
            "INSERT INTO appartenir(id, QCM, question,rmq)
            VALUES(NULL,:qcm, :q, NULL)";
        
            $query_params = array(":qcm" => $_SESSION['qcm'],
                                    ":q" => $tab['question'][0]['id']);
            
            try {
                $stmt = $db->prepare($query);
                $result = $stmt->execute($query_params);
            }   catch (PDOException $ex){
                die("Failed to connect to the database: " . $ex->getMessage());
            } 
        }
    }
/**SELECT * FROM appartenir JOIN qcm ON appartenir.QCM = QCM.ID 
JOIN question ON question.id = appartenir.question 
JOIN proposer on proposer.question = appartenir.question 
JOIN reponse ON reponse.id = proposer.reponse */
/** SELECT question.question, reponse.reponse, proposer.statut FROM QCM JOIN appartenir on qcm.id = appartenir.qcm JOIN question ON appartenir.question = question.id JOINproposer ON proposer.question = appartenir.question JOIN reponse ON reponse.id = proposer.id */
?>