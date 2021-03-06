
<?php
include'../connect.php';
//check for errors
$error_arr = array();
if (isset($_GET['error_fields'])) 
$error_arr=explode(",", $_GET['error_fields'])
;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Sign Up Form by Colorlib</title>

<!-- Font Icon -->
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="main">

<!-- Sign up form -->
<section class="signup">
<div class="container">
<div class="signup-content">
<div class="signup-form">
<h2 class="form-title">Sign up</h2>
<form method="POST" class="register-form" id="register-form" action="inc/fun/do_register.php">
<div class="form-group">
<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
<input type="text" name="name" id="name" placeholder="Your Name"/>
<?php 
if (in_array("name", $error_arr)){
    echo "please enter your name";
}?>
</div>
<div class="form-group">
<label for="email"><i class="zmdi zmdi-email"></i></label>
<input type="email" name="email" id="email" placeholder="Your Email"/>
<?php 
if (in_array("email", $error_arr)){
    echo "please enter your email";
}?>
</div>
<div class="form-group">
<label for="pass"><i class="zmdi zmdi-lock"></i></label>
<input type="password" name="password" id="pass" placeholder="Password"/>
<?php 
if (in_array("password", $error_arr)){
    echo "please enter your password";
}?>
</div>

<div class="form-group form-button">
<input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
</div>
</form>
</div>
<div class="signup-image">
<figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
<a href="login.php" class="signup-image-link">I am already member</a>
</div>
</div>
</div>
</section>

   
</div>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>