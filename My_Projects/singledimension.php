<?php
$names=array("girish"=>23,"mohan"=>24,"shankar"=>22);

echo $names["girish"].'<br>';
echo $names["mohan"].'<br>';
echo $names["shankar"].'<br>';

foreach($names as $a)
{
     echo $a.'<br>';
	 
}

foreach($names as $a=>$b)
{
     echo "name :".$a." and age :".$b.'<br>';
	 
}

print_r($names).'<br>';

 

?>