<?php

function calculate_average ($SESSION) {

	echo "<div style='margin-left:450px;margin-top:-27px;margin-top:61px' >";
	$b = 0;
	$a = 0;
	$u = 0;
	$s = 0;
	foreach ($_SESSION['rep'] as $key => $value) {
		
		if(isset($_GET['R'.$_SESSION['rep'][$a]]) ) {
			if($_GET['R'.$_SESSION['rep'][$a]] == 'erreur') {

				$u++;
			}

			if($_GET['R'.$_SESSION['rep'][$a]] == 'correct') {

				$b++;
			}	
		}
		$a++;
	}
	$s = $u+$b;
	$res_final = ($b / $_GET['nbquestions']) *100;
	echo "<h1>res= ".$res_final."%</h1></div>";
	return $res_final;

}