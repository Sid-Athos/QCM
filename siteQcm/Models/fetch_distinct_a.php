<?php
    $query = 
    "SELECT reponse, id
    FROM reponse";

    try {
        $stmt = $db -> prepare($query);
        $res = $stmt -> execute(NULL);
    } catch(PDOException $ex){
        die("Failed to run query".$ex->getMessage());
    }
    $res = $stmt -> fetchAll();
?>