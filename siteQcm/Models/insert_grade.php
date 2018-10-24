<?php
    $query = 
    "SELECT 1 
    FROM passer 
    WHERE user = :user 
    AND qcm = :qcm";

    try {
        $stmt = $db -> prepare($query);
        $stmt -> execute(array(":user" => $_SESSION['ID'], ":qcm" => $qcm));
    } catch (PDOException $ex){
        die("Failed to run the query : ".$ex -> getMessage());
    }
    $res = $stmt -> fetchAll();

    if(empty($res)){
        $query =
        "INSERT INTO passer(id, user, QCM, dtPassage, note, rmq)
        VALUES(NULL, :us, :qcm, CURRENT_TIMESTAMP(), :grade, NULL)";

        try {
            $stmt = $db->prepare($query);
            $stmt->execute(array(":us" => $_SESSION['ID'],":qcm" => $qcm, ":grade" => $grade));
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        }
    }
//oaken.sarl@gmail.com, drive avec les documents,cdc, Git, MCD (insert/create.sql), cas d'utilisation, analyse fonctionnelle
// Analyse fonctionnelle, logo cdc => obj/besoins/dates ité
?>
