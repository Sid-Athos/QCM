<?php
    include('./Controllers/functions/PHP/session_check.php');
    include('./Models/db_connect.php');
    include('./Controllers/functions/PHP/messages.php');
    
    switch(isset($_POST)):
        case(isset($_POST['go'])):
                $qcm = intval(htmlspecialchars($_POST['choose_qcm']));
                include('./Models/fetch_qcm_q_a.php');
                include('./Views/pass_qcm.php');
            break;
        case(isset($_POST['validate'])):
                if(isset($_POST['val']))
                {
                    if(isset($_POST['question']))
                    {
                        $qcm = intval(htmlspecialchars($_POST['qcm']));
                        $compteur = 0;
                        for($i = 0; $i < count($_POST['question']);$i++)
                        {
                            if(isset($_POST["question$i"]) && $_POST["question$i"] === "correct")
                            {
                                $compteur++;
                            }
                        }
                        $grade = round(($compteur/(count($_POST['question'])))*20);
                        include('./Models/insert_grade.php');
                        $message = success("Votre passage a bien été enregistré, votre notre est $grade.");
                    }
                }
                include('./Views/navbar_s.php');
            break;
        default:
            include('./Views/navbar_s.php');
            include('./Models/fetch_undone_qcm.php');
            include('./Views/select_qcm_to_do.php');
    endswitch;
    include('./Views/message.php');
?>