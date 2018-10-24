<?php

    $query = 
    "SELECT count(proposer.reponse) as CountAns
    FROM proposer 
    WHERE proposer.question = 
    ALL(
        SELECT proposer.question 
        FROM proposer 
        WHERE proposer.id = :prop
        )";

    try 
    {
        $stmt = $db->prepare($query);
        $stmt->execute(array(":prop" => $proposition));
    }
    catch (PDOException $ex)
    {
        die("Failed to connect to the database: " . $ex->getMessage());
    }
    $res = $stmt ->fetch();
    $value = intval($res['CountAns']);
    if($value >= 2)
    {
        $query =
        "DELETE
        FROM proposer
        WHERE proposer.id = :prop";
        try 
        {
            $stmt = $db->prepare($query);
            $stmt->execute(array(":prop" => $proposition));
        }
        catch (PDOException $ex)
        {
            die("Failed to connect to the database: " . $ex->getMessage());
        }
        $message = success("Désindéxation réussie");

    }
    unset($value,$res);