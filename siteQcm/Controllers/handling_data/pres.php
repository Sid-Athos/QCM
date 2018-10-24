<?php 


include 'Views/template/nav.php';

 switch($_GET['page']):
    case 'pres_p';
        include 'Views/template/pres_p.html';
        break;
    case 'pres_e';
        include 'Views/template/pres_e.html';
        break;
          endswitch;

?>
