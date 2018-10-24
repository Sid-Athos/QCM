<?php
    include('./Controllers/functions/PHP/session_check.php');    
    include('./Models/db_connect.php');
    include('./Models/account.php');
    include('./Controllers/functions/PHP/messages.php');
    
    switch(isset($_POST)):
        case(isset($_POST['mod_account'])):
                if(isset($_POST['mod_mail'])){
                    $pattern = "/^[0-9a-zA-Z]{3,25}@{1}[a-z]{2,5}.[a-z]{2,4}$/";
                    if(preg_match($pattern,$_POST['email'])){
                        $mail = htmlspecialchars($_POST['email']);
                        include('./Models/update_mail.php');
                        $message = success("Mail modifié. Votre nouveau mail est $mail !");
                    }
                }
                if(isset($_POST['mod_pw'])){
                    $pattern = "/^[a-zA-Z0-9\_\-]{0,}$/";
                    if(preg_match($pattern,$_POST['new_pw']) && $_POST['new_pw'] == $_POST['c_pw']){
                        $pw = htmlspecialchars($_POST['new_pw']);
                        include('./Models/update_password.php');
                        $message = success("Modifications effectuées, votre nouveau password est $pw");
                    }
                }
                if(isset($_POST['mod_ps'])){
                    $pattern = "/^[0-9a-zA-Z-_]+$/";
                    if(preg_match($pattern,$_POST['pseudo'])){
                        $pseudo = htmlspecialchars($_POST['pseudo']);
                        include('./Models/update_pseudo.php');
                        $message = success("Modifications effectuées, votre nouveau pseudo est $pseudo!");
                        $_SESSION['pseudo'] = $pseudo;
                    }
                }
                if(isset($_POST['add_pic'])){
                    $pattern = "%.jpg$%";
                    $pattern1 = "%.png$%";
                    if(preg_match($pattern,$_FILES['img_up']['name']) || preg_match($pattern1,$_FILES['img_up']['name'])){
                        if(!is_dir('./pics/')){
                            mkdir('./pics/');
                            /** Path pour l'upload */
                        }
                        $dir='./pics/';
                        $cover_path=$dir.basename($_FILES['img_up']['name']);
                        move_uploaded_file($_FILES['img_up']['tmp_name'],$cover_path);
                        include('./Models/update_pic.php');
                        $message = success("Modifications effectuées");
                    }
                }
                if($_SESSION['status'] === "t"){
                    include('./Views/navbar.php');                
                } else {
                    include('./Views/navbar_s.php');                
                }
                unset($pattern);
            break;
        default:
        if($_SESSION['status'] === "t"){
            include('./Views/navbar.php');                
        } else {
            include('./Views/navbar_s.php');                
        }
            include('./Views/account_form.php');
    endswitch;
    if($_SESSION['status'] === "t")
    {
        include('./Models/work_bitch.php');
            if(!empty($res)){
                if(intval($res[0]['qcmAmount']) === intval($res[0]['passerAmount'])){
                    echo "<script> alert('Tous les QCM ont été passés. Work bitch.');</script>";
                }
            }
    }
    include('./Views/message.php');
?>