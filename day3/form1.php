<?php

if($_SERVER['REQUEST_METHOD']=='GET')
{
	echo "GET Request Method!";
	if(!empty($_GET)){
	//echo '<br>'.$_GET['name'].' '.$_GET['surname'];
	$ad = $_GET['name'];
	$soyad = $_GET['surname'];
	}
	else{
		$ad = '';
		$soyad = '';
	}
}
else if($_SERVER['REQUEST_METHOD']=='POST')
{
	echo "Post Request Method!"; die();
}


//echo '<br>'.$_POST['name'].' '.$_POST['surname'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form ders 1</title>
</head>
<body>
	<h3>Get Method Form submit</h3><br>
	<form action="" method="get">
	  <label for="fname">First name:</label><br>
	  <input type="text" id="name" name="name" value="<?=$ad;?>"><br>
	  <label for="lname">Last name:</label><br>
	  <input type="text" id="surname" name="surname" value="<?=$soyad;?>">
	  <button type="submit">Send</button>
	</form>

	<h1><?=$ad;?> <?=$soyad;?></h1>
</body>
</html>