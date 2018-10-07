<?php include( "./inc/header.inc.php" );
if ($user) {

}
else
{
 die ("You must be logged in to view this page!");
}
 ?>
<?php
//Take the user back
if ($user) {
if (isset($_POST['no'])) {
 header("Location: account_setting.php");
}
if (isset($_POST['yes'])) {
$close_account = mysql_query("UPDATE users SET closed='yes' WHERE username='$user'");
echo "<h1 class='text-center'>Your Account has been closed!</h1>";
session_destroy();
header("Location: login1.php");
}
}
else
{
 die ("You must be logged in to view this page!");
}
?>
<br />
<center>
<form action="close_account.php" method="POST">
Are you sure you want to close your account?<br>
<input type="submit" name="no" value="No, take me back!">
<input type="submit" name="yes" value="Yes I'm sure">
</form>
</center>
<?php include( "./inc/footer.inc.php" ); ?>