<?php
	session_start();
	unset($_SESSION["logged_in"]);
	unset($_SESSION["email"]);
	unset($_SESSION["username"]);
	header("Location:login.php");
?>