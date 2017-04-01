<?php
session_start();
if(!isset($_POST['email']) || !isset($_POST['password']))	return;

//check if empty
if(empty($_POST['email'])||empty($_POST['password']))	die("10");

//check if field is white space
if(strlen(trim($_POST['email'])) <= 0)
{
	die("User Name field cannot be white space");
}
if(strlen(trim($_POST['password'])) <= 0)
{
	die("Password field cannot be white space");
}

include ("config.php");
$email = strtolower(trim(mysqli_real_escape_string($con,$_POST['email'])));
$password = trim(mysqli_real_escape_string($con,$_POST['password']));
$merger=$email.$password;
$salt="SwachhBharatKey";
$npassword = md5($merger.$salt);
$query = "select `id` from `users` where `email`='".$email."' and `password`='".$npassword."'";
$result=mysqli_query($con,$query);

if(mysqli_num_rows($result)!=1)
{
	mysqli_close($con);
	die("11");
}

$ssn=md5("SwachhBharatKey");
$_SESSION[$ssn] = md5($email.$npassword);
$values=mysqli_fetch_assoc($result);

$queryins="UPDATE `users` SET `ssnvar` = '".$_SESSION[$ssn]."' WHERE `users`.`id` = '".$values['id']."';";
mysqli_query($con,$queryins);

mysqli_close($con);
if($email=='admin@gmail.com')
	die("2");
die("1");
?>