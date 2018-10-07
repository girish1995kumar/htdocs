<?php
include('./classes/DB.php');
include('./classes/Login.php');
include('./classes/Post.php');
include('./classes/Image.php');
include('./classes/Notify.php');
if (Login::isLoggedIn()) {
        $userid = Login::isLoggedIn();
} else {
        die('Not logged in!');
}
$image = DB::query('SELECT profileimg FROM users WHERE id=:userid',array(':userid'=>$userid));
//$imageData = base64_encode(file_get_contents($image));
//echo $profile_pic;

if (isset($_POST['uploadprofileimg'])) {

        Image::uploadImage('profileimg', "UPDATE users SET profileimg = :profileimg WHERE id=:userid", array(':userid'=>$userid));

}
?>
<?php
  $senddata = @$_POST['senddata'];

  //Password variables
  $old_password = strip_tags(@$_POST['oldpassword']);
  $new_password = strip_tags(@$_POST['newpassword']);
  $repeat_password = strip_tags(@$_POST['newpassword2']);

  if ($senddata) {
  //If the form has been submitted ...

  $password_query = mysql_query("SELECT * FROM users WHERE id='$userid'");
  while($row = mysql_fetch_assoc($password_query)) {
        $db_password = $row['password'];
        
        //md5 the old password before we check if it matches
        $old_password_md5 = password_hash($old_password, PASSWORD_BCRYPT);
        
        //Check whether old password equals $db_password
        if ($old_password_md5 == $db_password) {
         //Continue Changing the users password ...
         //Check whether the 2 new passwords match
         if ($new_password == $repeat_password) {
            if (strlen($new_password) <= 4) {
             echo "<h1 class='text-center'>Sorry! But your password must be more than 4 character long!</h1>";
            }
            else
            {

            //md5 the new password before we add it to the database
            $new_password_md5 =  password_hash($new_password, PASSWORD_BCRYPT);
           //Great! Update the users passwords!
           $password_update_query = mysql_query("UPDATE users SET password='$new_password_md5' WHERE id='$userid'");
           echo "<h1 class='text-center'>Success! Your password has been updated!</h1>";

            }
         }
         else
         {
          echo "<h1 class='text-center'>Your two new passwords don't match!</h1>";
         }
        }
        else
        {
         echo "<h1 class='text-center'>The old password is incorrect!<h1>";
        }
  }
   }
  else
  {
   echo "";
  }
   $updateinfo = @$_POST['updateinfo'];

  //First Name, Last Name and About the user query
  // $get_info = mysql_query("SELECT first_name, last_name, bio FROM users WHERE username='$user'");
  // $get_row = mysql_fetch_assoc($get_info);
  // $db_firstname = $get_row['first_name'];
  // $db_last_name = $get_row['last_name'];
  // $db_bio = $get_row['bio'];

  //Submit what the user types into the database
  // if ($updateinfo) {
  //  // $firstname = strip_tags(@$_POST['fname']);
  //  // $lastname = strip_tags(@$_POST['lname']);
  //  // $bio = @$_POST['bio'];


  //  if (strlen($firstname) < 3) {
  //   echo "<h1 class='text-center'>Your first name must be 3 or more characters long.</h1>";
  //  }
  //  else
  //  if (strlen($lastname) < 5) {
  //   echo "<h1 class='text-center'>Your last name must be 5 or more characters long.</h1>";
  //  }
  //  else
  //  {
  //   //Submit the form to the database
  //   $info_submit_query = mysql_query("UPDATE users SET first_name='$firstname', last_name='$lastname', bio='$bio' WHERE username='$user'");
  //   echo "<h1 class='text-center'>Your profile info has been updated!<h1>";
  //   header("Location: account_setting.php");
  //  }
  // }
  // else
  // {
  //  //Do nothing
  // }
  //  //Check whether the user has uploaded a profile pic or not
  // $check_pic = mysql_query("SELECT profile_pic FROM users WHERE username='$user'");
  // $get_pic_row = mysql_fetch_assoc($check_pic);
  // $profile_pic_db = $get_pic_row['profile_pic'];
  // if ($profile_pic_db == "") {
  // $profile_pic = "img/default_pic.jpg";
  // }
  // else
  // {
  // $profile_pic = "userdata/profile_pics/".$profile_pic_db;
  // }
  // //Profile Image upload script
  // if (isset($_FILES['profilepic'])) {
  //  if (((@$_FILES["profilepic"]["type"]=="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif"))&&(@$_FILES["profilepic"]["size"] < 1048576)) //1 Megabyte
  // {
  //  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  //  $rand_dir_name = substr(str_shuffle($chars), 0, 15);
  //  mkdir("userdata/profile_pics/$rand_dir_name");
 
  //  if (file_exists("userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
  //  {
  //   echo @$_FILES["profilepic"]["name"]." Already exists";
  //  }
  //  else
  //  {
  //   move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"userdata/profile_pics/$rand_dir_name/".$_FILES["profilepic"]["name"]);
  //   //echo "Uploaded and stored in: userdata/profile_pics/$rand_dir_name/".@$_FILES["profilepic"]["name"];
  //   $profile_pic_name = @$_FILES["profilepic"]["name"];
  //   $profile_pic_query = mysql_query("UPDATE users SET profile_pic='$rand_dir_name/$profile_pic_name' WHERE username='$user'");
  //   header("Location: account_setting.php");
    
  //  }
  // }
  // else
  // {
  //     echo "<h1 class='text-center'>Invailid File! Your image must be no larger than 1MB and it must be either a .jpg, .jpeg, .png or .gif</h1>";
  // } 
  // }

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
<div class="container">
<div class="row">
<h2>Edit Account Settings below</h2> 
<hr />
<p>UPLOAD YOUR PROFILE PHOTO:</p>
<form action="my-account.php" method="post" enctype="multipart/form-data">
<<?php echo '<img src="data:image/jpeg;base64,'.$imageData.'" width="200" class="img-circle img-circle" height="200" alt="img"   >'; ?>"<br /><br />
<input type="file" name="profileimg"><br />
        <input type="submit" name="uploadprofileimg" value="Upload Image">
</form>
<hr />  
<form action="my-account.php" method="post">
<p>CHANGE YOUR PASSWORD:</p> <br />
Your Old Password: &nbsp;&nbsp;&nbsp;<input type="password" name="oldpassword" id="oldpassword" size="40"><br /><br />
Your New Password: &nbsp;<input type="password" name="newpassword" id="newpassword" size="40"><br /><br />
Repeat Password  : &nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="newpassword2" id="newpassword2" size="40"><br /><br />
<input type="submit" name="senddata" id="senddata" value="Update Information">
</form>
<!--<hr />
<form action="account_setting.php" method="post">
<p>UPDATE YOUR PROFILE INFO:</p> <br />
First Name:&nbsp; <input type="text" name="fname" id="fname" size="40" value="<?php //echo $db_firstname; ?>"><br /><br />
Last Name:&nbsp; <input type="text" name="lname" id="lname" size="40" value="<?php //echo $db_last_name; ?>"><br /><br />
About You:&nbsp; <textarea name="bio" id="bio" rows="3" cols="42"><?php //echo $db_bio; ?></textarea><br /><br />
<input type="submit" name="updateinfo" id="updateinfo" value="Update Information">
</form>-->

<hr />
<form action="close-account.php" method="post">
<p>CLOSE ACCOUNT:</p> <br />
<input type="submit" name="closeaccount" id="closeaccount" value="Close My Account">
</form>
<hr />
<br />
<br />
</div>
</div> 
</body>
</html>