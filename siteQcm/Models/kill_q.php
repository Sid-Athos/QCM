<?php
    $query[0] = 
    "DELETE 
    FROM appartenir
    WHERE appartenir.question = :q";
    $query[1] = 
    "DELETE 
    FROM proposer
    WHERE proposer.question = :q";

    $query[2] = 
    "DELETE 
    FROM question
    WHERE question.id = :q";

    for($i = 0; $i < count($query);$i++)
    {
        try {
            $stmt = $db -> prepare($query[$i]);
            $res = $stmt -> execute(array(":q" => $q));
        } catch (PDOException $ex){
            die("Failed to run query : ".$ex->getMessage());
        }
    }
    unset($query);
?>