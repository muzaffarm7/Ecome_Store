<?php

	if(!isset($_SESSION['admin_email']))
	{

	echo "<script>window.open('login.php','_self')</script>";

	}

	else 
	{

?>

<div class="row" ><!-- 1 row Starts -->
	<div class="col-lg-12" ><!-- col-lg-12 Starts --> 
		<ol class="breadcrumb"><!-- breadcrumb Starts -->
			<li class="active">
				<i class="fa fa-dashboard" ></i> Dashboard / View Slide
			</li>
		</ol><!-- breadcrumb Ends -->
	</div><!-- col-lg-12 Ends --> 
</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->
	<div class="col-lg-12" ><!-- col-lg-12 Starts -->
		<div class="panel panel-default" ><!-- panel panel-default Starts -->
			<div class="panel-heading" ><!-- panel-heading Starts -->
				<h3 class="panel-title" >
				<i class="fa fa-money fa-fw"></i> View Slide
				</h3>
			</div><!-- panel-heading Ends -->

			<div class="panel-body"><!-- panel-body starts-->
				<?php
					$get_slides = "select * from slider";
					$run_slides = mysqli_query($con, $get_slides);
					while ($row_slide=mysqli_fetch_array($run_slides)) 
					{
						$slide_id = $row_slide['slide_id'];
						$slide_name = $row_slide['slide_name'];
						$slide_image = $row_slide['slide_image']; 
					
				?>
				<div class="col-lg-3 col-md-3"><!-- col-lg-3 col-md-3 starts-->
					<div class="panel panel-primary"><!-- panel panel-primary starts -->
						<div class="panel-heading"><!-- panel-heading starts-->
							<h3 class="panel-title" align="center"><!-- panel-title starts-->
								<?php echo $slide_name; ?>

							</h3><!-- panel-title ends-->
						</div><!-- panel-heading ends-->

						<div class="panel-body"><!-- panel-body starts-->		
							<img src="slides_images/<?php echo $slide_image; ?>" class="img-responsive">
						</div><!-- panel-body ends-->

						<div class="panel-footer"><!-- panel-footer starts-->
							<center><!-- center starts-->
								<a href="index.php?delete_slide=<?php echo $slide_id;?>" class="pull-left">
									<i class="fa fa-trash-o"></i> Delete 
								</a>

								<a href="index.php?edit_slide=<?php echo $slide_id;?>" class="pull-right">
									<i class="fa fa-edit"></i> Edit
								</a>

								<div class="clearfix">
									
								</div>
							</center><!-- center ends-->
						</div><!-- panel-footer ends-->
					</div><!-- panel panel-primary ends -->
				</div><!-- col-lg-3 col-md-3 ends-->

				<?php } ?>
			</div><!-- panel-body ends-->
		</div><!-- panel panel-default Ends -->
	</div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->		


<?php } ?>