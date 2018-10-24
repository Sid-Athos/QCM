<h4>Questions existantes : </h4><br>
<?php
    if(isset($res)){
        for($i = 0; $i < count($res);$i++){
            echo "<bold style='font-weight:600;color:#525252'>Question ".($res[$i]['id'])." : </bold><span>";
            if(!empty($res)){
                foreach($res[$i] as $key => $value){
                    switch($key):
                        case'question':
                                echo " $value </span> ";
                            break;
                        case'reponse':
                                echo "<bold>Réponse :</bold> <span> $value </span> ";
                            break;
                        case'statut':
                                echo " <bold>Statut de la réponse :</bold> <span> $value </span><br>";
                            break;
                        default:
                    endswitch;
                } 
            }
        }
    }
            if(empty($res)) {
                echo '</span><bold>Aucune question liée à ce QCM</bold><br>';
            }
?>