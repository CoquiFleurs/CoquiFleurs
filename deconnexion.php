<?php
	session_start();
	
	if (isset($_SESSION['zWuppa7kiyut5gIYG54'])) {
		$_SESSION['zWuppa7kiyut5gIYG54'] = array();

		session_destroy();

		header("Location: ../index.php");
	}else
	{
		header("Location: ../login.php");
	}

?>