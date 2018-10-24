<?php
    $query = 
    "SELECT id, question
    FROM question";

    try{
        $stmt = $db-> prepare($query);
        $results = $stmt -> execute(NULL);
    } catch(PDOException $ex){
        die("Failed to run query ".$ex->getMessage());
    }

    $res = $stmt -> fetchAll();
?>