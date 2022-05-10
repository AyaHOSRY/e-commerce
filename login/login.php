
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
<!-- Sing in  Form -->
<section class="sign-in">
<div class="container">
<div class="signin-content">
<div class="signin-image">
<figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
<a href="register.php" class="signup-image-link">Create an account</a>
</div>

<div class="signin-form">
<h2 class="form-title">Sign up</h2>
<?php
session_start();
$count = " ";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

$email = $_POST['email'];
$password = $_POST['password'];
$hash_password = md5($password);
$server_name = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "eshopper";
$conn = new mysqli($server_name,$db_user,$db_pass,$db_name);
$sql = "SELECT * FROM users WHERE email = '$email' and password = '$hash_password' ";

$result =$conn->query($sql);
$count  = $result->num_rows;
if ($count === 1) {

    $_SESSION['login']= $email;
    header('Location:../index.php');
}


}

?>
<form method="POST" class="register-form" id="login-form" action="<?php $_SERVER['PHP_SELF'] ?>">
<div class="form-group">

<label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
<input type="text" name="email" id="your_name" placeholder="Your Name"/>
</div>
<div class="form-group">
<label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
<input type="password" name="password" id="your_pass" placeholder="Password"/>
</div>
<?php


if ($count === 0 ) {
    ?>
<div class="alert alert-danger">The username or password is not correct.</div>
    <?php
}

?>
<div class="form-group">
<input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
<label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
</div>
<div class="form-group form-button">
<input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
</div>
</form>

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