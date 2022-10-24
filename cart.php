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
					<li class="active">
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
				<li>Cart</li>
			</ul><!--breedcrump ends -->
		</div><!--col-md-12 ends-->

		<div class="col-md-9" id="cart"><!-- col-md-9 starts -->
			<div class="box"><!-- box starts -->
				<form action="cart.php" method="post" enctype="multipart-form-data"> <!-- form starts -->
					<h1> Shopping Cart </h1>

					<?php
					$ip_add = getRealUserIp();
					$select_cart = "select * from cart where ip_add='$ip_add'";
					$run_cart = mysqli_query($con,$select_cart);
					$count = mysqli_num_rows($run_cart); 
					?>
					<p class="text-muted"> You currently have a <?php echo $count; ?> item(s) in your cart.</p>
					<div class="table-responsive"><!--table-responsive starts-->
						<table class="table"><!-- table starts -->
							<thead><!--thead starts -->
								<tr>
									<th colspan="2"> Product</th>
									<th>Quantity</th>
									<th>Unit Price</th>
									<th>Size</th>

									<th colspan="1"> Delete</th>
									<th colspan="2"> Sub Total</th>
								</tr>
							</thead><!--thead ends -->
							<tbody><!-- Tbody Starts -->
								<?php
									$total = 0;
									while ($row_cart= mysqli_fetch_array($run_cart)) 
									{
										$pro_id = $row_cart['p_id'];
										$pro_size = $row_cart['size'];
										$pro_qty = $row_cart['qty'];
										$get_products = "select * from products where product_id='$pro_id'";

										$run_products = mysqli_query($con,$get_products);
										while ($row_products=mysqli_fetch_array($run_products)) 
										{
											$product_title = $row_products['product_title'];
											$product_img1 = $row_products['product_img1'];
											$only_price = $row_products['product_price'];
											$sub_total = $row_products['product_price']*$pro_qty;
											$total += $sub_total;
												
								?>
								<tr><!-- tr starts -->
									<td>
										<img src="admin_area/product_images/<?php echo $product_img1;  ?>">
									</td>
									<td>
										<a href="#"> <?php echo $product_title; ?> </a>
									</td>
									<td>
										<?php echo $pro_qty; ?>
									</td>
									<td>
										$ <?php echo $only_price; ?>.00
									</td>
									<td>
										<?php echo $pro_size; ?>
									</td>
									<td>
										<input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
									</td>
									<td>
										$ <?php echo $sub_total; ?>.00
									</td>
								</tr><!-- tr ends-->
							<?php 
									} 
								} 
							?>
							</tbody><!-- Tbody ends -->
							<tfoot><!-- tfoot starts-->
								<tr>
									<th colspan="5"> Total</th>
									<th colspan="2"> $ <?php echo $total; ?>.00</th>

								</tr>
							</tfoot><!-- tfoot ends-->
						</table><!-- table ends -->
					</div><!--table-responsive ends-->

					<div class="box-footer"><!-- box-footer starts -->
						<div class="pull-left"><!-- pull-left Starts-->
							<a href="index.php" class="btn btn-default">
							<i class="fa fa-chevron-left"></i> Continue Shopping
							</a>
						</div><!-- pull-left ends-->
						<div class="pull-right"><!-- pull-right ends-->
							<button class="btn btn-default" type="submit" name="update" value=" Update Cart">
								<i class="fa fa-refresh"></i> Update Cart
							</button>
							<a href="checkout.php" class="btn btn-primary"> 
							Proceed To Checkout <i class="fa fa-chevron-right"></i>
							</a>
						</div><!-- pull-right ends-->
					</div><!-- box-footer endss -->
				</form><!-- form endss -->
			</div><!-- box ends -->

			<?php

				function update_cart()
				{

				global $con;

				if(isset($_POST['update']))
				{

						foreach($_POST['remove'] as $remove_id){


						$delete_product = "delete from cart where p_id='$remove_id'";

						$run_delete = mysqli_query($con,$delete_product);

						if($run_delete)
							{
								echo "<script>window.open('cart.php','_self')</script>";
							}
						}
					}
				}

				echo @$up_cart = update_cart();

			?>
			
			<div class="row same-height-row"><!-- row same-height-row starts -->
				<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 starts -->
					<div class="box same-height headline"><!-- box same-height headline  starts -->
						<h3 class="text-center"> You also like these Products </h3>
					</div><!-- box same-height headline ends -->
				</div><!-- col-md-3 col-sm-6 ends -->

				<?php
					$get_products = "select * from products order by rand() LIMIT 0,3";
					$run_products = mysqli_query($con,$get_products);
					while ($row_products = mysqli_fetch_array($run_products)) 
					{
						$pro_id = $row_products['product_id'];
						$pro_title = $row_products['product_title'];
						$pro_price = $row_products['product_price'];
						$pro_img1 = $row_products['product_img1'];

						echo " 
						<div class='col-md-3 col-sm-6'> 
							<div class='product same-height'>
							<a href='details.php?pro_id=$pro_id'>
							<img src='admin_area/product_images/$pro_img1' class='img-responsive'>
							</a>
							<div class='text'>
							<h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class='price text-center'>$ $pro_price</p>
							</div>
							</div>
						</div>
						";
					}
				?>

			</div><!-- row same-height-row ends -->
		</div><!-- col-md-9 ends -->
		<div class="col-md-3"><!--col-md-3 starts --> 
			<div class="box" id="order-summary"><!-- box starts -->
				<div class="box-header"><!-- box-header starts-->
					<h3>Order Summary</h3>
				</div><!-- box-header end-->
				<p class="text-muted">
					Skiping and additional costs are calculated based on the value you have enter.
				</p>

				<div class="table-responsive"><!-- table-responsive starts-->
					<table class="table"><!-- table starts -->
						<tbody><!-- tbody starts-->
							<tr>
								<td> Order Subtotal </td>
								<th> $<?php echo $total ; ?>.00</th>
							</tr>
							<tr>
								<td> Shipping and Handling </td>
								<th>$0.00</th>
							</tr>
							<tr>
								<td> Tax </td>
								<th>$0.00</th>
							</tr>
							<tr class="total">
								<td>Total</td>
								<th>$<?php echo $total; ;?>.00</th>
							</tr>
						</tbody><!-- tbody ends-->
					</table><!-- table ends -->
				</div><!-- table-responsive ends-->
			</div><!-- box ends -->
		</div><!--col-md-3 starts -->
	</div><!-- Container ends -->
</div><!-- Content ends-->


<?php
include("includes/footer.php");
?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>
</body>
</html>