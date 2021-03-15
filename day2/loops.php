<?php
$n = 81;
$sum_odd = 0;
$sum_even= 0;


for ($i=0; $i < $n ; $i++) { 
	if($i%2==0)
	{
		$sum_even = $sum_even+$i;	
	}
	else
	{
		$sum_odd = $sum_odd+$i;
	}
}

if ($sum_even>$sum_odd) 
{
	echo "Cut ededler boyukdur!"."<br>";
}
else
{
	echo "Tek ededler boyukdur!"."<br>";
}

echo "Cut ededlerin cemi ->".$sum_even."\n";
echo "Tek ededlerin cemi ->".$sum_odd."\n";

# n-e qeder olan ededlerin icinde tek ve cut olanlari ayri shekilde toplamaq. ve teklerin cemi ile cutlerin cemini muqayise etmek

?>