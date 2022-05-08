<?php
 $firstname = $_POST['firstname'] ;
 $lastname = $_POST['lastname'] ;
 $email = $_POST['email'] ;
 $password = $_POST['password'];
 $repeatpassword = $_POST['repeatpassword'];
 $realpassword = md5($password);
 $server_name = "localhost";
 $db_user = "root";
 $db_pass = "";
 $db_name = "e-commerce";
 $conn = new mysqli($server_name,$db_user,$db_pass,$db_name); 

 if ($password===$repeatpassword) {
  $sql = "INSERT INTO `admin`(`name`, `email`, `password`) VALUES ('$firstname  $lastname','$email','$realpassword')"; 
  $conn->query($sql);
header('Location:../../index.php');
  
 }

 


?>