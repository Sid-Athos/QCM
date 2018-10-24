<?php
session_start();

function connect ($POST) {
	require_once('Models/search_pseudo.php');

	if(!isset($_POST['uname']) || !isset($_POST['psw']) ) {
		return 0;
	} else if(empty($_POST['uname']) ) {
		return 1;
	} else if(empty($_POST['psw']) ) {
		return 2;
	} else {
		$donnees = search_pseudo($_POST['uname'], $_POST['psw']);
		if($donnees['pseudo'] == $_POST['uname'] && $donnees['psw'] == $_POST['psw']) {
			$_SESSION['uname'] = $donnees['pseudo'];
			$_SESSION['id'] = $donnees['id'];
			$_SESSION['compte'] = $donnees['compte'];
			return 3;
		} else {
			return 4;
		}
	}
}
?>