<?php
	session_start();
	
	if (isset($_SESSION['idsession'])) {
		$_SESSION['idsession'] = array();

		session_destroy();

		header("Location: index.php");
	}else
	{
		header("Location: login.php");
	}

?>