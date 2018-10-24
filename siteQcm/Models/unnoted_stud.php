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

SELECT * FROM qcm LEFT JOIN passer on passer.QCM = qcm.id LEFT JOIN users ON passer.user = users.id

(SELECT question.question as Q, reponse.reponse, proposer.statut 
FROM appartenir 
JOIN qcm ON appartenir.qcm = qcm.ID 
JOIN question ON appartenir.question = question.id 
JOIN proposer ON proposer.question = question.id 
JOIN reponse ON reponse.id = proposer.reponse 
WHERE proposer.statut = 'bonne' LIMIT 3) 
UNION 
(SELECT question.question as Q, reponse.reponse, proposer.statut 
FROM appartenir 
JOIN qcm ON appartenir.qcm = qcm.ID 
JOIN question ON appartenir.question = question.id 
JOIN proposer ON proposer.question = question.id 
JOIN reponse ON reponse.id = proposer.reponse 
WHERE proposer.statut = 'fausse' LIMIT 10) 
ORDER BY q, RAND()