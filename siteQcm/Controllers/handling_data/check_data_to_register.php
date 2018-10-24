<?php
function inscription ($POST) {

    require_once('Models/insert.php');

    //$truc = isset($_GET['uname']) ? $_GET['unam'] : NULL;

	if(!isset($_GET['uname']) || !isset($_GET['psw'])) {
		return 1;
	} else if(empty($_GET['uname']) || empty($_GET['psw']) || empty($_GET['mail'])) {
		return 2;
	} else if(strlen($_GET['uname']) <= 5 )  {
		return 3;
	} else {
		$datas = array($_GET['uname'],$_GET['psw'], $_GET['compte'], $_GET['mail'] );
		insert_user($datas);
			return 0;
	}
}

?>