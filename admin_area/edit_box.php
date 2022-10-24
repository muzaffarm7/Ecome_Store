<?php 

	if (!isset($_SESSION['admin_email'])) 
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{



?>

<?php 

	if (isset($_GET['edit_box'])) 
	{
		$edit_box_id = $_GET['edit_box'];
		$edit_box_query ="select * from boxes_section where box_id='$edit_box_id'";
		$run_edit = mysqli_query($con, $edit_box_query);
		$row_edit = mysqli_fetch_array($run_edit);
		$box_id = $row_edit['box_id'];
		$box_title = $row_edit['box_title'];
		$box_desc = $row_edit['box_desc'];
	}

?>

<div class="row"><!-- 1 row starts -->
	<div class="col-lg-12"><!-- col-lg-12 starts-->
		<ol class="breadcrumb"><!-- breadcrumb starts-->
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / Edit Box 
			</li>
		</ol><!-- breadcrumb ends-->
	</div><!-- col-lg-12 ends-->
</div><!-- 1 row starts -->

<div class="row"><!-- 2 row starts-->
	<div class="col-lg-12"><!-- col-lg-12 starts-->
		<div class="panel panel-default"><!-- panel panel-default starts-->
			<div class="panel-heading"><!-- panel-heading starts-->
				<div class="panel-title"><!-- panel-title starts-->
					<i class="fa fa-money fa-fw"></i> Edit Box
				</div><!-- panel-title ends-->
			</div><!-- panel-heading ends-->

			<div class="panel-body"><!--panel-body starts-->
				<form class="form-horizontal" action="" method="post" ><!-- form-horizontal Starts -->
					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label" >Box Title</label>
						<div class="col-md-6" >

						<input type="text" name="box_title" class="form-control" value="<?php echo $box_title; ?>">
						</div>
					</div><!-- form-group Ends -->

					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label" >Box Description</label>
						<div class="col-md-6" >
							<textarea type="text" name="box_desc" class="form-control" >
								<?php echo $box_desc; ?>
							</textarea>
						</div>
					</div><!-- form-group Ends -->

					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label" ></label>
						<div class="col-md-6" >
							<input type="submit" name="update" value="Update Box" class="btn btn-primary form-control" >
						</div>
					</div><!-- form-group Ends -->
				</form><!-- form-horizontal Ends -->
			</div><!--panel-body ends-->
		</div><!-- panel panel-default ends-->
	</div><!-- col-lg-12 ends-->
</div><!-- 2 row starts-->

<?php

	if (isset($_POST['update'])) 
	{
		$box_title = $_POST['box_title'];
		$box_desc = $_POST['box_desc'];

		$update_box = "update boxes_section set box_title='$box_title',box_desc='$box_desc' where box_id='$box_id'";

		$run_box = mysqli_query($con, $update_box);
		if ($run_box) 
		{
			echo "<script>alert('New Box has been Updated Successfull....!')</script>";
			echo "<script>window.open('index.php?view_boxes','_self')</script>";
		}
	}

?>



<?php } ?>