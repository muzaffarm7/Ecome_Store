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
					<li>
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
				<li>Register</li>
			</ul><!--breedcrump ends -->
		</div><!--col-md-12 ends-->
		<div class="col-md-3"><!--col-md-3 strats-->
			<?php
			include("includes/sidebar.php");
			?>
		</div><!--col-md-3 ends-->

		<div class="col-md-9" ><!-- col-md-9 Starts -->

				<div class="box" ><!-- box Starts -->

					<div class="box-header" ><!-- box-header Starts -->

						<center><!-- center Starts -->

							<h2> Register A New Account </h2>

						</center><!-- center Ends -->

					</div><!-- box-header Ends -->

					<form action="customer_register.php" method="post" enctype="multipart/form-data" ><!-- form Starts -->
						<div class="form-group" ><!-- form-group Starts -->
							<label>Customer Name</label>
							<input type="text" class="form-control" name="c_name" required>
						</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
							<label> Customer Email</label>
							<input type="text" class="form-control" name="c_email" required>
						</div><!-- form-group Ends -->
						<div class="form-group"><!-- form-group Starts -->
							<label> Customer Password </label>
							<input type="password" class="form-control" name="c_pass" required>
						</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
							<label> Customer Country </label>

							<input type="text" class="form-control" name="c_country" required>
						</div><!-- form-group Ends -->
						<div class="form-group"><!-- form-group Starts -->
							<label> Customer City </label>
							<input type="text" class="form-control" name="c_city" required>
						</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
							<label> Customer Contact </label>
							<input type="text" class="form-control" name="c_contact" required>
						</div><!-- form-group Ends -->
						<div class="form-group"><!-- form-group Starts -->
							<label> Customer Address </label>
							<input type="text" class="form-control" name="c_address" required>
						</div><!-- form-group Ends -->
							<div class="form-group"><!-- form-group Starts -->
							<label> Customer Image </label>
							<input type="file" class="form-control" name="c_image" required>
						</div><!-- form-group Ends -->
						<div class="text-center"><!-- text-center Starts -->
							<button type="submit" name="register" class="btn btn-primary">
							<i class="fa fa-user-md"></i> Register
							</button>
						</div><!-- text-center Ends -->
					</form><!-- form Ends -->
			</div><!-- box Ends -->
		</div><!-- col-md-9 Ends -->

	</div><!-- Container ends -->
</div><!-- Content ends-->


<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

	if(isset($_POST['register']))
	{

		$c_name = $_POST['c_name'];

		$c_email = $_POST['c_email'];

		$c_pass = $_POST['c_pass'];

		$c_country = $_POST['c_country'];

		$c_city = $_POST['c_city'];

		$c_contact = $_POST['c_contact'];

		$c_address = $_POST['c_address'];

		$c_image = $_FILES['c_image']['name'];

		$tmp_name = $_FILES['c_image']['tmp_name'];

		$c_ip = getRealUserIp(); 

		move_uploaded_file($tmp_name,"customer/customer_images/$c_image");

		$insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";


		$run_customer = mysqli_query($con,$insert_customer);

		$sel_cart = "select * from cart where ip_add='$c_ip'";

		$run_cart = mysqli_query($con,$sel_cart);

		$check_cart = mysqli_num_rows($run_cart);

		if($check_cart>0)
		{

			$_SESSION['customer_email']=$c_email;

			echo "<script>alert('You have been Registered Successfully')</script>";

			echo "<script>window.open('checkout.php','_self')</script>";

		}
		else
		{

			$_SESSION['customer_email']=$c_email;

			echo "<script>alert('You have been Registered Successfully')</script>";

			echo "<script>window.open('index.php','_self')</script>";
			
		}
	}

?>