<?php 

	if (!isset($_SESSION['admin_email'])) 
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{



?>

<div class="row"><!-- 1 row starst-->
	<div class="col-lg-12"><!-- col-lg-12 starts -->
		<ol class="breadcrumb"><!-- breadcrumb starts-->
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / User / View Users 
			</li>
		</ol><!-- breadcrumb ends-->
	</div><!-- col-lg-12 ends -->
</div><!-- 1 row starst-->

<div class="row"><!-- 2 row  starts-->
	<div class="col-lg-12"><!-- col-lg-12 starts-->
		<div class="panel panel-default"><!-- panel panel-default starts starts-->
			<div class="panel-heading"><!-- panel-heading starts-->
				<div class="panel-title">
					<i class="fa fa-money fa-fw"></i> View Users 
				</div>
			</div><!-- panel-heading ends-->

			<div class="panel-body"><!-- panel-body starts-->
				<div class="panel-responsive"><!-- panel-responsive starts -->
					<table class="table table-bordered  table-hover table-striped"><!-- table table-bordered table-hover table-striped starts -->
						<thead><!-- thead starts -->
							<tr>
								<th>Admin Name</th>
								<th>Admin Email</th>
								<th>Admin Image</th>
								<th>Admin Country</th>
								<th>Admin Contact</th>
								<th>Admin Job</th>
								<th>Delete User</th>
							</tr>
						</thead><!-- thead ends -->
						<tbody><!-- tbody starts-->
							<?php  

							$get_admin = "select * from admin";
							$run_admin = mysqli_query($con, $get_admin);

							while ($row_admin = mysqli_fetch_array($run_admin)) 
							{
								$admin_id = $row_admin['admin_id'];
								$admin_name = $row_admin['admin_name'];
								$admin_email = $row_admin['admin_email'];
								$admin_image = $row_admin['admin_image'];
								$admin_country = $row_admin['admin_country'];
								$admin_contact = $row_admin['admin_contact'];
								$admin_job = $row_admin['admin_job'];

							?>
								<tr>
									<td> <?php echo $admin_name; ?> </td>
									<td> <?php echo $admin_email; ?> </td>
									<td> <img src="admin_images/<?php echo $admin_image; ?>" width="70" height="70"> </td>
									<td> <?php echo $admin_country; ?> </td>
									<td> <?php echo $admin_contact; ?> </td>
									<td> <?php echo $admin_job; ?> </td>
									<td>
										<a href="index.php?delete_users=<?php echo $admin_id; ?>">
											<i class="fa fa-trash-o"></i> 
											Delete
										</a>
									</td>
								</tr>

						<?php } ?>
						</tbody><!-- ends-->
					</table><!-- table table-bordered table-hover table-striped ends -->
				</div><!-- panel-responsive ends -->
			</div><!-- panel-body ends-->
		</div><!-- panel panel-default starts ends-->
	</div><!-- col-lg-12 starts-->
</div><!-- 2 row  starts-->


<?php } ?>