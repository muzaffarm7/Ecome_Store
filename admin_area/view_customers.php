<?php 

	if (!isset($_SESSION['admin_email'])) 
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{

?>

<div class="row"><!-- 1 row stars-->
	<div class="col-lg-12"><!-- col-lg-12 starts-->
		<ol class="breadcrumb"><!-- breadcrumb starts--> 
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Customers
			</li>
		</ol><!-- breadcrumb ends-->
	</div><!-- col-lg-12 ends-->
</div><!-- 1 row ends-->

<div class="row"><!-- 2 row starts-->
	<div class="col-lg-12"><!-- col-lg-12 starts-->
		<div class="panel panel-default"><!-- panel panel-default starts-->
			<div class="panel-heading"><!--panel-heading Starts-->
				<h3 class="panel-title"><!-- panel-title starts-->
					<i class="fa fa-money fa-fw"></i> View Customers 
				</h3><!-- panel-title ends-->
			</div><!--panel-heading Ends-->

			<div class="panel-boday"><!-- panel-boday starts -->
				<div class="panel-responsive"><!-- panel-responsive starts -->
					<table class="table table-bordered  table-hover table-striped"><!--table table-bordered  table-hover table-striped starts-->
						<thead><!-- thead starts-->
							<tr>
								<th>Customer No</th>
								<th>Customer Name</th>
								<th>Customer Email</th>
								<th>Customer Image</th>
								<th>Customer Country</th>
								<th>Customer City</th>
								<th>Customer Phone Number</th>
								<th>Order Delete</th>
							</tr>
						</thead><!-- thead ends-->

						<tbody> <!-- tbody starts-->
							<?php

								$i = 0;
								$get_customer = "select * from customers";
								$run_customer = mysqli_query($con, $get_customer);
								while ($row_customer=mysqli_fetch_array($run_customer)) 
								{
										
									$c_id = $row_customer['customer_id'];
									$c_name = $row_customer['customer_name'];
									$c_email = $row_customer['customer_email'];
									$c_image = $row_customer['customer_image'];
									$c_country = $row_customer['customer_country'];
									$c_city = $row_customer['customer_city'];
									$c_contact = $row_customer['customer_contact'];
									$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $c_name; ?></td>
								<td><?php echo $c_email; ?></td>
								<td>
									<img src="../customer/customer_images/<?php echo $c_image; ?>" width="100" height="100">
								</td>
								<td><?php echo $c_country; ?></td>
								<td><?php echo $c_city; ?></td>
								<td><?php echo $c_contact; ?></td>
								<td>
									<a href="index.php?delete_customer=<?php echo $c_id;?>">
										<i class="fa fa-trash-o"></i> Delete 
									</a>
								</td>
							</tr>
						<?php } ?>
						</tbody><!-- tbody ends-->
					</table><!--table table-bordered  table-hover table-striped ends-->
				</div><!-- panel-responsive ends -->
			</div><!-- panel-boday ends -->
		</div><!-- panel panel-default ends-->
	</div><!-- col-lg-12 ends-->
</div><!-- 2 row ends-->



<?php } ?>
