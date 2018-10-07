<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
        <meta name="Description" CONTENT="You love people If you love their mind.">
                     <meta name="robots" content="noindex,nofollow">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                   <meta name="viewport" content="width=device-width,initial-scale=1">
                                            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
                                                 <link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="shortcut icon" href="img/nomoke.jpg" />
                                                        <title>nomoke</title>
<script type="text/javascript" src="js/main.js"></script>	
</head>
<body>
	<?php
		if (!$user) {
		echo '<nav class="navbar navbar-default ">
		<div class="container">
		      <div class="row">
			       <div class="col-sm-8">
				         <ul class="nav nav-tabs">
			                   <li role="presentation" ><a href="index.php"><img src="img/nomoke.jpg" title="" style="height: 40px; width: 40px"></a></li>
                               <li><h4 style="color: green" />Nomoke</h4><h4 style="color: green">Find | Match | Chat</h4></li>
			             </ul>
			      </div>
			      <div class="col-sm-4" >
	                  <ul class="nav navbar-nav navbar-right"> 
	                         <form class="navbar-form navbar-left">
                                    <div class="input-group">
                                          <a href="./login.php">Sign up</a> 
                                          &nbsp;&nbsp;
                                          <a href="./login.php"> Log in</a>
                                      
                                    </div>
                             </form>
     <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      -->
                    </ul>  
                </div>
          </div>
     </div>
</nav>';
} else {
	echo '<nav class="navbar navbar-default">
    <div class="container">
    <div class="row">
     <!-- <div class="col-sm-24">-->
<section class="col-xs-24">
        <ul class="nav navbar-nav">
      <li role="presentation" ><a href="home.php"><img src="img/nomoke.jpg" title="" style="height: 30px; width: 30px"></a></li>
      <li role="presentation" class=""><a href="home.php">Home</a></li>
      <li role="presentation" ><a href="friend_requests.php">notification' . $unread_numrowsed . '</a></li>
            <li role="presentation" ><a href="account_setting.php">Account Setting</a></li>
            <li role="presentation" ><a href="my_messages.php">My Messages' . $unread_numrows . '</a></li>
            <li role="presentation" ><a href="'.$user.'">Profile</a></ul>
</section>
</div>
    </div>
      
    </nav> ';
}
?>
<div class="container" style="">
		<div class="row">
		<div class="container">
<div class="row">
<h2>Edit Account Settings below</h2> 
<hr />
<p>UPLOAD YOUR PROFILE PHOTO:</p>
<form action="account_setting.php" method="POST" enctype="multipart/form-data">
<img src="<?php echo $profile_pic; ?>" width="70" /><br /><br />
<input type="file" name="profilepic" /><br />
<input type="submit" name="uploadpic" value="Upload Image">
</form>
<hr />  
<form action="account_setting.php" method="post">
<p>CHANGE YOUR PASSWORD:</p> <br />
Your Old Password: &nbsp;&nbsp;&nbsp;<input type="password" name="oldpassword" id="oldpassword" size="40"><br /><br />
Your New Password: &nbsp;<input type="password" name="newpassword" id="newpassword" size="40"><br /><br />
Repeat Password  : &nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="newpassword2" id="newpassword2" size="40"><br /><br />
<input type="submit" name="senddata" id="senddata" value="Update Information">
</form>
<hr />
<form action="account_setting.php" method="post">
<p>UPDATE YOUR PROFILE INFO:</p> <br />
First Name:&nbsp; <input type="text" name="fname" id="fname" size="40" value="<?php echo $db_firstname; ?>"><br /><br />
Last Name:&nbsp; <input type="text" name="lname" id="lname" size="40" value="<?php echo $db_last_name; ?>"><br /><br />
About You:&nbsp; <textarea name="bio" id="bio" rows="3" cols="42"><?php echo $db_bio; ?></textarea><br /><br />
<input type="submit" name="updateinfo" id="updateinfo" value="Update Information">
</form>
<hr />
<form action="close_account.php" method="post">
<p>CLOSE ACCOUNT:</p> <br />
<input type="submit" name="closeaccount" id="closeaccount" value="Close My Account">
</form>
<hr />
<br />
<br />
</div>
</div> 
<div class="container">
<div class="row">
<h2>Edit Account Settings below</h2> 
<hr />
<p>UPLOAD YOUR PROFILE PHOTO:</p>
<form action="account_setting.php" method="POST" enctype="multipart/form-data">
<img src="<?php echo $profile_pic; ?>" width="70" /><br /><br />
<input type="file" name="profilepic" /><br />
<input type="submit" name="uploadpic" value="Upload Image">
</form>
<hr />  
<form action="account_setting.php" method="post">
<p>CHANGE YOUR PASSWORD:</p> <br />
Your Old Password: &nbsp;&nbsp;&nbsp;<input type="password" name="oldpassword" id="oldpassword" size="40"><br /><br />
Your New Password: &nbsp;<input type="password" name="newpassword" id="newpassword" size="40"><br /><br />
Repeat Password  : &nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="newpassword2" id="newpassword2" size="40"><br /><br />
<input type="submit" name="senddata" id="senddata" value="Update Information">
</form>
<hr />
<form action="account_setting.php" method="post">
<p>UPDATE YOUR PROFILE INFO:</p> <br />
First Name:&nbsp; <input type="text" name="fname" id="fname" size="40" value="<?php echo $db_firstname; ?>"><br /><br />
Last Name:&nbsp; <input type="text" name="lname" id="lname" size="40" value="<?php echo $db_last_name; ?>"><br /><br />
About You:&nbsp; <textarea name="bio" id="bio" rows="3" cols="42"><?php echo $db_bio; ?></textarea><br /><br />
<input type="submit" name="updateinfo" id="updateinfo" value="Update Information">
</form>
<hr />
<form action="close_account.php" method="post">
<p>CLOSE ACCOUNT:</p> <br />
<input type="submit" name="closeaccount" id="closeaccount" value="Close My Account">
</form>
<hr />
<br />
<br />
</div>
</div> 