<?php

session_start();



$con=mysqli_connect('localhost','root');
if($con)
{
	echo "connection successfull";
}else
{
	echo "connection failed";
}

mysqli_select_db($con,'sessionpractical');

$name=$_POST['user'];
$pass=$_POST['pass'];


$q=" select * from signin where name='$name' && password='$pass' ";

$result = mysqli_query($con,$q);


$num=mysqli_num_rows($result);


if($num==1)
{
	echo "Duplicate user";
}
else
{
	$s=" insert into signin(name,password) values('$name','$pass')";

	mysqli_query($con,$s);

	header('location:login.php');
}

?>