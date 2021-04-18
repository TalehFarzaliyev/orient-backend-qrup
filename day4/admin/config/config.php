<?php
	$host = '127.0.0.1';
	$user = 'root';
	$pass = '';
	$db   = 'orient_test';

	$conn = mysqli_connect($host, $user, $pass, $db);

	if(!$conn)
	{
		echo "Disconnected";
	}

?>