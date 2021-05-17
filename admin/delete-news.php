<?php

if(isset($_GET['news']) and !empty($_GET['news']))
{
	include 'config/config.php';

  	$news = intval($_GET['news']);
  
    $sql      = "DELETE FROM `news` WHERE `id`='$news'";
    if(mysqli_query($conn,$sql))
    {
    	header('Location: list-xeberler.php');
    }
    else
    {
        header('Location: list-xeberler.php');
    }
}

?>