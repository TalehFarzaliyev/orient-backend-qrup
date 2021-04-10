<?php
$name 	 = 'Taleh';
$surname = 'Farzaliyev';

function sum($a,$b)
{
	$c = $a+$b;
	echo $c;
}

function sum2($a,$b)
{
	return $a+$b;
}

function sayHello()
{
	echo "Salam ". $GLOBALS['name']." ". $GLOBALS['surname'];
}

sum(1,2);
echo "<br>";
//echo sum2(1,2);
sayHello();


?>