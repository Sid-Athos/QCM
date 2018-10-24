<?php
    include('./Models/db_connect.php');
    include('./Controllers/functions/PHP/messages.php');
    switch(isset($_POST)):
        // L'utilisateur tente de s'authentifier
        case(isset($_POST['login'])):
                $email = HTMLSPECIALCHARS($_POST['mail']);
                $pw = HTMLSPECIALCHARS($_POST['pw']);
                include('./Models/log_check.php');
                $answer = log_check($db,$email,$pw);
                if(isset($answer['ID'])){
                    $_SESSION['ID'] = $answer['ID'];
                    $_SESSION['status'] = $answer['status'];
                    $_SESSION['pic'] = $answer['pic'];
                    $_SESSION['pseudo'] = $answer['pseudo'];
                    $res = "Authentification réussie. Vous 
                    allez être redirigé vers l'accueil membres.";
                    $message = success($res);
                    header('refresh:5;url=./index.php?page=lobby');
                } else {
                    $res = "Ce compte n'est pas reconnu. 
                    Êtes vous certains d'avoir saisi les bonnes
                    informations?";
                    $message = alert($res);
                }
                include('./Views/login.php');
            break;
            // Default behavior
        default:
        include('./Views/login.php');
    endswitch;
    include('./Views/message.php');
?>