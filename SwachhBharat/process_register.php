<?php
session_start();
if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['repeat_password']))  return;

if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['repeat_password'])) die("10");

//check terms
if(!isset($_POST['terms']))  die("16");

//space must be required in name  or  name validation
$name = $_POST['name'];
if (!preg_match("/^[a-zA-Z ]*$/",$name)) die("11"); 
$space_counter = 0;
$arr1 = str_split($name);
$len = strlen($name);
for($i=0;$i<$len;$i++)
{
  if(preg_match('/\s/',$arr1[$i])) 
  {
    $space_counter++; 
  }
}
if($space_counter == 0) die("11a");
if($space_counter != 1) die("11b");
 
  
// Remove all illegal characters from email
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

//Validate e-mail
if(!filter_var($email, FILTER_VALIDATE_EMAIL) == true) die("13");

if(strlen($_POST['password'])<6 || strlen($_POST['repeat_password'])<6)  die("b14");//count
if(!ctype_alnum($_POST['password']) || !ctype_alnum($_POST['repeat_password']))  die ("a14");//alphanumeric

//check repass
if(($_POST['password'] != $_POST['repeat_password'])) die("15");

include("config.php");

$name = trim(mysqli_real_escape_string($con,$_POST['name']));
$email = strtolower(trim(mysqli_real_escape_string($con,$_POST['email'])));
$password = trim(mysqli_real_escape_string($con,$_POST['password']));
$rpassword = trim(mysqli_real_escape_string($con,$_POST['repeat_password']));

$emailqry="select * from `users` where email='$email';";
$emailqry_run = mysqli_query($con,$emailqry);
if(mysqli_num_rows($emailqry_run) != 0)
{
    mysqli_close($con);
    die("20"); //already exist
}

//check email
$merger=$email.$password;
$salt="SwachhBharatKey";
$npassword=md5($merger.$salt);
$query="INSERT into `users` (`name`,`email`,`password`) values('$name','$email','$npassword');";

if(!mysqli_query($con,$query)) die(mysqli_error($con));
mysqli_close($con);

die("1");
?>