<?php
    $query = 
    "SELECT 1 
    FROM passer 
    WHERE user = :user 
    AND qcm = :qcm";

    try {
        $stmt = $db -> prepare($query);
        $stmt -> execute(array(":user" => $user, ":qcm" => $qcm));
    } catch (PDOException $ex){
        die("Failed to run the query : ".$ex -> getMessage());
    }
    $res = $stmt -> fetchAll();

    if(empty($res)){
        $query = 
        "INSERT INTO passer(id, user, QCM, dtPassage, note, rmq)
        VALUES(NULL, :user, :qcm, CURRENT_TIMESTAMP(), 0, 'Looser')";

        try {
            $stmt = $db -> prepare($query);
            $stmt -> execute(array(":user" => $user, ":qcm" => $qcm));
        } catch (PDOException $ex){
            die("Failed to run the query : ".$ex -> getMessage());
        }    
    }
    unset($res,$query,$_POST);
?>