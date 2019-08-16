<?php
	session_start ();
	session_destroy();
	$_SESSION['user_logedin'] = false;
	
	header('location: index.php');
	
	
?>
