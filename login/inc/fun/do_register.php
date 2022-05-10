<?php 
//validation
$error_fields = array();
if (! (isset($_POST['name'])&& !empty($_POST['name']))) {
	$error_fields[]="name";
}
if (! (isset($_POST['email'])&& filter_input(INPUT_POST, 'email' , FILTER_VALIDATE_EMAIL) )) {
	$error_fields[]="email";
}
if (! (isset($_POST['password'])&& strlen($_POST['password'])>5)) {
    $error_fields[]="password";
}
if ($error_fields) {
	header("Location:../../register.php?error_fields=".implode(",", $error_fields));
	exit;
}
//connect to database
$conn = mysqli_connect("localhost","root","","eshopper");
if (!$conn) {
	echo mysqli_connent_error();
	exit;
     }
///escape any special characters to avoif sql injection
     
$name = mysqli_escape_string($conn, $_POST['name']);
$email = mysqli_escape_string($conn, $_POST['email']);
$password = mysqli_escape_string($conn, $_POST['password']);
$hashpassord = md5($password);
//insert data

$query = "INSERT INTO users (name , email , password) VALUES ('$name','$email','$hashpassord')";
if (mysqli_query($conn, $query)) {
	header("Location:../../login.php");
}else{
 echo $query;
 echo mysqli_error($conn);
}
//close the connection 
mysqli_close($conn);

 ?>