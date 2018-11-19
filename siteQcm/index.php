<?php
    session_start();
    var_dump($_POST);
    include('./Views/html_top.php');
    switch(isset($_GET)):
        case(isset($_GET['page'])):
            switch($_GET['page']):
                case($_GET['page'] === 'login'):
                        include('./Controllers/login.php');
                    break;
                case($_GET['page'] === 'lobby'):
                        include('./Controllers/functions/PHP/session_check.php');
                        if(isset($_SESSION['status']) && $_SESSION['status'] === 't'){
                            include('./Controllers/teacher_lobby.php');
                        }
                        if(isset($_SESSION['status']) && $_SESSION['status'] === 's'){
                            include('./Controllers/student_lobby.php');
                        }  
                    break;
                case($_GET['page'] === 'account'):
                        include('./Controllers/functions/PHP/session_check.php');
                        include('./Controllers/account.php');
                    break;
                case($_GET['page'] === 'logout'):
                        include('./Controllers/logout.php');
                    break;
                case($_GET['page'] === 'notes'):
                        if(isset($_SESSION['status']) && $_SESSION['status'] === 's'){                        
                            include('./Controllers/notes.php');
                        }
                    break;
                case($_GET['page'] === 'ladder'):
                        include('./Controllers/ladder.php');
                    break;
                default:
                    include('./errors/errors/404.php');
            endswitch;
            break;
        default:
            include('./Controllers/login.php');
    endswitch;
?>