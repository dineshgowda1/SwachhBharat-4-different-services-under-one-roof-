<html>
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
	$query = "SELECT * FROM `workers`";
	$runqry=mysqli_query($con,$query);
?>
<head>
	<title>SwachhBharat-Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<script src="scripts/jquery.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
</head>
<body>
<button id="signout" type="submit" onclick="javascript:window.location.href='logout.php'" class="btn btn-success" style="">
	<span class="glyphicon glyphicon-off"></span> Sign Out
</button>


<div class="table-responsive">
			  <table class="table">
				<thead>
				  <tr>
					<th># worker-id</th>
					<th>Name</th>
					<th>Change Status</th>
					<th>Change Availability</th>
				  </tr>
				</thead>
				<tbody>
		<?php
				while($row=mysqli_fetch_assoc($runqry)):
		?>
					<tr>
						<td><?=$row['id']?></td>
						<td><?=$row['name']?></td>
						<td>
							<?php 
								if($row['status']==1){ 
							?>		<button class="btn btn-danger" id="<?=$row['id']?>" onclick="window.location.href='toggleworker.php?id='+this.id+'&type=disable'">Disable</button>
							<?php	
								}else if($row['status']==0){
							?>		<button class="btn btn-success" id="<?=$row['id']?>" onclick="window.location.href='toggleworker.php?id='+this.id+'&type=enable'">Enable</button>
							<?php } ?>
						</td>
								
						<td>
							<?php 
								if($row['availability']==1){ 
							?>		<button class="btn btn-danger" id="<?=$row['id']?>" onclick="window.location.href='toggleavail.php?id='+this.id+'&type=unavail'">Make Hire</button>
							<?php	
								}else if($row['availability']==0){
							?>		<button class="btn btn-success" id="<?=$row['id']?>" onclick="window.location.href='toggleavail.php?id='+this.id+'&type=avail'">Make Available</button>
						</td>
					</tr>
		<?php
				}
				endwhile;
		?>
				</tbody>
			  </table>
			</div>
</body>
</html>
