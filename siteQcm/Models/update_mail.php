<?php
    $query = 
    "UPDATE users
    SET email = :m
    WHERE id = :id";

    try{
        $stmt = $db -> prepare($query);
        $stmt -> execute(array(":m" => $mail,":id" => $_SESSION['ID']));
    } catch (PDOException $ex){
        die("Failed to run the query : ".$ex->getMessage());
    }
?>