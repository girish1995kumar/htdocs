<?php
include('./class/DB.php')
 function connect() {
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=memez;charset=utf8', 'memez', '7570@Sbf7');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
        }
session_start();        
//Take the user back
$closed = $_SESSION["username"];
echo $closed;
$closed_set = 'yes'; 
if ($_SESSION["username"]) {
if (isset($_POST['no'])) {
 header("Location: my-account.php");
}
if (isset($_POST['yes'])) {
//$close_account = mysql_query("UPDATE users SET closed = 'yes' WHERE username='$closed'");
DB::query('UPDATE users SET closed=:closed_set WHERE username=:closed');
echo "<h1 class='text-center'>Your Account has been closed!</h1>";
session_destroy();
//header("Location: login.php");
}
}
else
{
 die ("You must be logged in to view this page!");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Network</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body>
<center>
<form action="close-account.php" method="POST">
Are you sure you want to close your account?<br>
<input type="submit" name="no" value="No, take me back!">
<input type="submit" name="yes" value="Yes I'm sure">
</form>
</center>
</body>
</html>
