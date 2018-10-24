<?php
    $query[0] =
    "DELETE 
    FROM reponse 
    WHERE id = :a";

    $query[1] =
    "DELETE 
    FROM proposer
    WHERE proposer.reponse = :id";

    try {
        $stmt = $db -> prepare($query[0]);
        $results = $stmt -> execute(array(":a" =>$q_id));
        unset($stmt);
        $stmt = $db -> prepare($query[1]);
        $results = $stmt -> execute(array(":id" => $q_id));
    } catch(PDOException $ex){
        die("<br> Failed to connect execute the query : ".$ex->getMessage());
    }
?>