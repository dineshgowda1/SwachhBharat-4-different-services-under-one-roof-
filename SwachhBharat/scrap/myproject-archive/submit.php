<?php
$system="localhost";
$dbman="root";
$dbpass="";
$dbname="swatchbharat";

$conn=mysqli_connect($system,$dbman,$dbpass,$dbname);


if(isset($_POST['submit']))
{
	$name=$_POST['fname'];
	$address=$_POST['address'];
	$pin=$_POST['pin'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$type=$_POST['type'];
	$weight=$_POST['weight'];

	
	$sql="INSERT INTO details (name,address,pin,mob,email,type,weight) VALUES
	('$name','$address','$pin','$phone','$email','$type','$weight')";
	
$query=mysqli_query($conn,$sql);	
}



?>
<html>
<head>
<style>
body
{
	background-color:87f341;
	
}
div.box3
{
	margin-top:100px;
	margin-left:300px;
	border:1px solid black;
	border-radius:2px;
	height:25%;
	width:50%;
	text-align:center;
	background-color:bccdb0;
}
</style>
</head>
<body>

<div class="box3">WE HAVE RECIEVED THE YOUR DETAILS OUR EXECUTIVE WILL CONTACT YOU SOON FOR FURTHER DETAILING AND PICKUP ARRANGEMENTS</div>
</body>

</html>