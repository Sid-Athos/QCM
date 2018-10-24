<?php
    $query =
    "SELECT pseudo, email, pw, pic
    FROM users
    WHERE id = :id";

    try {
        $stmt = $db -> prepare($query);
        $stmt -> execute(array(":id" => $_SESSION['ID']));
    } catch(PDOException $ex) {
        die("Failed to run the query".$ex->getMessage());
    }

    $results = $stmt -> fetch();
?>