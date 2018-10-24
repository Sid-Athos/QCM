<?php
    $query = 
    "UPDATE users
    SET pseudo = :p
    WHERE id = :id";

    try{
        $stmt = $db -> prepare($query);
        $stmt -> execute(array(":p" => $pseudo,":id" => $_SESSION['ID']));
    } catch (PDOException $ex){
        die("Failed to run the query : ".$ex->getMessage());
    }
?>