<?php
	function GetAge($dob) 
	{ 
        $dob=explode("-",$dob); 
        $curMonth = date("m");
        $curDay = date("j");
        $curYear = date("Y");
        $age = $curYear - $dob[0]; 
        if($curMonth<$dob[1] || ($curMonth==$dob[1] && $curDay<$dob[2])) 
                $age--; 
        return $age; 
	}
	
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
	$row=mysqli_fetch_assoc($run_ssnqry);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SwachhBharat- Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
</head>

<body>

	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
    <div class="navbar-header">
    	<a class="navbar-brand" href="#">Swachh Bharat</a>
    </div>
    <ul class="nav navbar-nav">
		<li><a href="index.php">Home</a></li>
		<li class="active"><a href="#">Book Workers</a></li>
		<li><a href="toilet/king.html">Locate Toilet</a></li>
		<li><a href="scrap/index.php">Sell Scrap</a></li>
    </ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo(" Hello, ".$row['name']); ?></a></li>
		  <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Sign Out</a></li>
		</ul>
	  </div>
	</nav>
	

	<div class="container">
    <div class="row">
    <?php
    $query="SELECT * from `workers` WHERE status=1";
    $runqry=mysqli_query($con,$query);
    
    while($row=mysqli_fetch_assoc($runqry)):
    ?>
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="<?=$row['image']?>" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4><?=$row['name']?></h4>
                        <small>
                        	<i class="glyphicon glyphicon-map-marker"></i>
                        	<cite title="location"><?=$row['location']?></cite>
                        </small>
                        <p>
                            Age: <?=GetAge($row['dateofbirth'])?><br>
                            <?php 
								if($row['availability']==1) 
									echo('<span class="label label-success">Available</span>');
								else if($row['availability']==0)
									echo('<span class="label label-danger">Hired</span>');
								
								if($row['availability']==1){ 
							?>
							<button class="btn btn-danger btn-sm" id="<?=$row['id']?>" onclick="window.location.href='toggleavail.php?id='+this.id+'&type=unavail'">Hire now</button>
							<?php	
								} ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        endwhile;
       	?>
    </div>
</div>


</body>

</html>

<?php
    mysqli_close($con);
?>