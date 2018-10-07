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
        <form method="post">
            <h2 class="sr-only">Create Account</h2>
            <div class="illustration"><img src="img/logo.jpg" class="img-circle" height="150" width="100"></div>
            <h1 class="text-center">Sign up</h1>
            <?php
include('./classes/DB.php');
//include('./classes/Mail.php');
session_start(); 

if (isset($_POST['createaccount'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

                if (strlen($username) >= 3 && strlen($username) <= 32) {

                        if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

                                if (strlen($password) >= 6 && strlen($password) <= 60) {

                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

                                        DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email, \'0\', \'\',\'\')', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email));
                                        $userid = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
                                        DB::query('INSERT INTO followers VALUES (\'\', :userid, :followerid)', array(':userid'=>43, ':followerid'=>$userid));
                                      //  Mail::sendMail('Welcome to our Social Network!', 'Your account has been created!', $email);
                                        //echo "Success!";
                                        $_SESSION['username']= $username;
                               
                                        header("Location: login.php");
                                } else {
                                        echo 'Email in use!';
                                }
                        } else {
                                        echo 'Invalid email!';
                                }
                        } else {
                                echo 'Invalid password!';
                        }
                        } else {
                                echo 'Invalid username';
                        }
                } else {
                        echo 'Invalid username';
                }

        } else {
                echo 'User already exists!';
        }
}
?>
<hr/>
            <div class="form-group">
                <input class="form-control" id="username" type="text" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input class="form-control" id="email" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" id="password" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
               <input type="submit" name="createaccount" value="Create Account">
            </div><a href="login.php" class="forgot">Already got an account? Click here!</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        // $('#ca').click(function() {

        //         $.ajax({

        //                 type: "POST",
        //                 url: "api/users",
        //                 processData: false,
        //                 contentType: "application/json",
        //                 data: '{ "username": "'+ $("#username").val() +'", "email": "'+ $("#email").val() +'", "password": "'+ $("#password").val() +'" }',
        //                 success: function(r) {
        //                        // console.log(r)
        //                        //window.alert('Your account is created.');
        //                        //open("http://127.0.0.1/social/memez_in/Social-Network-Part47/login.html");

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

