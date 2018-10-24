<?
    $query = 
    "SELECT DISTINCT users.pseudo 
    FROM users 
    LEFT JOIN passer 
    ON passer.user = users.id 
    LEFT JOIN QCM 
    ON passer.QCM = qcm.ID 
    WHERE passer.note 
    IS NULL";
?>