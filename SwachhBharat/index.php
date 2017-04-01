<?php
	if(!isset($_SESSION)) session_start();
    $ssn=md5("SwachhBharatKey");
	$checker=0;
	
    if(isset($_SESSION[$ssn]))
    {
        include("config.php");
		$ssnchkvar =  $_SESSION[$ssn];
        $ssnqry = "SELECT * FROM `users` WHERE `ssnvar`='".$ssnchkvar."'";
        $run_ssnqry=mysqli_query($con,$ssnqry);
		
		$adminchk=mysqli_fetch_assoc($run_ssnqry);
		if($adminchk['email']=="admin@gmail.com")
            echo "<script>window.location.href='admin.php'</script>";

        if(mysqli_num_rows($run_ssnqry) == 1)
        {
			$checker=1; 
        }
		else
		{
			session_destroy();
			session_unset();
			mysqli_close($con);
		}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SwachhBharat- Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      margin: auto;
  }
  </style>
</head>
<body>
	<?php
	if($checker == 1)
    {
	?>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Swachh Bharat</a>
				</div>
				<ul class="nav navbar-nav">
				  <li class="active"><a href="#">Home</a></li>
				  <li><a href="home.php">Book Workers</a></li>
				  <li><a href="toilet/king.html">Locate Toilet</a></li>
				  <li><a href="scrap/index.php">Scrap</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo(" Hello, ".$adminchk['name']); ?></a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Sign Out</a></li>
				</ul>
			</div>
		</nav> 
	<?php
	}
	else
	{
	?>
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#">Swachh Bharat</a>
			</div>
			<ul class="nav navbar-nav">
			  <li class="active"><a href="#">Home</a></li>
			  <li><a href="about.php">About Us</a></li>
			  <li><a href="contactus.php">Contact Us</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li data-toggle="modal" data-target="#registermdl"><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			  <li data-toggle="modal" data-target="#loginmdl"><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		  </div>
		</nav>
<?php
		}
?>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/1.jpg" alt="1" style="height:400px;width:550px;">
      </div>

      <div class="item">
        <img src="images/2.jpg" alt="2" style="height:400px;width:550px;">
      </div>
	  
      <div class="item">
        <img src="images/3.jpg" alt="3" style="height:400px;width:550px;">
      </div>
	  
      <div class="item">
        <img src="images/4.jpg" alt="4" style="height:400px;width:550px;">
      </div>

    </div>

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

	<center>
		<div class="jumbotron">
			<h1>Welcome to Swachh Bharat</h1> 
			<p>Lets make India Clean. #CleanIndia2020</p> 
		</div>
	</center>
	
	<section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
		
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center">
                    <div class="service-box">
                        <h1 class="glyphicon glyphicon-home"></h1>
                        <h3>Order Anytime</h3>
                        <p class="text-muted">So that your worker reaches on time</p>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="service-box">
                        <h1 class="glyphicon glyphicon-duplicate"></h1>
                        <h3>Order Multiple</h3>
                        <p class="text-muted">Send many workers all over Mumbai</p>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="service-box">
                        <h1 class="glyphicon glyphicon-time"></h1>
                        <h3>Timely reach</h3>
                        <p class="text-muted">You get your worker when you need it. On time</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<div class="row" style="background-color:#F05F40;color:#fff;width:100%;margin:0;padding:0;">
		<div class="col-sm-6"><iframe width="560" height="315" src="https://www.youtube.com/embed/tWBCsn6pQWc" frameborder="0" allowfullscreen></iframe></div>
		<div class="col-sm-6"><br><h3>The Sewer man of mumbai</h3><p>Every day Mumbai produces enough sewage to fill 4,500 Olympic-size swimming pools. Despite the many modern comforts of Mumbai, the sewer system is outdated and is still cleaned by hand. At least once a year the manhole covers are removed and a worker is lowered down with only a helmet for protection. The worker then scoops out the sludge consisting of both human and industrial waste that has been collecting in the pipes. It is not uncommon for Indian sewer workers to become ill or die from the toxic fumes. Indian Parliament recently passed a law in an effort to improve these poor working conditions, but many are doubtful that the new measures will make a difference.</p></div>
	</div>
  
    <div class="row" style="width:100%;margin:0;padding:0;">
    <div class="row" style="width:100%;margin:0;padding:0;"><h3><center>Website Team</center></h3></div>
        <br>
        <div class="col-md-4 text-center">
            <center>
                <img src="images/man.jpg" style="width:35%" class="img-circle" alt="...">
                <br>
                <h4>Bhavesh Mishra</h4>
                <p>Developer<br>
            </center>
        </div>
		<div class="col-md-4 text-center">
            <center>
                <img src="images/radz.jpg" style="width:35%" class="img-circle" alt="the-brains">
                <br>
                <h4>Radhika Gokani</h4>
                <p> Developer<br>
            </center>
        </div>
        <div class="col-md-4 text-center">
            <center>
                <img src="images/man.jpg" style="width:35%" class="img-circle" alt="...">
                <br>
                <h4>Dinesh Gowda</h4>
                <p>Developer<br>
            </center>
        </div>
    </div>
    <div class="row" style="width:100%;margin:0;padding:0;"><p><center><a href="contactus.php">Contact Us</a> <p class="footertext">&copy; Copyright 2016</p></center></p></div>
			
  
  <!-- Login Modal -->
  <div class="modal fade" id="loginmdl" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
			<form class="form-horizontal" id="submit-form">
				<div class="alert error_data"></div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email"><span class="glyphicon glyphicon-envelope"></span> Email:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" name="email" placeholder="Enter email" autofocus required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="password"><span class="glyphicon glyphicon-lock"></span> Password:</label>
				  <div class="col-sm-10">          
					<input type="password" class="form-control" name="password" placeholder="Enter password" required>
				  </div>
				</div>
				
				<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button id="lsubmit" type="submit" class="btn btn-success">Log in</button>
					  </div>
				</div>
			</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
		  <p>Not a member? <a href="" data-dismiss="modal" data-toggle="modal" data-target="#registermdl">Sign Up</a><br></p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="registermdl" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Register</h4>
        </div>
        <div class="modal-body">
			<form class="form-horizontal" id="reg-form">
				
				<div class="alert error_data_reg"></div>
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="name">Name</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" name="name" placeholder="Enter your name" required>
				  </div>
				</div>
							
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" name="email" placeholder="Enter Email" required>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="password">Password:</label>
				  <div class="col-sm-10">          
					<input type="password" class="form-control" name="password" placeholder="Enter Password" required>
				  </div>
				</div>
				
				<div class="form-group">
				  <label class="control-label col-sm-2" for="repeat_password"> &nbsp </label>
				  <div class="col-sm-10">          
					<input type="password" class="form-control" name="repeat_password" placeholder="Retype password" required>
				  </div>
				</div>
				
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<div class="checkbox">
					  <label><input type="checkbox" name="terms">By checking this, you accept the <a href="t&c.html">Terms and Conditions</a></label>
					</div>
				  </div>
				</div>
				
				<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button id="rsubmit" type="submit" class="btn btn-success">Sign up</button>
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
  
   <script src="scripts/login.js"></script>
   <script src="scripts/register.js"></script> 
</body>
</html>
