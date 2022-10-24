<?php 

	if (!isset($_SESSION['admin_email'])) 
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{



?>

<div class="row"><!--1 row starts-->
	
	<div class="col-md-12"><!-- col-md-12 starts-->
		<h1 class="page-header">Dashboard</h1>
		<ol class="breadcrumb"><!-- breadcrumb starts-->
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard
			</li>
		</ol><!-- breadcrumb ends-->
	</div><!-- col-md-12 ends-->

</div><!--1 row starts-->

<div class="row"><!--2 row starts -->
	<div class="col-md-3 col-md-6"><!-- col-md-3 col-md-6 starts-->
		<div class="panel panel-primary"><!-- panel panel-primary starts-->
			<div class="panel-heading"><!-- panel-heading starts-->
			 	<div class="row"><!--panel-heading row starts-->
			 		<div class="col-xs-3"> <!-- col-xs-3 starts-->
			 			<i class="fa fa-tasks fa-5x"></i>
			 		</div><!-- col-xs-3 ends-->

			 		<div class="col-xs-9 text-right"><!-- col-xs-9 text-right starts-->
			 			<div class="huge"> <?php echo $count_products; ?> </div>
			 			<div> Products </div>
			 		</div><!-- col-xs-9 text-right ens-->
			 	</div><!--panel-heading row sends-->
			</div><!-- panel-heading ends-->

			<a href="index.php?view_products">
				<div class="panel-footer"> <!-- panel-footer starts--> 
					<span class="pull-left"> View Details </span>	
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i> </span>
					<div class="clearfix"> </div>
				</div><!-- panel-footer ends-->
			</a>
		</div><!-- panel panel-primary ends-->
	</div><!-- col-md-3 col-md-6 ends-->

	<div class="col-md-3 col-md-6"><!-- col-md-3 col-md-6 starts-->
		<div class="panel panel-green"><!-- panel panel-green starts-->
			<div class="panel-heading"><!-- panel-heading starts-->
			 	<div class="row"><!--panel-heading row starts-->
			 		<div class="col-xs-3"> <!-- col-xs-3 starts-->
			 			<i class="fa fa-comments fa-5x"></i>
			 		</div><!-- col-xs-3 ends-->

			 		<div class="col-xs-9 text-right"><!-- col-xs-9 text-right starts-->
			 			<div class="huge"><?php echo $count_customers; ?> </div>
			 			<div> Customers </div>
			 		</div><!-- col-xs-9 text-right ens-->
			 	</div><!--panel-heading row sends-->
			</div><!-- panel-heading ends-->

			<a href="index.php?view_customers">
				<div class="panel-footer"> <!-- panel-footer starts--> 
					<span class="pull-left"> View Details </span>	
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i> </span>
					<div class="clearfix"> </div>
				</div><!-- panel-footer ends-->
			</a>
		</div><!-- panel panel-green ends-->
	</div><!-- col-md-3 col-md-6 ends-->

	<div class="col-md-3 col-md-6"><!-- col-md-3 col-md-6 starts-->
		<div class="panel panel-yellow"><!-- panel panel-yellow starts-->
			<div class="panel-heading"><!-- panel-heading starts-->
			 	<div class="row"><!--panel-heading row starts-->
			 		<div class="col-xs-3"> <!-- col-xs-3 starts-->
			 			<i class="fa fa-shopping-cart fa-5x"></i>
			 		</div><!-- col-xs-3 ends-->

			 		<div class="col-xs-9 text-right"><!-- col-xs-9 text-right starts-->
			 			<div class="huge"> <?php echo $count_p_categories;?> </div>
			 			<div> Products Categories </div>
			 		</div><!-- col-xs-9 text-right ens-->
			 	</div><!--panel-heading row sends-->
			</div><!-- panel-heading ends-->

			<a href="index.php?view_p_cat">
				<div class="panel-footer"> <!-- panel-footer starts--> 
					<span class="pull-left"> View Details </span>	
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i> </span>
					<div class="clearfix"> </div>
				</div><!-- panel-footer ends-->
			</a>
		</div><!-- panel panel-yellow ends-->
	</div><!-- col-md-3 col-md-6 ends-->

	<div class="col-md-3 col-md-6"><!-- col-md-3 col-md-6 starts-->
		<div class="panel panel-red"><!-- panel panel-red starts-->
			<div class="panel-heading"><!-- panel-heading starts-->
			 	<div class="row"><!--panel-heading row starts-->
			 		<div class="col-xs-3"> <!-- col-xs-3 starts-->
			 			<i class="fa fa-support fa-5x"></i>
			 		</div><!-- col-xs-3 ends-->

			 		<div class="col-xs-9 text-right"><!-- col-xs-9 text-right starts-->
			 			<div class="huge"> <?php echo $count_pending_orders; ?> </div>
			 			<div> Orders </div>
			 		</div><!-- col-xs-9 text-right ens-->
			 	</div><!--panel-heading row sends-->
			</div><!-- panel-heading ends-->

			<a href="index.php?view_orders">
				<div class="panel-footer"> <!-- panel-footer starts--> 
					<span class="pull-left"> View Details </span>	
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i> </span>
					<div class="clearfix"> </div>
				</div><!-- panel-footer ends-->
			</a>
		</div><!-- panel panel-red ends-->
	</div><!-- col-md-3 col-md-6 ends-->

</div><!-- 2 row ends -->


<div class="row"><!-- 3 row starts-->
	<div class="col-lg-8"><!-- col-lg-8 strats-->
		<div class="panel panel-primary"><!-- panel panel-primary starts-->
			<div class="panel-heading"><!--panel-heading starts-->
				<h3 class="panel-title"><!-- panel-title strats-->
					<i class="fa fa-money fa-fw"></i> New Orders 
				</h3><!-- panel-title ends-->
			</div><!--panel-heading ends-->

			<div class="panel-body"><!-- panel-body starts-->
				<div class="table-responsive"><!-- table-responsive starts -->
					<table class="table table-bordered  table-hover table-striped"><!-- table table-bordered  table-hover table-striped  starts-->
						
						<thead><!-- thead starts -->
							<tr>
								<th> Order No: </th>
								<th> Customer Email: </th>
								<th> Invoice NO: </th>
								<th> Product Id: </th>
								<th> Product Qty: </th>
								<th> Product Size: </th>
								<th> Status: </th>
							</tr>
						</thead><!-- thead ends -->

						<tbody><!-- tbody starts-->
							<?php 
								$i = 0;
								$get_order = "select * from pending_orders order by 1 DESC LIMIT 0,5";
								$run_order = mysqli_query($con, $get_order);

								while ($row_order=mysqli_fetch_array($run_order)) 
								{
									
								$order_id  = $row_order['order_id'];
								$customer_id = $row_order['customer_id'];
								$invoice_no  = $row_order['invoice_no'];
								$product_id  = $row_order['product_id'];
								$qty  = $row_order['qty'];
								$size  = $row_order['size'];
								$order_status  = $row_order['order_status']; 

								$i++;
							?>
							<tr>
								<td> <?php echo $i; ?> </td>
								<td> 
									<?php
										$get_customers = "select * from customers where customer_id='$customer_id'";
										$run_customers = mysqli_query($con, $get_customers);
										$row_customers = mysqli_fetch_array($run_customers);
										$customer_email = $row_customers['customer_email'];
										echo $customer_email;
										
									?> 
								</td>
								<td> <?php echo $invoice_no; ?> </td>
								<td> <?php echo $product_id; ?> </td>
								<td> <?php echo $qty; ?> </td>
								<td> <?php echo $size; ?> </td>
								<td> 
									<?php 
										if ($order_status=='pending') 
										{
											echo $order_status = 'Pending';
										}
										else
										{
											echo $order_status = 'Complete';
										}
									 ?> 
								</td>
							</tr>

							<?php } ?>
						</tbody><!-- tbody ends-->

					</table><!-- table table-bordered  table-hover table-striped  ends-->
				</div><!-- table-responsive ends -->

				<div class="text-right"><!-- text-right starts-->
					<a href="index.php?view_orders">
						View All Orders <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div><!-- text-right ends-->
			</div><!-- panel-body ends-->
		</div><!-- panel panel-primary ends-->
	</div><!-- col-lg-8 ends-->

	<div class="col-md-4"><!-- col-md-4 starts -->
		<div class="panel"><!-- panel starts -->
			<div class="panel-body"><!-- panel-body starts-->
				<div class="thumb-info mb-md"><!-- thumb-info mb-md starts-->
					<img src="admin_images/<?php echo $admin_image; ?>" class="rounded img-responsive">
					<div class="thumb-info-title"><!-- thumb-info-title starts-->
						<span class="thumb-info-inner"> <?php echo $admin_name; ?> </span>
						<span class="thumb-info-type"> <?php echo $admin_job; ?> </span>
					</div><!-- thumb-info-title ends-->
				</div><!-- thumb-info mb-md ends-->

				<div class="mb-md"><!-- mb-md starts-->
					<div class="widget-content-expanded"><!-- widget-content-expanded starts-->
						<i class="fa fa-user"></i><span> Email: </span> <?php echo $admin_email; ?> <br>
						<i class="fa fa-user"></i><span> Country: </span> <?php echo $admin_country; ?> <br>
						<i class="fa fa-user"></i><span> Contact: </span> <?php echo $admin_contact; ?> <br>
					</div><!-- widget-content-expanded ends-->
					<hr class="dotted short">
					<h5 class="text-muted"> About </h5>
					<p>
						<?php echo $admin_about; ?>   
					</p>
				</div><!-- mb-md ends-->
			</div><!-- panel-body ends-->
		</div><!-- panel ends -->
	</div><!-- col-md-4 ends -->
</div><!-- 3 row ends-->

<?php } ?>