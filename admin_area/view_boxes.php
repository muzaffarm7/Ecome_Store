<?php 

	if (!isset($_SESSION['admin_email'])) 
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{



?>


<div class="row"><!-- 1 row starts -->
	<div class="col-lg-12"><!-- col-lg-12 starts-->
		<ol class="breadcrumb"><!-- breadcrumb starts-->
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Box 
			</li>
		</ol><!-- breadcrumb ends-->
	</div><!-- col-lg-12 ends-->
</div><!-- 1 row starts -->

<div class="row"><!-- 2 row starts-->
	<div class="col-lg-12"><!-- col-lg-12 starts-->
		<div class="panel panel-default"><!-- panel panel-default starts-->
			<div class="panel-heading"><!-- panel-heading starts-->
				<div class="panel-title"><!-- panel-title starts-->
					<i class="fa fa-money fa-fw"></i> View Box
				</div><!-- panel-title ends-->
			</div><!-- panel-heading ends-->

			<div class="panel-body"><!--panel-body starts-->
				<?php 

					$get_boxes = "select * from boxes_section";
					$run_boxes = mysqli_query($con, $get_boxes);
					while ($row_boxes = mysqli_fetch_array($run_boxes)) 
					{
						
						$box_id = $row_boxes['box_id'];
						$box_title = $row_boxes['box_title'];
						$box_desc = $row_boxes['box_desc'];

				?>
					    <div class="col-lg-4 col-md-4"><!-- col-lg-4 col-md-4 starts-->
					    	<div class="panel panel-primary"><!--panel panel-primary starts-->
					    		<div class="panel panel-heading"><!-- panel panel-heading starts-->
					    			 <h3 class="panel-title" align="center"><!--panel-title starts-->
					    			 	<?php echo $box_title; ?>
					    			 </h3><!--panel-title ends-->
					    		</div><!-- panel panel-heading ends-->

					    		<div class="panel-body"><!-- panel-body starts-->
					    			<?php echo $box_desc; ?>
					    		</div><!-- panel-body ends-->

					    		<div class="panel-footer"><!-- panel-footer starts-->
					    			<a href="index.php?delete_box=<?php echo $box_id; ?>" class="pull-left">
					    				<i class="fa fa-trash-o"></i> Delete
					    			</a> 
					    			<a href="index.php?edit_box=<?php echo $box_id; ?>" class="pull-right">
					    				<i class="fa fa-edit"></i> Edit
					    			</a> 
					    			<div class="clearfix"></div>
					    		</div><!-- panel-footer ends-->

					    	</div><!--panel panel-primary ends-->
					    </div><!-- col-lg-4 col-md-4 ends--> 

			<?php } ?>
			</div><!--panel-body ends-->
		</div><!-- panel panel-default ends-->
	</div><!-- col-lg-12 ends-->
</div><!-- 2 row starts-->



<?php } ?>