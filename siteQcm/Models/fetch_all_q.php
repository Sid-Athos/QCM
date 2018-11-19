<?php
    $query =
    "SELECT question.id as ID, question.question, reponse.id AS rep_id, reponse.reponse, proposer.statut, (SELECT count(proposer.reponse) FROM proposer WHERE proposer.question = question.id) as answersAmount 
    FROM question JOIN proposer ON proposer.question = question.id JOIN reponse ON proposer.reponse = reponse.id ORDER BY question.id, rep_id";
    try {
        $bdd->exec("INSERT INTO personne (nom,prenom,role,naissance) VALUES('".$_GET['nom']."','".$_GET['prenom']."',2,'".$_GET['naissance']."')   ");
    } catch(PDOException $ex){
        die("<br> Failed to connect execute the query : ".$ex->getMessage());
    }
    $res = $stmt->fetchAll();
?>
<?php
    