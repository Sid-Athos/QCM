<?php
    $query =
    "INSERT INTO reponse(id, reponse, rmq)
    VALUES(NULL, :a, NULL)";


    $query_params = 
    array(
        ":a" => $a 
    );

    try {
        $stmt = $db -> prepare($query);
        $res = $stmt -> execute($query_params);
    } catch(PDOException $ex) {
        die("Failed to run the query".$ex->getMessage());
    }
    $a = $db->lastInsertId();
    $query =
    "INSERT INTO proposer(id, question, reponse, statut)
    VALUES(NULL, :q, :a, :s)";

    $query_params = 
    array(
        ":q" => $q,
        ":a" => $a,
        ":s" => $s
    );

    try {
        $stmt = $db -> prepare($query);
        $res = $stmt -> execute($query_params);
    } catch(PDOException $ex) {
        die("Failed to run the query".$ex->getMessage());
    }
?>