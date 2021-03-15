<?php

$my_arr = array(1,"Salam",5,7,9);

echo"<pre>"; print_r($my_arr);

var_dump($my_arr);

echo count($my_arr);

$my_arr2 = ["car_make"=>"BMW","car_model"=>"M5"];
$my_arr2["car_brand"] = "AUDI";

var_dump($my_arr2);

foreach ($my_arr as $key => $value) {
	echo "Key ->".$key."<br>";
	echo "Value ->".$value."<hr>";
}

for ($i=0; $i < count($my_arr); $i++) {
	echo $i."->"; 
	echo $my_arr[$i]."<hr>";
}

# n-e qeder olan ededlerin icinde tek ve cut olanlari ayri shekilde massivlere yazmaq. ve tekler ve cutler olan massivlerin uzunlugunu tapmaq ki n-e qeder ededler icinde neqeder tek var neqeder cut 

?>