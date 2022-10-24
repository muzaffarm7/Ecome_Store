<?php
	session_start();
	include("includes/db.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

	<link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >

	<link href="styles/bootstrap.min.css" rel="stylesheet">

	<link href="styles/style.css" rel="stylesheet">

	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">

</head>
<body> 
	<div id="top"><!--Top Start-->
		<div class="container"><!--container Start-->
			<div class="col-md-6 offer"><!--col-md-6 offer start-->
				<a href="#" class="btn btn-success btn-sm">
				<?php

						if (!isset($_SESSION['customer_email'])) 
						{
							echo "Welcome : Guest";
						}
						else
						{
							echo "Welcome : " . $_SESSION['customer_email'] . "";
						}
					?>	
				</a>
				<a href="#">Shopping Cart Total Price: <?php total_price(); ?>, Total Items <?php items(); ?> </a>
			</div><!--col-md-6 offer end-->
			<div class="col-md-6"><!--col-md-6 start-->
				<ul class="menu">
					<li>
						<a href="customer_register.php">Register</a>
					</li>	
					<li>
						<?php

						if(!isset($_SESSION['customer_email'])){

						echo "<a href='checkout.php' >My Account</a>";

						}
						else
						{

						echo "<a href='customer/my_account.php?my_orders'> My Account </a>";

						}


						?>
					</li>
					<li>
						<a href="cart.php">Go to Cart</a>
					</li>
					<li>
						<?php
							if (!isset($_SESSION['customer_email'])) 
							{
								echo "<a href='checkout.php'> Login </a>";
							}
							else
							{
								echo "<a href='logout.php'> Logout </a>";
							}
						?>
					</li>
				</ul>
			</div><!--col-md-6 end-->
		</div><!--container end-->
	</div><!--Top end-->

<div class="navbar navbar-default" id="navbar"><!--Navbar Navbar-default start-->
	<div class="container"><!--Container start-->
		<div class="navbar-header"><!--Navebar-header Start-->
			<a  class="navbar-brand home" href="index.php"><!--Navbar-Brand Home Start-->
				<img src="images/logo.png" alt="computerserver logo" class="hidden-xs">
				<img src="images/logo-small.png" alt="computerserver logo" class="visible-xs">

			</a><!--Navbar-Brand Home End-->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
				<span class="sr-only">Toggle Navigation</span>
				<i class="fa fa-align-justify"></i>	
				
			</button>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
				<span class="sr-only">Toggle Search</span>
				<i class="fa fa-search"></i>				
			</button>
		</div><!--Navebar-header End-->

		<div class="navbar-collapse collapse" id="navigation"><!--Navbar-collapse collapse Start-->
			<div class="padding-nav"><!--Padding-nav start-->
				<ul class="nav navbar-nav navbar-left"><!--nav navbar-nav navbar-left start-->
					<li>
						<a href="index.php"> Home</a>
					</li>
					<li>
						<a href="shop.php"> Shop</a>
					</li>
					<li>
						<?php

						if(!isset($_SESSION['customer_email'])){

						echo "<a href='checkout.php' >My Account</a>";

						}
						else
						{

						echo "<a href='customer/my_account.php?my_orders'> My Account </a>";

						}


						?>
					</li>
					<li>
						<a href="cart.php">  Shopping Cart</a>
					</li>
					<li class="active">
						<a href="contact.php"> Contact Us</a>
					</li>	
					
				</ul><!--nav navbar-nav navbar-left end-->
			</div><!--Padding-nav end-->
			<a class="btn btn-primary navbar-btn right" href="cart.php"><!--btn btn-primary navbar-btn right start-->
				<i class="fa fa-shopping-cart"></i>
				<span> <?php items(); ?> items in cart</span>
			</a><!--btn btn-primary navbar-btn right end-->
			<div class="navbar-collapse collapse right"><!--navbar-collapse collapse right start-->
				<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
					<span class="sr-only">Toggle Search</span>
					<i class="fa fa-search"></i>					
				</button>
			</div><!--navbar-collapse collapse right end-->
			<div class="collapse clearfix" id="search"><!--collapse clearfix start-->
				<form class="navbar-form" method="get" action="results.php"><!--navbar-form start-->
					<div class="input-group"><!--input-group start-->
						<input class="form-control" type="text" placeholder="Search" name="user_query" required>
						<span class="input-group-btn">
						<button type="submit" value="Search" name="search" class="btn btn-primary">
						<i class="fa fa-search"></i>							
						</button>
						</span>
					</div><!--input-group end-->
				</form><!--navbar-form Ends-->
			</div><!--collapse clearfix end-->
		</div><!--Navbar-collapse collapse end-->
	</div><!--Container end-->
</div>	<!--Navbar Navbar-default end-->

<div id="content"><!-- Content strats-->
	<div class="container"><!-- Container strats -->
		<div class="col-md-12"><!--col-md-12 strats-->
			<ul class="breadcrumb"><!--breadcrumb starts -->
				<li><a href="index.php">Home</a></li>
				<li>Contact Us</li>
			</ul><!--breedcrump ends -->
		</div><!--col-md-12 ends-->
		<div class="col-md-3"><!--col-md-3 strats-->
			<?php
			include("includes/sidebar.php");
			?>
		</div><!--col-md-3 ends-->

		<div class="col-md-9"> <!-- col-md-9 statrs -->
			<div class="box"><!-- box starts-->
				<div class="box-header"><!-- box-header starts-->
					<center><!-- center starts-->
						<h2>Contact Us</h2>
						<p class="text-muted">
							If you have any question feel to contact us, our customer service center is working for you 24/7.
						</p>
					</center><!-- center ends-->
				</div><!-- box-header ends-->

				<form action="contact.php" method="post"><!-- form starts-->
					<div class="form-group"><!--form-group starts-->
						<label> Name </label>
						<input type="text" name="name" class="form-control" required>
					</div><!--form-group ends -->
					<div class="form-group"><!--form-group starts-->
						<label> Email </label>
						<input type="text" name="email" class="form-control" required>
					</div><!--form-group ends -->
					<div class="form-group"><!--form-group starts-->
						<label> Subject </label>
						<input type="text" name="subject" class="form-control" required>
					</div><!--form-group ends -->
					<div class="form-group"><!--form-group starts-->
						<label> Message </label>
						<textarea class="form-control" name="message"> </textarea>
					</div><!--form-group ends -->
					<div class="text-center"><!--text-center starts-->
						<button type="submit" name="submit" class="btn btn-primary">
							<i class="fa fa-user-md"> Send Message </i>
						</button>
					</div><!--ftext-center ends -->
				</form><!-- form ends-->

				<?php

				if(isset($_POST['submit']))
				{
					// Admin receives email through this code

					$sender_name = $_POST['name'];
					$sender_email = $_POST['email'];
					$sender_subject = $_POST['subject'];
					$sender_message = $_POST['message'];
					$receiver_email = 'muzaffarm7@gmail.com';
					mail($receiver_email, $sender_name, $sender_subject, $sender_message, $sender_email);
				

					// Send email to sender through this code
 					$email = $_POST['email'];
 					$subject = "Welcom to my website";
 					$msg = "I shall get you soon, thanks for sending us email";
 					$from = "muzaffarmd313@gmail.com";
 					mail($email, $subject, $msg, $from);
 					echo "<h2 align='center'> Your message has been sent successfully</h2>"; 
 					;
				}

				?>

			</div><!-- box ends-->
		</div><!-- col-md-9 ends -->

	</div><!-- Container ends -->
</div><!-- Content ends-->


<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>