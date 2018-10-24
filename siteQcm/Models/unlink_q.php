<?php
    $query = 
    "DELETE 
    FROM appartenir
    WHERE appartenir.qcm = :qcm
    AND appartenir.question = :q";

    $query_params =
    array(
        ":qcm" => $qcm,
        ":q" => $q
    );

    try{
        $stmt = $db -> prepare($query);
        $stmt -> execute($query_params);
    } catch (PDOException $ex){
        die("Failed to run the query : ".$ex->getMessage());
    }
    $message = success('Les questions ne sont plus présentes dans ce qcm');
?>