<?php 


include 'Views/template/nav.php';
include 'Views/home_page.php';
include 'Models/get.php';

$best = get_best_eleve();
home_page($best);

?>
