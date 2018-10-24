<?php
    $query = 
    "INSERT INTO qcm(ID, nom, chapitre) 
    VALUES(NULL, :nom, (SELECT chapitre.id FROM chapitre JOIN matiere on chapitre.matiere = matiere.id WHERE chapitre.titre = :chap AND matiere.nom = :mat))";
    
    $query_params = array(":nom" => $qc_name,
                           ":chap" => $chap[1],
                            ":mat" => $chap[0]);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        $mess = "Success!";
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }
    $id = $db->lastInsertId();
?>