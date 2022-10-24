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
					<li class="active">
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
				<li>Shop</li>
			</ul><!--breedcrump ends -->
		</div><!--col-md-12 ends-->

		<div class="col-md-3"><!--col-md-3 strats-->
			<?php
			include("includes/sidebar.php");
			?>
		</div><!--col-md-3 ends-->

		<div class="col-md-9"><!--col-md-9 Starts-->
			
			<?php
				if (!isset($_GET['p_cat'])) 
				{
					if (!isset($_GET['cat'])) 
					{
						echo "<div class='box'>
						<h1> Shop</h1>
						<p>It is a long established fact that areader will be distracted by the redable content of a page when looking at is layout.The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using. </p>	
						</div>";
					}
				}
			?>

			<div class="row"><!-- row strats-->
				<?php
					if (!isset($_GET['p_cat'])) 
					{
						if (!isset($_GET['cat'])) 
						{
							$per_page = 6;
							if (isset($_GET['page'])) 
							{
								$page = $_GET['page'];
							}
							else
							{
								$page = 1;
							}
							$start_form = ($page-1) * $per_page;
							$get_products = "select * from products order by 1 DESC LIMIT $start_form,$per_page";
							$run_products = mysqli_query($con,$get_products);
							while ($row_products =mysqli_fetch_array($run_products)) 
							{
								$pro_id = $row_products['product_id'];
								$pro_title = $row_products['product_title'];
								$pro_price = $row_products['product_price'];
								$pro_img1 = $row_products['product_img1'];
								echo "
								<div class='col-md-4 col-sm-6 center-responsive'>
								<div class='product'>
								<a href ='details.php?pro_id=$pro_id'> 
								<img src='admin_area/product_images/$pro_img1' class='img-responsive'> 
								</a>
								<div class='text'>
								<h3><a href='details.php?pro_id=$pro_id'> $pro_title</a></h3>
								<p class='price text-center'> $$pro_price</p>
								<p class='buttons'>
								<a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details </a>
								<a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
								<i class='fa fa-shopping-cart'></i> Add To Cart
								</a>
								</p>
								</div>
								</div>
								</div>
								";
							}
					
				?>
			</div><!-- row ends-->

			<center><!-- center starts -->
				<ul class="pagination"><!-- pagination strats -->
					<?php
						$query = "select * from products";
						$result = mysqli_query($con,$query);
						$total_records = mysqli_num_rows($result);
						$total_pages = ceil($total_records / $per_page);
						echo "
						<li><a href='shop.php?page=1' >".'First Page'."</a></li>
						";
						for ($i=1; $i<=$total_pages; $i++)
						{
							echo "
							<li><a href='shop.php?page=".$i."' >".$i."</a></li>
							";
						};
						echo "
						<li><a href='shop.php?page=$total_pages' >".'Last Page'."</a></li>

						";

						}
					}

					?>
				</ul><!-- pagination ends -->
			</center><!-- center ends --> 
			<?php
				getpcatpro();
				getcatpro();
			?>
		</div><!--col-md-9 ends-->
	</div><!-- Container ends -->
</div><!-- Content ends-->


<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>