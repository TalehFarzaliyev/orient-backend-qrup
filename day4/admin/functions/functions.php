<?php

function uploadImage($fileInput = array())
{
	$file_name  = $fileInput['name'];
    $file_size  = $fileInput['size'];
    $file_tmp   = $fileInput['tmp_name'];
    $file_type  = $fileInput['type'];

    if(move_uploaded_file($file_tmp,"../uploads/".$file_name))
    	return true;
	
	return false;
}

?>