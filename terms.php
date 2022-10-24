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

						echo "<a href='customer/my_account.php?my_orders'>My Account</a>";

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
					<li class="active">
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

<div id="content"><!-- content starts-->
	<div class="container"><!-- container starts-->
		<div class="col-md-12"><!-- col-md-12 starts-->
			<ul class="breadcrumb"><!-- breadcrumb starts--> 
				<li> <a href="index.php">Home</a> </li>
				<li> Tearm And Conditions | Refund Policy </li>
			</ul><!-- breadcrumb ends-->
		</div><!-- col-md-12 ends-->

		<div class="col-md-3"><!-- col-md-3 starts-->
			<div class="box"><!-- box starts-->
				<ul class="nav nav-pills nav-stacked"><!--nav nav-pills nav-stacked starts-->
					<?php

						$get_terms = "select * from terms LIMIT 0,1";
						$run_terms = mysqli_query($con, $get_terms);
						while ($row_terms = mysqli_fetch_array($run_terms))
						{
							$term_title = $row_terms['term_title'];
							$term_link = $row_terms['term_link'];
							 

					?>

					<li class="active">
						<a data-toggle="pill" href="#<?php echo $term_link ?>"> 
							<?php echo $term_title ?>
						</a>
					</li>


				<?php } ?>

				<?php 

					$count_terms = "select * from terms";
					$run_count = mysqli_query($con, $count_terms);
					$count = mysqli_num_rows($run_count);

					$get_terms = "select * from terms LIMIT 1,$count";
					$run_terms = mysqli_query($con, $get_terms);
					while ($row_terms = mysqli_fetch_array($run_terms)) 
					{
						
						$term_title = $row_terms['term_title'];
						$term_link = $row_terms['term_link'];

				?>

				<li>
					<a data-toggle="pill" href="#<?php echo $term_link; ?>">
						<?php echo $term_title; ?>
					</a>
				</li>

			<?php } ?>
				</ul><!--nav nav-pills nav-stacked ends-->
			</div><!-- box ends-->
		</div><!-- col-md-3 ends-->

		<div class="col-md-9"><!-- col-md-9 starts-->
			<div class="box"><!-- box starts-->
				<div class="tab-content"><!--tab-content starts-->
					<?php

						$get_terms = "select * from terms LIMIT 0,1";
						$run_terms = mysqli_query($con, $get_terms);
						while ($row_terms = mysqli_fetch_array($run_terms))
						{
							$term_title = $row_terms['term_title'];
							$term_link = $row_terms['term_link'];
							$term_desc = $row_terms['term_desc'];
							
					?>

						<div id="<?php echo $term_link; ?>" class ="tab-pane fade in active"><!--tab-pane fade in active starts-->
							<h1><?php echo $term_title; ?></h1>
							<p><?php echo $term_desc; ?></p>
						</div><!--tab-pane fade in active ends-->

					<?php } ?>
				
				<?php  

					$count_term = "select * from terms";
					$run_counts = mysqli_query($con, $count_term);
					$counts = mysqli_num_rows($run_counts);
					$get_term = "select * from terms LIMIT 1,$counts";
					$run_term = mysqli_query($con, $get_term);
					while ($row_term = mysqli_fetch_array($run_term)) 
					{
						
						$term_title = $row_term['term_title'];			
						$term_desc = $row_term['term_desc'];
						$term_link = $row_term['term_link'];

				?>
						<div id="<?php echo $term_link; ?>" class ="tab-pane fade in"><!--tab-pane fade in starts-->
							<h1><a href="#<?php echo $term_link; ?>"> <?php echo $term_title; ?> </a></h1>
							<p><?php echo $term_desc; ?></p>
						</div><!--tab-pane fade in  ends-->

				<?php } ?>
				</div><!--tab-content ends-->
			</div><!-- box ends-->
		</div><!-- col-md-9 ends-->
	</div><!-- container ends-->
</div><!-- content ends-->

<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>