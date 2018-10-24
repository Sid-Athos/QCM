<?php
    $query =
    "SELECT AVG(passer.note) as Moyenne, users.pseudo, users.pic
    FROM passer
    JOIN users ON users.id = passer.user
    GROUP BY passer.user 
    ORDER BY Moyenne DESC LIMIT 5";

    try {
        $stmt = $db -> prepare($query);
        $stmt -> execute(NULL);
    } catch (PDOException $ex) {
        die("Failed to run the query : ".$ex->getMessage());
    }
    $res0 = $stmt -> fetchAll();

    $query =
    "SELECT passer.note, users.pseudo, users.pic
    FROM passer
    JOIN users ON users.id = passer.user
    ORDER BY passer.note DESC LIMIT 5";

    try {
        $stmt = $db -> prepare($query);
        $stmt -> execute(NULL);
    } catch (PDOException $ex) {
        die("Failed to run the query : ".$ex->getMessage());
    }
    $res1 = $stmt -> fetchAll();

    $query =
    "SELECT AVG(passer.note) as Moyenne, qcm.nom
    FROM passer
    JOIN qcm ON qcm.ID = passer.QCM
    GROUP BY passer.qcm
    ORDER BY passer.note DESC LIMIT 5";

    try {
        $stmt = $db -> prepare($query);
        $stmt -> execute(NULL);
    } catch (PDOException $ex) {
        die("Failed to run the query : ".$ex->getMessage());
    }
    $res2 = $stmt -> fetchAll();
?>