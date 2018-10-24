<?php
    $query = 
    "SELECT matiere.nom, chapitre.titre 
    FROM matiere 
    JOIN chapitre ON matiere.id = chapitre.matiere";

    $query_params = NULL;

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }
    $result = $stmt->fetchAll();
?>