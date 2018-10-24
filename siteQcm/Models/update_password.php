<?php
    $query = 
    "UPDATE users
    SET pw = :pw
    WHERE id = :id";

    try{
        $stmt = $db -> prepare($query);
        $stmt -> execute(array(":pw" => $pw,":id" => $_SESSION['ID']));
    } catch (PDOException $ex){
        die("Failed to run the query : ".$ex->getMessage());
    }
?>