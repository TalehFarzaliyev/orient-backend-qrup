<?php
if(isset($_GET['news']) and !empty($_GET['news']))
{
	include 'admin/config/config.php';

  	$id = intval($_GET['news']);
  	
  	$sql= "SELECT * FROM `news` WHERE `id`='$id'"; //bu sorgu xeberin icine girende xeberin datasin getirsin deye
  	
  	$query = mysqli_query($conn,$sql);

  	$news_data = mysqli_fetch_array($query,MYSQLI_ASSOC);
 	echo "<pre>"; print_r($news_data); 
 	$hit = $news_data['hit']+1;

  	$sql_2 = "UPDATE `news` SET `hit`='$hit' WHERE `id`='$id'";
  	$query2 = mysqli_query($conn,$sql_2);
}

?>