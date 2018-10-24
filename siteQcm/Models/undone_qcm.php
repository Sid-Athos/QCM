<?php
    $query =
    "SELECT DISTINCT users.pseudo, qcm.nom 
    FROM users 
    RIGHT JOIN passer 
    ON passer.user = users.id 
    RIGHT JOIN QCM 
    ON passer.QCM = qcm.ID";
?>