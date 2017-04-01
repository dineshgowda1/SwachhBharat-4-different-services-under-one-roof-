<?php 
	session_start();
    $ssn=md5("SwachhBharatKey");
	if(!isset($_SESSION[$ssn]))
        echo "<script>alert('Login again!');window.location.href='../index.php'</script>";
	
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
<html>
<head>
	<title>Sell Scrap</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css" />
	<title>SwachhBharat- Login</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="../styles/bootstrap.min.css">
	  <script src="../scripts/jquery.min.js"></script>
	  <script src="../scripts/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
		    <div class="navbar-header">
		    	<a class="navbar-brand" href="#">Swachh Bharat</a>
		    </div>
		    <ul class="nav navbar-nav">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../home.php">Book Workers</a></li>
				<li><a href="../toilet/king.html">Locate Toilet</a></li>
				<li class="active"><a href="#">Scrap</a></li>
		    </ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo(" Hello, ".$row['name']); ?></a></li>
				<li><a href="../logout.php"><span class="glyphicon glyphicon-off"></span> Sign Out</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="jumbotron">
			<div class="row">
            	<div class="col-lg-9">
				    <h1>Sell your scrap here !</h1>
				    <p>Left your scrap to die? Earn money by selling them</p>
				</div>
				<div class="col-lg-3 text-center">
				    <button data-toggle="modal" data-target="#sellscrap" type="button" onclick="" class="btn-lg btn-success">Sell here</button>
				</div>
			</div>
  		</div>
  		<div class="row">
            <div class="col-lg-3 text-center">
                <div class="thumbnail">
        			<img src="img/paper.jpg" alt="Lights" style="width:100%">
        			<div class="caption">
          				<p>Paper Scrap</p>
        			</div>
    			</div>
            </div>

            <div class="col-lg-3 text-center">
                <div class="thumbnail">
        			<img src="img/iron.jpg" alt="Lights" style="width:100%">
        			<div class="caption">
          				<p>Iron Scrap</p>
        			</div>
    			</div>
            </div>

            <div class="col-lg-3 text-center">
                <div class="thumbnail">
        			<img src="img/electronic.jpg" alt="Lights" style="width:100%">
        			<div class="caption">
          				<p>Electronic Scrap</p>
        			</div>
    			</div>
            </div>

            <div class="col-lg-3 text-center">
                <div class="thumbnail">
        			<img src="img/copper.jpg" alt="Lights" style="width:100%">
        			<div class="caption">
          				<p>Copper Scrap</p>
        			</div>
    			</div>
            </div>

        </div>
	</div>

	<div class="modal fade" id="sellscrap" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
        <div class="modal-body">
			<form method="post" class="form-horizontal" id="scrapreg" action="setpickup.php">
				
				<div class="alert error_data_reg"></div>
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="address">Address</label>
				  <div class="col-sm-10">
      				<textarea class="form-control" rows="5" name="address" required></textarea>
				  </div>
				</div>
							
				<div class="form-group">
				  <label class="control-label col-sm-2" for="pincode">Pincode</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="pincode" required>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="phone">Phone no.</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="phone" required>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="typescrap">Type of Scrap</label>
				  <div class="col-sm-10">
					<select name="typescrap">
						<option value="none"></option>
						<option value="paper">Paper</option>
						<option value="plastic">Plastic</option>
						<option value="electronic">Electronic</option>
						<option value="metal">Copper/Iron/Etc.</option>
						<option value="others">Other</option>
					</select>
				  </div>
				</div>

				<div class="form-group">
				  <label class="control-label col-sm-2" for="weight">Weight</label>
				  <div class="col-sm-10">
					<input type="number" class="form-control" name="weight" required>
				  </div>
				</div>
				
				<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button id="scrapregsub" type="submit" class="btn btn-success">Set Pickup</button>
					  </div>
				</div>
				
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php
    mysqli_close($con);
?>
