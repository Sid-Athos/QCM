<?php
    foreach($_SESSION as $key => $value){
        unset($_SESSION[$key]);
    }
    include('./Controllers/functions/PHP/messages.php');
    include('./Views/message.php');
    $message = success("Déconnexion Réussie");
    include('./Views/login.php');
?>