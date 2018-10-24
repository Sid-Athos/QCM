<?php
    $query = 
    "INSERT INTO chapitre
    VALUES(NULL, :titre, NULL, :mat)";

    try {
        $stmt = $db->prepare($query);
        $stmt->execute(array(":titre" => $chap,":mat" => $s));
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }
?>