<?php

$person=array(
array(78,89,99),
array(66,77,88),
array(33,44,55),
);

echo $person[0][0].'<br>';
echo $person[1][0].'<br>';
echo $person[2][0].'<br>';

for($i=0;$i<3;$i++)
{
	for($j=0;$j<3;$j++)
	{
		echo $person[$i][$j].'<br>';
	}
}

foreach($person as $a)
{
	foreach($a as $b)
	{
		echo $b.'<br>';
	}
}

print_r($person);



?>