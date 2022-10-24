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

<div class="container" id="slider"><!-- container Starts -->

	<div class="col-md-12"><!-- col-md-12 Starts -->

		<div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- carousel slide Starts --->

			<ol class="carousel-indicators"><!-- carousel-indicators Starts -->

				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>

				<li data-target="#myCarousel" data-slide-to="1"></li>

				<li data-target="#myCarousel" data-slide-to="2"></li>

				<li data-target="#myCarousel" data-slide-to="3"></li>


			</ol><!-- carousel-indicators Ends -->

		<div class="carousel-inner"><!-- carousel-inner Starts -->

			<?php

				$get_slides = "select * from slider LIMIT 0,1";

				$run_slides = mysqli_query($con,$get_slides);

				while($row_slides=mysqli_fetch_array($run_slides))
				{

					$slide_name = $row_slides['slide_name'];
					$slide_image = $row_slides['slide_image'];
					$slide_url = $row_slides['slide_url'];

					echo "

					<div class='item active'>
					<a href='$slide_url' target='_blank'>
					<img src='admin_area/slides_images/$slide_image'></a>

					</div>

					";
					}

			?>

			<?php

				$get_slides = "select * from slider LIMIT 1,3 ";

				$run_slides = mysqli_query($con,$get_slides);

				while($row_slides = mysqli_fetch_array($run_slides)) 
				{


					$slide_name = $row_slides['slide_name'];

					$slide_image = $row_slides['slide_image'];
					$slide_url = $row_slides['slide_url'];

					echo "

					<div class='item'>
					<a href='$slide_url' target='_blank'>
					<img src='admin_area/slides_images/$slide_image'><a>

					</div>

					";

				}

			?>

		</div><!-- carousel-inner Ends -->

			<a class="left carousel-control" href="#myCarousel" data-slide="prev"><!-- left carousel-control Starts -->

			<span class="glyphicon glyphicon-chevron-left"> </span>

			<span class="sr-only"> Previous </span>

			</a><!-- left carousel-control Ends -->

			<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts -->

			<span class="glyphicon glyphicon-chevron-right"> </span>

			<span class="sr-only"> Next </span>

			</a><!-- right carousel-control Ends -->

		</div><!-- carousel slide Ends --->

	</div><!-- col-md-12 Ends -->

</div><!-- container Ends -->
<div id="advantages"><!--advantages starts-->
	<div class="container"><!--container starts-->
		<div class="same-height-row"><!--same-height-row starts-->
			<?php

			$get_boxes = "select * from boxes_section";
			$run_boxes = mysqli_query($con, $get_boxes);

			while ($run_boxes_section = mysqli_fetch_array($run_boxes)) 
			{
				$box_id = $run_boxes_section['box_id'];
				$box_title = $run_boxes_section['box_title'];
				$box_desc = $run_boxes_section['box_desc'];
				

			?>
			<div class="col-sm-4"><!--col-sm-4 starts-->
				<div class="box same-height"><!--box same-height starts-->
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>
					<h3><a href="#"> <?php echo $box_title; ?></a></h3>
					<p>
						<?php echo $box_desc; ?>
					</p>
				</div><!--box same-height ends-->
			</div><!--col-sm-4 ends-->
			<?php } ?>
		</div><!--same-height-row ends-->
	</div><!--container ends-->	
</div><!--advantages ends-->
<div id="hot"><!--Hot starts-->
	<div class="box"><!--Box Starts-->
		<div class="container"><!--container starts-->
			<div class="col-md-12"><!--col-md-12 starts-->
				<h2>Latest this week</h2>
			</div><!--col-md-12 ends-->
		</div><!--container ends-->
	</div><!--Box ends-->
</div><!--Hot ends-->

<div id="content" class="container"><!--container startss-->
	<div class="row"><!--Row starts -->
		<?php

			getPro();

		?>
	</div><!--Row ends -->
</div><!--container ends-->
<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>