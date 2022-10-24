<?php
	session_start();
	include("includes/db.php");
	include("functions/functions.php");
?>

<?php
	if (isset($_GET['pro_id'])) 
	{
		$product_id = $_GET['pro_id'];
		$get_product ="select * from products where product_id='$product_id'";
		$run_product = mysqli_query($con,$get_product);

		$row_product = mysqli_fetch_array($run_product);

		$p_cat_id = $row_product['p_cat_id'];
		$pro_title = $row_product['product_title'];
		$pro_price = $row_product['product_price'];
		$pro_desc = $row_product['product_desc'];
		$pro_img1 = $row_product['product_img1'];
		$pro_img2 = $row_product['product_img2'];
		$pro_img3 = $row_product['product_img3'];

		$get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
		$run_p_cat = mysqli_query($con,$get_p_cat);

		$row_p_cat = mysqli_fetch_array($run_p_cat);
		$p_cat_title = $row_p_cat['p_cat_title'];
	}
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
				<li><a href="shop.php">Shop</a></li>

				<li>
					<a href="shop.php?p_cat_id=<?php echo $p_cat_id; ?>"> <?php echo $p_cat_title; ?></a>
				</li>
				<li>
					<?php echo $pro_title; ?>
				</li>

			</ul><!--breedcrump ends -->
		</div><!--col-md-12 ends-->

		<div class="col-md-3"><!--col-md-3 strats-->
			<?php
			include("includes/sidebar.php");
			?>
		</div><!--col-md-3 ends-->
		<div class="col-md-9"><!-- col-md-9 starts -->
			<div class="row" id="productMain"><!-- row Strats -->
				<div class="col-sm-6"><!-- col-sm-6 starts-->
					<div id="mainImage"><!-- mainimage strats-->
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators"><!-- carousel-indicators strats-->
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>
							</ol><!-- carousel-indicators ends-->
							<div class="carousel-inner"><!--carousel-inner starts-->
								<div class="item active">
									<center>
										<img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
									</center>
								</div>
								<div class="item">
									<center>
										<img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
									</center>
								</div>
								<div class="item">
									<center>
										<img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
									</center>
								</div>
							</div><!--carousel-inner ends-->

							<a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control strats -->
								<span class="glyphicon glyphicon-chevron-left"> </span>
								<span class="sr-only"> Previous </span>
							</a><!-- left carousel-control ends -->
							<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts-->
								<span class="glyphicon glyphicon-chevron-right"> </span>
								<span class="sr-only"> Next </span>
							</a><!-- right carousel-control ends-->
						</div>
					</div> <!-- mainimage ends-->
				</div><!-- col-sm-6 ends-->

				<div class="col-sm-6"><!--col-sm-6 starts -->
					<div class="box"><!-- box starts-->
						<h1 class="text-center"> <?php echo $pro_title; ?> </h1>
						<?php 
							add_cart();
						 ?>
						<form action="details.php?add_cart=<?php echo $product_id; ?>" method="post" class="form-horizontal"><!--form-horizontal starts -->
							<div class="form-group"><!--form-group starts-->
								<label class="col-md-5 control-label">Product Quantity</label>
								<div class="col-md-7"><!--col-md-7 starts-->
									<select name="product_qty" class="form-control">
										<option> Select Quantity </option>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
									</select>
								</div><!--col-md-7 ends-->
							</div><!--form-group ends-->
							<div class="form-group"><!--form-group starts-->
								<label class="col-md-5 control-label">Product Size</label>
								<div class="col-md-7"><!--col-md-7 starts-->
									<select name="product_size" class="form-control">
										<option>Select a Size</option>
										<option>Small</option>
										<option>Medium</option>
										<option>Large</option>
										<option>Extra Large</option>
									</select>
								</div><!--col-md-7 ends-->
							</div><!--form-group ends-->
							<p class="price text-center"> $<?php echo $pro_price; ?> </p>
							<p class="text-center buttons"><!-- text-center buttons starts -->
								<button class="btn btn-primary" type="submit">
									<li class="fa fa-shopping-cart"></li> Add to Cart
								</button>
							</p><!-- text-center buttons ends -->
						</form><!--form-horizontal ends -->
					</div><!-- box ends-->

					<div class="row" id="thumbs"><!-- row starts -->
						<div class="col-xs-4"><!-- col-xs-4 strats -->
							<a href="#" class="thumb">
								<img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
							</a>
						</div><!-- col-xs-4 ends -->
						
						<div class="col-xs-4"><!-- col-xs-4 strats -->
							<a href="#" class="thumb">
								<img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
							</a>
						</div><!-- col-xs-4 ends -->

						<div class="col-xs-4"><!-- col-xs-4 strats -->
							<a href="#" class="thumb">
								<img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
							</a>
						</div><!-- col-xs-4 ends -->
					</div><!-- row ends -->
				</div><!--col-sm-6 ends -->
			</div><!-- row ends -->

			<div class="box" id="details"><!-- box starts -->
				<p><!--p strats-->
					<h4>Product details</h4>
					<p>
						<?php echo $pro_desc; ?>
					</p>
					<h4>Size</h4>
					<ul>
						<li>Small</li>
						<li>Medium</li>
						<li>Large</li>
						<li>Extra Large</li>
					</ul>
				</p><!--p strats-->
			</div><!-- box ends -->

			<div class="row same-height-row"><!-- row same-height-row starts -->
				<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 starts -->
					<div class="box same-height headline"><!-- box same-height headline  starts -->
						<h3 class="text-center"> You also like these Products </h3>
					</div><!-- box same-height headline ends -->
				</div><!-- col-md-3 col-sm-6 ends -->

				<?php
					$get_products = "select * from products order by rand() LIMIT 0,3";
					$run_products = mysqli_query($con,$get_products);

					while ($row_products=mysqli_fetch_array($run_products)) 
					{
					 	$pro_id = $row_products['product_id'];
					 	$pro_title = $row_products['product_title'];
					 	$pro_price = $row_products['product_price'];
					 	$pro_img1 = $row_products['product_img1'];

					 	echo " 
					 	<div class='center-responsive col-md-3 col-sm-6'>
					 	<div class='product same-height'>
					 	<a href='details.php?pro_id=$pro_id'>
					 	<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
					 	</a>
					 	<div class='text'>
					 	<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
					 	<p class='price text-center'>$$pro_price</p>
					 	</div>
					 	</div>
					 	</div>
					 	";
					 } 
				?>
			</div><!-- row same-height-row ends -->
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