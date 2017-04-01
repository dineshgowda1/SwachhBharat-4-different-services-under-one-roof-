<?php
	session_start();
    $ssn=md5("SwachhBharatKey");
	if(!isset($_SESSION[$ssn]))
        echo "<script>alert('Login again!');window.location.href='index.php'</script>";
	
    include("config.php");
    $ssnchkvar =  $_SESSION[$ssn];
    $ssnqry = "SELECT * FROM `users` WHERE `ssnvar`='".$ssnchkvar."'";
    $run_ssnqry=mysqli_query($con,$ssnqry);
    if(mysqli_num_rows($run_ssnqry) != 1)
    {
        mysqli_close($con);
		session_destroy();
		session_unset();  
    }
	$checker=$_GET['type'];
	if($checker=='unavail')
		$val=0;
	else if($checker=='avail')
		$val=1;

	$query="UPDATE workers SET availability=".$val." WHERE id=".$_GET['id'];
	$exquery=mysqli_query($con,$query);
	
	$rows=mysqli_fetch_assoc($run_ssnqry);
	$email=$rows['email'];
	if($email=='admin@gmail.com')
		echo("<script>window.location.href='admin.php';</script>");
	else
		echo("<script>window.location.href='home.php';</script>");
	
?>