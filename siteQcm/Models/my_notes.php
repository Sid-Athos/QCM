<?php
    $query = 
    "SELECT qcm.nom as QCM, matiere.nom, chapitre.titre, passer.note, passer.dtPassage
    FROM qcm
    JOIN chapitre on chapitre.id = qcm.chapitre
    JOIN matiere on chapitre.matiere = matiere.id
    JOIN passer on passer.QCM = qcm.ID
    WHERE passer.user = :user ORDER BY dtPassage";

    try {
        $stmt = $db -> prepare($query);
        $stmt -> execute(array(":user" => $_SESSION['ID']));
    } catch (PDOException $ex) {
        die("Failed to run the query : ".$ex->getMessage());
    }
    $res = $stmt -> fetchAll();
?>