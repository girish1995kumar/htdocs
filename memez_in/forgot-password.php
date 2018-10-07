<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialNetwork</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean">
        <form method="post" action="forgot-password.php">
            <h2 class="sr-only">Forgot Password</h2>
            <div class="illustration"><img src="img/logo.jpg" class="img-circle" height="150" width="100"></div>
            <div class="form-group">
            	<?php
include('./classes/DB.php');
//include('./classes/Mail.php');

if (!isset($_POST['resetpassword'])) {
echo 'Plz enter Email Address';
        
}
else {
	$cstrong = True;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
        $email = $_POST['email'];
        $user_id = DB::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
        DB::query('INSERT INTO password_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
       // Mail::sendMail('Forgot Password!', "<a href='http://localhost/tutorials/sn/change-password.php?token=$token'>http://localhost/tutorials/sn/change-password.php?token=$token</a>", $email);
        echo 'Email sent! Please check your mail';
}

?>
       <hr/>
              <input type="text" name="email" value="" placeholder="Email ..." required="required">
            </div>
            <div class="form-group">
               <input type="submit" name="resetpassword" value="Reset Password">
            </div><a href="login.php" class="forgot">Back to Login Page!</a></form>
          
</form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/bs-animation.js"></script> -->
    <script type="text/javascript">
        // $('#login').click(function() {

        //         $.ajax({

        //                 type: "POST",
        //                 url: "api/auth",
        //                 processData: false,
        //                 contentType: "application/json",
        //                 data: '{ "username": "'+ $("#username").val() +'", "password": "'+ $("#password").val() +'" }',
        //                 success: function(r) {
        //                         //console.log(r)
        //                         window.location ="home.php";
        //                 },
        //                 error: function(r) {
        //                         setTimeout(function() {
        //                         $('[data-bs-hover-animate]').removeClass('animated ' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'));
        //                         }, 2000)
        //                         $('[data-bs-hover-animate]').addClass('animated ' + $('[data-bs-hover-animate]').attr('data-bs-hover-animate'))
        //                         console.log(r)
        //                 }

        //         });

        // });
    </script>
</body>

</html>

