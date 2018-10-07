<?php

$marks=array("mani"=>array("physics"=>66,"math"=>90),
            "girish"=>array("chem"=>67,"eng"=>91),
			"rohan"=>array("geo"=>68,"his"=>92)
	       );

echo $marks["mani"][physics].'<br>';
echo $marks["rohan"][his].'<br>';

foreach($marks as $a=>$b)
{
   foreach($b as $c=>$d)
   {
	   
		   echo "name :".$a." key: ".$c." value: ".$d.'<br>';
	   
   }
}

print_r($marks);


?>