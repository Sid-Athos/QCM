<?php 

if(isset($_POST['act'])) {
	session_unset();
	//session_destroy();
}
require('Controllers/handling_data/check_data_to_login.php');
include 'Views/template/nav.php';



if(!isset($_POST['uname']) || !isset($_POST['psw'])) {
	include 'Views/login.html';

}else{
	echo "wsh";

	if(connect($_POST['uname'], $_POST['psw']) == 3) {
		echo "<center><br><br><br><br><br>Bravo ".$_SESSION['uname']."</center>";
		header("Refresh:3;url='index.php?page=accueil'");
	}else{
		include 'Views/login.html';
		if(connect($_POST['uname'], $_POST['psw']) == 1) {
		} else if(connect($_POST['uname'], $_POST['psw']) == 2) {
			echo "<center>Les champs ont mal été rempli</center>";

		} else if(connect($_POST['uname'], $_POST['psw']) == 3) {
			echo "<center>Votre Pseudo doit contenir un minimum de 5 caractères</center>";
		} else if(connect($_POST['uname'], $_POST['psw']) == 4) {
			echo "<center>Erreur d'entrée pseudo ou mdp</center>";
		}
	}
}

?>