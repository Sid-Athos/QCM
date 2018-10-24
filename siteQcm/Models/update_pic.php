<?php
    $query = 
    "SELECT pic
    FROM users
    WHERE pic NOT LIKE ''
    AND id = :id";
    try{
        $stmt = $db -> prepare($query);
        $stmt -> execute(array(":id" => $_SESSION['ID']));
    } catch(PROException $ex){
        die("Failed to run the query : ".$ex->getMessage());
    }
    $res = $stmt -> fetch();
    if($res){
        if(is_link($res['pic'])){
            unlink($res['pic']);
        }
    }
    $query = 
    "UPDATE users
    SET pic = :pic
    WHERE id = :id";
    try{
        $stmt = $db -> prepare($query);
        $stmt -> execute(array("pic" => $cover_path,":id" => $_SESSION['ID']));
    } catch(PROException $ex){
        die("Failed to run the query : ".$ex->getMessage());
    }
    $_SESSION['pic'] = $cover_path;
?>