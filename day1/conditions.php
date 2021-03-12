<?php
	$a=5;
	$b=6;
	$c=9;

	if($a>$b)
	{
		if($a>$c)
		{
			echo "A en boyukdur";
		}	
	}
	else if($b>$c)
	{
		echo "B en boyukdur";
	}
	else
	{
		echo "C en boyukdur";
	}

	if($a>$b && $a>$c)
		echo "A en boyukdur";
	else if($b>$a && $b>$c)
		echo "B en boyukdur";
	else
		echo "C en boyukdur <br>";

	$a = 764;
	$b = $a%10; //7
	$c = $a/10; //

	echo 'onluq->'.intval($c).' teklik-> '.$b."<br>";

	$a = 764;
	$b = intval($a/100); // -> yuzluk
	$c = intval(($a-($b*100))/10); // -> onluq
	$d = intval($a%10);// -> teklik

	if($b>$c and $b>$d)
		echo "B en boyukdur <br>";
	else if($b<$c and $c>$d)
		echo "C en boyukdur <br>";
	else
		echo "D en boyukdur <br>";
	// && -> AND  || -> OR 
	// and 	or

	// 1 -(&&) 0 -> 0 (false)
	// 1 -(&&) 1 -> 1 (true)
	// 0 -(&&) 1 -> 0 (false)
	// 0 -(&&) 0 -> 0 (false)

	// 1 -(||) 0 -> 1 (true)
	// 1 -(||) 1 -> 1 (true)
	// 0 -(||) 1 -> 1 (true)
	// 0 -(||) 0 -> 0 (false)


?>