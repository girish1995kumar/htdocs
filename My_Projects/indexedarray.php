<?php 

$names=array('girish','sameer',23,'mohan');
$names[]="shankar";
$names[7]="shyam";

echo $names[0].'<br>';
echo $names[1].'<br>';
echo $names[2].'<br>';
//deleted 
unset($names[7]);
//deleting whole array
//unset($names);
var_dump($names);
echo "indexed array example<br>";

$length=count($names);
echo "<h2>By using for loop</h2>";

for($i=0;$i<$length;$i++)
{
	echo $names[$i].'<br>';
	
}

echo "<h3>By using foreach loop</h3>";
foreach($names as $x)
{
	echo $x.'<br>';
}

echo "<h4>By using array names and print_r method</h4>";

print_r($names);


?>