<?php  
    include('./Controllers/functions/PHP/session_check.php');
    include('./Models/db_connect.php');
    include('./Controllers/functions/PHP/messages.php');
    include('./Views/navbar.php');
    var_dump($_POST);
    switch(isset($_POST)):
        case(isset($_POST['choice'])):
                switch($_POST['choice']):
                    case'add':
                            include('./Models/fetch_subjects.php');
                            include('./Views/add_qcm.php');
                        break;
                    case'q_add':
                            include('./Models/fetch_qcm.php');
                            include('./Views/qcm_to_mod.php');
                        break;
                    case'a_mod':
                            include('./Models/fetch_all_q.php');
                            include('./Views/answer_form.php');
                        break;
                    case'a_add':
                            include('./Models/fetch_qcm.php');
                            if(!empty($results)){
                                $qcm = $results[0]['nom'];
                                include('./Models/fetch_qcm_q.php');
                                $res = fetch_qcm_q($db,$qcm);
                                include('./Views/add_answers.php');
                            } else {
                                $message = alert("Aucun QCM à afficher");
                                echo "<script>alert('Au charbon monsier, il faut créer des QCM là'); </script>";
                            }
                        break;
                    case'a_del':
                            if(isset($_SESSION['qcm'])){
                                unset($_SESSION['qcm']);
                            }
                            include('./Models/fetch_distinct_a.php');    
                            include('./Views/delete_a_form.php');
                        break;
                    case'q_del':
                            include('./Models/fetch_distinct_q.php');
                            include('./Views/delete_q_form.php');
                            include('./Models/fetch_qcm.php');
                        break;
                    case'mod':
                            include('./Models/fetch_qcm.php');
                            include('./Views/unlink_qcm_q.php');
                        break;
                    case'qcm_del':
                            include('./Models/fetch_qcm.php'); 
                            include('./Views/kill_qcm.php');
                        break;
                    case's_add':
                            include('./Views/add_subject.php');
                        break;
                    case'c_add':
                            include('./Models/fetch_classes.php');
                            include('./Views/add_chapter.php');
                        break;
                    case'unlink_a':
                        include('./Models/fetch_linked_q.php');
                        include('./Views/unlink_a.php');
                    break;
                    default:
                        include('./errors/errors/404.php');
                endswitch;
            break;
        case(isset($_POST['unlink_ans'])):
                    for($i = 0;$i < count($_POST['unlink_ans']);$i++)
                    {
                        $proposition = intval(htmlspecialchars($_POST['unlink_ans'][$i]));
                        include('./Models/unlink_ans.php');
                    }
                    include('./Views/teacher_choice.php');
                break;
        case(isset($_POST['new_sub'])):
                    $sub = htmlspecialchars($_POST['subject']);
                    include('./Models/new_sub.php');
                    $message = success("Matière ajoutée!");
                break;
        case(isset($_POST['qc_name'])):
                $chap = explode("-",$_POST['sub_chap']);
                $amount = intval($_POST['qc_amount']);
                if($amount >= 1){
                    $qc_name = htmlspecialchars($_POST['qc_name']);
                    include('./Models/check_qcm.php');
                    if(empty($res[0])){
                        include('./Models/add_qcm.php');
                        if(isset($id)){
                            $_SESSION['qcm'] = $id;
                        }
                        include('./Views/add_questions.php');
                        $message = success("QCM Créé");
                    } else {
                        $message = alert("Ce QCM existe déjà!");
                    }
                } else {
                    $message = alert("Il faut saisir au moins une question!");
                }
            break;
        case(isset($_POST['q_unlink'])):
                    $qcm = htmlspecialchars($_POST['qcm_choice']);
                    include('./Models/fetch_qcm_id.php');
                    unset($res);
                    if(isset($_POST['unlink']))
                    {
                        for($i = 0; $i < count($_POST['unlink']);$i++)
                        {
                            $q = htmlspecialchars($_POST['unlink'][$i]);
                            include('./Models/unlink_q.php');
                        }
                    }
                break;
        case(isset($_POST['add_chap'])):
                        $chap = htmlspecialchars($_POST['chap_name']);
                        $s = $_POST['s_link'];
                        include('./Models/add_chap.php');
                        $message = success("Chapitre ajouté et lié");
                    break;
        case(isset($_POST['new_q'])):
                $qcm_check = htmlspecialchars($_POST['qcm_choice']);
                for($i = 0; $i < count($_POST['question']);$i++){
                    $q = htmlspecialchars($_POST['question'][$i]);
                    if(isset($_POST['answer'])){
                        $a = htmlspecialchars($_POST['answer'][$i]);
                        include('./Models/add_questions_to_qcm.php');
                        $message = success("Vos questions ont bien été ajoutées.");
                    }
                }
            break;
            case(isset($_POST['new_a'])):
                    if(isset($_POST['question']) && isset($_POST['answer'])){
                        $q = intval(htmlspecialchars($_POST['question']));
                        for($i = 0; $i < count($_POST['answer']);$i++){
                            $a = htmlspecialchars($_POST['answer'][$i]);
                            $s = htmlspecialchars($_POST['status'][$i]);
                            include('./Models/add_ans_to_q.php');
                        }
                        $message = success("Vos questions ont bien été ajoutées.");
                        
                    } else {
                        $message = alert("Aucune question sélectionnée ou existante");
                        header('refresh:5;url=./index.php?page=lobby');
                        $_POST['choice'] = 'new_q';
                    }
                break;
        case(isset($_POST['kill_a'])):
                    if(isset($_POST['question'])){
                        for($i = 0; $i < count($_POST['question']);$i++){
                            if (isset($_POST[$i])){
                                $q_id = htmlspecialchars($_POST[$i]);
                                include('./Models/kill_a.php');
                                $message = success("Réponse supprimée");
                            }
                        }
                    }
                break;
        case(isset($_POST['kill_q'])):
                        if(isset($_POST['kill'])){
                            for($j = 0; $j < count($_POST['kill']);$j++){
                                if(isset($_POST['check'])){
                                    if(isset($_POST['kill'][$j])){
                                        $q = htmlspecialchars($_POST['kill'][$j]);
                                        include('./Models/kill_q.php');
                                        $message = success("Question supprimée");
                                    }
                                }
                            }
                        }
                        
                break;
        case(isset($_POST['mod_q_a'])):
                    /** FIRE IN THE HOLE */
                    if(isset($_POST['question'])){
                        for($i = 0; $i < count($_POST['question']);$i++){
                            for($j = 0; $j < count($_POST['answer'][$i]);$j++){
                                $a = htmlspecialchars($_POST['answer'][$i][$j]);
                                $q = htmlspecialchars($_POST['question'][$i]);
                                $s = htmlspecialchars($_POST['a_status'][$i][$j]);
                                $q_id = intval(htmlspecialchars($_POST['q_id'][$i]));
                                $a_id = intval(htmlspecialchars($_POST['a_id'][$i][$j]));
                                include('./Models/update_q_a.php');
                            }
                        }
                        if(!isset($message))
                        {
                            $message = success("Questions/réponses modifiées!");
                        }
                    }
                break;
        case(isset($_POST['link_q'])):
                        $qcm = htmlspecialchars($_POST['qcm_choice']);
                        include('./Models/fetch_unlinked_q.php');
                        include('./Views/link_q.php');
                        $_SESSION['qcm'] = $qcm;
                    break;
        case(isset($_POST['q_to_link'])):
                        include('./Views/teacher_choice.php');
                        for($i = 0; $i < count($_POST['question']);$i++){
                            if (isset($_POST['add'][$i])){
                                $qcm = $_SESSION['qcm'];
                                $q_id = intval(htmlspecialchars($_POST['q_id'][$i]));
                                include('./Models/link_q.php');
                            }
                        }
                        unset($_SESSION['qcm']);
                        $message = success("Questions/réponses modifiées!");
                    break;
        case(isset($_POST['Enregistrer'])):
                for($i = 0; $i < count($_POST['question']);$i++){
                    $q = htmlspecialchars($_POST['question'][$i]);
                    $a = htmlspecialchars($_POST['answer'][$i]);
                    include('./Models/add_questions.php');
                }
               // header('refresh:5;url=./index.php?page=lobby');
                $message = success("Vos questions ont bien été ajoutées.");
            break;
        case(isset($_POST['kill_qcm'])):
                if(isset($_POST['check']) && isset($_POST['qcm_kill'])){
                    for($i = 0;$i < count($_POST['qcm_kill']);$i++){
                        if(isset($_POST['qcm_kill'][$i])){
                            $qcm = htmlspecialchars($_POST['qcm_kill'][$i]);
                            include('./Models/kill_qcm.php');
                        }
                    }
                }
            break;
        default:
    endswitch;
    if(!isset($_POST['choice']) || $_POST['choice'] !== "add"){
        include('./Models/fetch_qcm.php');
        if(empty($results)){
            $message = alert("Aucun QCM à afficher");
            echo "<script>alert('Il faut charbonner, y a pas de QCM!');</script>";
        } 
        include('./Models/work_bitch.php');
        if(!empty($res)){
            if(intval($res[0]['qcmAmount']) === intval($res[0]['passerAmount'])){
                echo "<script> alert('Tous les QCM ont été passés. Work bitch.');</script>";
            }
        }
    }
    include('./Views/teacher_choice.php');
    include('./Views/message.php');
?>
