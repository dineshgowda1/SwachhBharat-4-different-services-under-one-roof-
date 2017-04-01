<?php
session_start();

include ("config.php");

$ssn=md5("SwachhBharatKey");
$query = "SELECT * FROM users WHERE ssnvar='".$_SESSION[$ssn]."'";
$result = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($result);

$id=$row['id'];
$name=$row['name'];
$address=$_POST['address'];
$pincode=$_POST['pincode'];
$phone=$_POST['phone'];
$email=$row['email'];
$typescrap=$_POST['typescrap'];
$weight=$_POST['weight'];
$query = "INSERT into `details` (`cust_id`,`name`,`address`,`pin`,`mob`,`email`,`type`,`weight`) values($id,'$name','$address',$pincode,$phone,'$email','$typescrap',$weight)";
if(!mysqli_query($con,$query))
	echo(mysql_error());

echo("<script>window.location.href='index.php';</script>");
?>
