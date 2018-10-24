<?php
    $query[0] = 
    "DELETE FROM qcm WHERE ID = :qcm";

    $query[1] = 
    "DELETE FROM appartenir WHERE QCM = :qcm";

    $query[2] = 
    "DELETE FROM passer WHERE QCM = :qcm";
    for($j = 0; $j < count($query);$j++){
        try {
            $stmt = $db -> prepare($query[$j]);
            $res = $stmt -> execute(array(":qcm" => $qcm));
        } catch(PDOException $ex){
            die("Failed to run the query ".$ex->getMessage());
        }
    }
    unset($query);
    unset($qcm);
?>