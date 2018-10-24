<?php 
require('Controllers/handling_data/check_data_to_register.php');
//$i = inscription($_GET['pseudo'], $_GET['password']);

//$truc = isset($_GET['uname']) ? $_GET['uname'] : NULL;
include 'Views/template/nav.php';

if(!isset($_GET['uname']) || !isset($_GET['psw']) || !isset($_GET['mail']) ) {
	include 'Views/register.html';
} else {
	if(inscription($_GET['uname'], $_GET['psw'], $_GET['mail']) == 0) {
			echo "<center>Bravo</center>";
			header("Refresh:3;url='index.php?page=login'");
	}else{
		include 'Views/register.html';
		if(inscription($_GET['uname'], $_GET['psw'], $_GET['mail']) == 1) {
		} else if(inscription($_GET['uname'], $_GET['psw'], $_GET['mail']) == 2) {
			echo "<center>Les champs ont mal été rempli</center>";

		} else if(inscription($_GET['uname'], $_GET['psw'], $_GET['mail']) == 3) {
			echo "<center>Votre Pseudo doit contenir un minimum de 5 caractères</center>";
		} else if(inscription($_GET['uname'], $_GET['psw'], $_GET['mail']) == 4) {
			echo "<center>Votre Pseudo existe déja</center>";
		}
	}	
}

?>