<?php

session_start();

if (!isset($_SESSION['username'])) {

	session_destroy();
	header('location:login.php');

	echo "logout";
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
   <h3 class="text-center text-success">Welcome <?php echo $_SESSION['username']; ?> </h3>
   <a href="validation.php">Logout</a>
</div>
</body>
</html>