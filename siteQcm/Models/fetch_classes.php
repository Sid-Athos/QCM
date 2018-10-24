<?php
    $query = 
    "SELECT id, nom
    FROM matiere";

    try {
        $stmt = $db->prepare($query);
        $stmt->execute(NULL);
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }
    $result = $stmt->fetchAll();
?>