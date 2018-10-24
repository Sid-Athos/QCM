<?php
    $query = 
    "SELECT qcm.ID, qcm.nom as QCM, chapitre.titre as Chapitre, matiere.nom as Matiere
    FROM qcm JOIN chapitre ON chapitre.id = qcm.chapitre 
    JOIN matiere ON matiere.id = chapitre.matiere 
    WHERE qcm.id != ALL(SELECT passer.qcm FROM passer WHERE passer.user = :user)";

    try {
        $stmt = $db->prepare($query);
        $stmt->execute(array(":user" => $_SESSION['ID']));
    }   catch (PDOException $ex){
        die("Failed to connect to the database: " . $ex->getMessage());
    }
    $result = $stmt->fetchAll();
?>