<?php
    $query =
    "SELECT count(proposer.statut) as ans_amount
    FROM proposer 
    WHERE proposer.statut = 'bonne'
    AND proposer.question = :a";

    $query_params = 
    array(":a" => $q_id);
    try {
        $stmt = $db -> prepare($query);
        $results = $stmt -> execute($query_params);
    } catch(PDOException $ex){
        die("<br> Failed to connect execute the query : ".$ex->getMessage());
    }
    $res = $stmt -> fetch();
    unset($query);
    $am = intval($res['ans_amount']);
    if($am > 0 || $s === "bonne")
    {
        $query[0] = 
        "UPDATE question
        JOIN proposer ON proposer.question = question.id
        SET question.question = :q 
        WHERE proposer.question = :q_id 
        AND proposer.reponse = :a_id";

        $query[1] = 
        "UPDATE reponse JOIN proposer on proposer.reponse = reponse.id SET reponse.reponse = :answer WHERE proposer.question = :q_id AND proposer.reponse = :a_id";

        $query[2] = 
        "UPDATE proposer SET proposer.statut = :statut WHERE proposer.question = :q_id AND proposer.reponse = :a_id";
        $query_params[0] = 
        array(":q" => $q,
              ":q_id" => intval($q_id),
              ":a_id" => intval($a_id));

        $query_params[1] = 
        array(":answer" => $a,
              ":q_id" => intval($q_id),
              ":a_id" => intval($a_id));

        $query_params[2] = 
        array(":statut" => $s,
              ":q_id" => intval($q_id),
              ":a_id" => intval($a_id));

              for($l = 0; $l <count($query); $l++){
            try {
                $stmt = $db -> prepare($query[$l]);
                $stmt -> execute($query_params[$l]);
            } catch(PDOException $ex){
                die("<br> Failed to connect execute the query : ".$ex->getMessage());
            }
        }
    }
    else 
    {
        $message = alert("Il doit y avoir au moins une bonne 
        réponse afin de valider le qcm. La question $q et la réponse $a 
        n'ont pas été modifié.");
    }
?>