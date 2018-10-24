<?php
    $query = 
    "INSERT INTO matiere(id, nom) 
    VALUES(NULL, :sub)";

    try{
        $stmt = $db -> prepare($query);
        $stmt -> execute(array(":sub" => $sub));
    } catch(PROException $ex){
        die("Failed to run the query : ".$ex->getMessage());
    }
?>