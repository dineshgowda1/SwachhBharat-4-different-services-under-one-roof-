<?php
if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['number']) || !isset($_POST['message'])) return;
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['number']) || empty($_POST['message']))	die("9");	
if(strlen(trim($_POST['name']))<=0)
{
	die("Name");
}
if(strlen(trim($_POST['email']))<=0)
{
	die("Email");
}
if(strlen(trim($_POST['number']))<=0)
{
	die("Tel no");
}
if(strlen(trim($_POST['message']))<=0)
{
	die("Message");
}
else
{
	$email=$_POST['email'];
	$name="MyTiffy";
	$to = "yb.yashbadani@gmail.com";
	$subject = "Contact via Website";
	$message .= "<br/>Name: " . $_POST['name'];
	$message .= "<br/>Email " . $_POST['email'];
	$message .= "<br/>Number: " . $_POST['no'];
	$message .= "<br/>Subject: " . $_POST['subject']."<br/>Message: ".$_POST['message'];

	$headers  = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
	$headers .= "From: " . $name . " <" . $email . ">". "\r\n";

	if( mail($to, $subject, $message, $headers) ) 
	{
		die("10");
	} 
	else 
	{
		die("11");
	}
}