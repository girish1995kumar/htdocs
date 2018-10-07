<?php
//mysqli_connect("localhost","root","","nomoke") or die("Couldn't connect to SQL server");
$con = mysqli_connect("localhost","root","") or die("Couldn't connect to SQL server");
  mysqli_select_db($con,"nomoke") or die("Couldn't select DB");
?>