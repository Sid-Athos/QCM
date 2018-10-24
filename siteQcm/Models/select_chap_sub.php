<?php
    $query = 
    "SELECT matiere.nom, chapitre.titre 
    FROM matiere 
    JOIN chapitre 
    ON matiere.id = chapitre.matiere
    ORDER BY(matiere.nom)";
?>