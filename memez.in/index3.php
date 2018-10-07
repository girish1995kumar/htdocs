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
<style>
html, body {
    height: 100%;
    width: 100%;
    margin: 0;
}
 
 .thumbnail img {
    max-height: 10%;
    max-width: 100%;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;
}
div.gallery {
    border: 1px solid #ccc;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

@media only screen and (max-width: 700px) {
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px) {
    .responsive {
        width: 100%;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
</style>
</head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="row">
  <a class="navbar-brand" href="#">
    <img src="./img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt=""></a><font color="black">memez.in<br/>&nbsp;&nbsp;Never Bored Again</font></div></div>
</nav>
<div class="container">
        <div class="row">
            <div class="responsive">
  <div class="gallery">
            <div class="col-xs-12">
           <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="./img/hi_crush.jpg" alt="Chania" class="mx-auto d-block">
      <div class="carousel-caption">
       <!-- <h3>Los Angeles</h3>
        <p>LA is always so much fun!</p>-->
      </div>
    </div>

    <div class="item">
      <img  src="./img/hindu_muslim.jpg" alt="Chicago" class="img-responsive" >
      <div class="carousel-caption">
        <!--<h3>Chicago</h3>
        <p>Thank you, Chicago!</p>-->
      </div>
    </div>

    <div class="item">
      <img src="./img/marwari.jpg" alt="New York" class="img-responsive" >
      <div class="carousel-caption">
        <!--<h3>New York</h3>
        <p>We love the Big Apple!</p>-->
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

        </div>
</div>
</div>
</div>
</div>
<div class="footer">
    <nav class="navbar navbar-default">
    <a href="create-account.php" class="btn btn-primary btn-lg btn-block" role="button">Sign Up!</a>
    <a href="login.php" class="btn btn-success btn-lg btn-block" role="button">Sign In</a></nav>
 </div> 


 <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>
</html>