<?php 

	if (!isset($_SESSION['admin_email'])) 
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{


?>

<div class="row"><!-- 1 row starts -->
	<div class="col-lg-12"><!--col-lg-12 starts-->
		<ol class="breadcrumb"><!-- breadcrumb starts-->
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Products Categories 
			</li>
		</ol><!-- breadcrumb ends-->
	</div><!--col-lg-12 ends-->
</div><!-- 1 row ends -->

<div class="row"><!-- 2 row starts -->
	<div class="col-lg-12"><!--col-lg-12 starts-->
		<div class="panel panel-default"><!--panel panel-default starts -->
			<div class="panel-heading"><!-- panel-heading starts -->
				<h3 class="panel-title"><!-- panel-title starts-->
					<i class="fa fa-money fa-fw"></i> View Products Categories 
				</h3><!-- panel-title ends-->
			</div><!-- panel-heading ends -->

			<div class="panel-body"><!-- panel-body starts-->
				<div class="table-responsive"><!-- table-responsive starts-->
					<table class="table table-bordered  table-hover table-striped"><!-- table table-bordered  table-hover table-striped starts-->
						<thead> <!-- thead starts -->
							<tr>
								<th>Product Category Id</th>
								<th>Product Category Title</th>
								<th>Product Category Description</th>
								<th>Delete Product Category</th>
								<th>Edit Product Category</th>
							</tr>
						</thead><!-- thead ends -->
						<tbody><!-- tbody starts-->
							<?php
								$i = 0;
								$get_p_cat = "select * from product_categories";
								$run_p_cat = mysqli_query($con, $get_p_cat);
								while ($row_p_cat = mysqli_fetch_array($run_p_cat)) 
								{
									$p_cat_id = $row_p_cat['p_cat_id'];
									$p_cat_title = $row_p_cat['p_cat_title'];
									$p_cat_desc = $row_p_cat['p_cat_desc'];
									$i++;
							?>
							<tr>
								<td> <?php echo $i; ?> </td>
								<td><?php echo $p_cat_title; ?></td>
								<td width="300"><?php echo $p_cat_desc; ?></td>
								<td>
									<a href="index.php?delete_p_cat=<?php echo $p_cat_id ?>">
									<i class="fa fa-trash-o"></i> Delete
									</a>
								</td>
								<td>
									<a href="index.php?edit_p_cat=<?php echo $p_cat_id ?>">
									<i class="fa fa-edit"></i> Edit
									</a>
								</td>	
							</tr>

						<?php } ?>
						</tbody><!-- tbody ends-->
					</table><!-- table table-bordered  table-hover table-striped ends-->
				</div><!-- table-responsive ends-->
			</div><!-- panel-body ends-->
		</div><!--panel panel-default ends -->
	</div><!--col-lg-12 ends-->
</div><!-- 2 row ends -->

<?php } ?>