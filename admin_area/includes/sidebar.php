<?php 

	if (!isset($_SESSION['admin_email'])) 
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{



?>
<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar navbar-inverse navbar-fixed-top Starts -->
	<div class="navbar-header"><!-- navbar-header starts-->

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->
			<span class="sr-only"> Toggle Navegation </span>

			<span class="icon-bar"> </span>
			<span class="icon-bar"> </span>
			<span class="icon-bar"> </span>			
		</button><!-- navbar-exl-collapse Ends -->

		<a class="navbar-brand" href="index.php?dashboard"> Admin Panel </a>

	</div><!-- navbar-header ends-->

	<ul class="nav navbar-right top-nav"><!-- nav navbar-right top-nav Starts -->
		<li class="dropdown"><!-- dropdown starts-->
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><!-- dropdown-toggle Starts -->
				<i class="fa fa-user"></i>
				<?php echo $admin_name; ?> <b class="carte"></b>
			</a><!-- dropdown-toggle Ends -->

			<ul class="dropdown-menu"><!-- dropdown-menu Starts-->
				<li> <!-- li starts-->
					<a href="index.php?user_profile=<?php echo $admin_id ;?>">
						<i class="fa fa-fw fa-user"></i> Profile 
					</a>
				</li><!-- li ends-->
				<li> <!-- li starts-->
					<a href="index.php?view_products">
						<i class="fa fa-fw fa-envelope"></i> Products 
						<span class="badge"><?php echo $count_products; ?></span> 
					</a>
				</li><!-- li ends-->
				<li> <!-- li starts-->
					<a href="index.php?view_customers">
						<i class="fa fa-fw fa-gear"></i> Customers 
						<span class="badge"><?php echo $count_customers; ?></span>
					</a>
				</li><!-- li ends-->
				<li> <!-- li starts-->
					<a href="index.php?view_p_cat">
						<i class="fa fa-fw fa-gear"></i> Product Categories
						<span class="badge"><?php echo $count_p_categories; ?></span> 
					</a>
				</li><!-- li ends-->

				<li class="divider"></li>
				<li><!-- li starts-->
					<a href="logout.php">
						<i class="fa fa-fw fa-power-off"></i> Log Out 
					</a>
				</li><!-- li ends-->
			</ul><!-- dropdown-menu ends-->
		</li><!-- dropdown starts-->
	</ul><!-- nav navbar-right top-nav Ends -->

	<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse starts -->
		<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav starts-->
			<li><!-- li start-->
				<a href="index.php?dashboard">
					<i class="fa fa-fw fa-dashboard"></i>Dashboard</a>
			</li><!-- li end-->

			<li> <!-- li stats-->
				<a href="#" data-toggle="collapse" data-target="#products">
					<i class="fa fa-fw fa-table"></i>Products 
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="products" class="collapse">
					<li>
						<a href="index.php?insert_products"> Insert Products</a>
					</li>
					<li>
						<a href="index.php?view_products"> View Products</a>
					</li>		
				</ul>
			</li><!-- li ends-->

			<li> <!-- li stats-->
				<a href="#" data-toggle="collapse" data-target="#p_cat">
					<i class="fa fa-fw fa-pencil"></i>Products Categories
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="p_cat" class="collapse">
					<li>
						<a href="index.php?insert_p_cat"> Insert Products Categoies</a>
					</li>
					<li>
						<a href="index.php?view_p_cat"> View Products Categories</a>
					</li>
				</ul>
			</li><!-- li ends-->

			<li> <!-- li stats-->
				<a href="#" data-toggle="collapse" data-target="#cat">
					<i class="fa fa-fw fa-arrows-v"></i>Categories
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="cat" class="collapse">
					<li>
						<a href="index.php?insert_cat"> Insert Categories</a>
					</li>
					<li>
						<a href="index.php?view_cat"> View Categories</a>
					</li>	
				</ul>
			</li><!-- li ends-->

			<li><!--boxes section li starts-->
				<a href="#" data-toggle="collapse" data-target="#boxes"><!-- a starts-->
					<i class="fa fa-fw fa-arrows"></i> Boxes Section 
					<i class="fa fa-fw fa-caret-down"></i>
				</a><!-- a ends-->

				<ul id="boxes" class="collapse">
					<li>
						<a href="index.php?insert_box"> Insert Box </a>
					</li>
					<li>
						<a href="index.php?view_boxes"> View Boxes </a>
					</li>
				</ul>
			</li><!--boxes section li ends-->

			<li> <!-- li stats-->
				<a href="#" data-toggle="collapse" data-target="#slides">
					<i class="fa fa-fw fa-gear"></i>Slides
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="slides" class="collapse">
					<li>
						<a href="index.php?insert_slides"> Insert Slides</a>
					</li>
					<li>
						<a href="index.php?view_slides"> View Slides</a>
					</li>
				</ul>
			</li><!-- li ends-->

			<li>
				<a href="index.php?view_customers">
					<i class="fa fa-fw fa-edit"></i>View Customers
				</a>
			</li>

			<li>
				<a href="index.php?view_orders">
					<i class="fa fa-fw fa-list"></i>View Orders 
				</a>
			</li>

			<li>
				<a href="index.php?view_payments">
					<i class="fa fa-fw fa-pencil"></i>View Payments 
				</a>
			</li>

			<li> <!-- li stats-->
				<a href="#" data-toggle="collapse" data-target="#users">
					<i class="fa fa-fw fa-user"></i>Users
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="users" class="collapse">
					<li>
						<a href="index.php?insert_user"> Insert User</a>
					</li>
					<li>
						<a href="index.php?view_users"> View Users</a>
					</li>
					<li>
						<a href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit Profile</a>
					</li>
				</ul>
			</li><!-- li ends-->

			<li> <!-- li Starts -->
				<a href="logout.php">
					<i class="fa fa-fw fa-power-off"></i> 
					Log Out
				</a>
			</li> <!-- li Ends -->
		</ul><!-- nav navbar-nav side-nav ends-->
	</div><!-- collapse navbar-collapse navbar-ex1-collapse ends -->
</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>