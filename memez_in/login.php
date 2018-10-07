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
        <form method="post" action="login.php">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img src="img/logo.jpg" class="img-circle" height="150" width="100"></div>
            <div class="form-group"><h1 class="text-center">Sign In</h1>
                <?php
include('header.php');

?><hr/>
                <input class="form-control" type="text" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
               <input type="submit" name="login" value="Login">
            </div><!--<a href="forgot-password.php" class="forgot">Forgot your email or password?</a>--><br/><a href="create-account.php" class="forgot">Not Registered Yet?<br/> Register now!</a></form>
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
