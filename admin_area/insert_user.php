<?php 

	if (!isset($_SESSION['admin_email'])) 
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{



?>

<div class="row"><!-- 1 row starts-->
	<div class="col-lg-12"><!-- col-lg-12 starts-->
		<ol class="breadcrumb"><!-- breadcrumb starts -->
			<li>
				<i class="fa fa-dashboard"></i> Dashboard / User / Insert User
			</li>
		</ol><!-- breadcrumb ends -->
	</div><!-- col-lg-12 ends-->
</div><!-- 1 row ends-->

<div class="row"><!-- 2 row Starts -->
	<div class="col-lg-12"><!-- col-lg-12 Starts -->
		<div class="panel panel-default"><!-- panel panel-default Starts -->
			<div class="panel-heading" ><!-- panel-heading Starts -->
			<h3 class="panel-title" ><!-- panel-title Starts -->
				<i class="fa fa-money fa-fw" ></i> Insert User
			</h3><!-- panel-title Ends -->
			</div><!-- panel-heading Ends -->
			
			<div class="panel-body"><!-- panel-body starts-->
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label" >User Name: </label>
						<div class="col-md-6" >

						<input type="text" name="admin_name" class="form-control" >
						</div>
					</div><!-- form-group Ends -->

					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label" >User Email: </label>
						<div class="col-md-6" >

						<input type="text" name="admin_email" class="form-control" >
						</div>
					</div><!-- form-group Ends -->

					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label" >Password: </label>
						<div class="col-md-6" >

						<input type="password" name="admin_pass" class="form-control" >
						</div>
					</div><!-- form-group Ends -->

					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label" >User Country: </label>
						<div class="col-md-6" >

						<input type="text" name="admin_country" class="form-control" >
						</div>
					</div><!-- form-group Ends -->

					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label" >User Job: </label>
						<div class="col-md-6" >

						<input type="text" name="admin_job" class="form-control" >
						</div>
					</div><!-- form-group Ends -->

					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label" >User Contact: </label>
						<div class="col-md-6" >

						<input type="text" name="admin_contact" class="form-control" >
						</div>
					</div><!-- form-group Ends -->

					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label" >User About: </label>
						<div class="col-md-6" >

						<textarea name="admin_about" class="form-control" rows="3"></textarea>
						</div>
					</div><!-- form-group Ends -->

					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label" >User Image: </label>
						<div class="col-md-6" >

						<input type="file" name="admin_image" class="form-control" >
						</div>
					</div><!-- form-group Ends -->


					<div class="form-group" ><!-- form-group Starts -->
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
						<input type="submit" name="submit" value="Insert User" class=" btn btn-primary form-control" >
						</div>
					</div><!-- form-group Ends -->
				</form><!-- form-horizontal ends -->
			</div><!-- panel-body ends-->
		</div><!-- panel panel-default Ends -->
	</div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->

<?php 

	if (isset($_POST['submit'])) 
	{
		$admin_name = $_POST['admin_name'];
		$admin_email = $_POST['admin_email'];
		$admin_pass = $_POST['admin_pass'];
		$admin_country = $_POST['admin_country'];
		$admin_job = $_POST['admin_job'];
		$admin_contact = $_POST['admin_contact'];
		$admin_about = $_POST['admin_about'];
		$admin_image = $_FILES['admin_image']['name'];
		$temp_admin_image = $_FILES['admin_image']['tmp_name'];
		move_uploaded_file($temp_admin_image, "admin_images/$admin_image");

		$insert_admin = "insert into admin (admin_name, admin_email, admin_pass, admin_image, admin_contact, admin_country, admin_job, admin_about) values ('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_contact','$admin_country','$admin_job','$admin_about')";
		$run_admin = mysqli_query($con, $insert_admin);

		if ($run_admin) 
		{
			echo "<script>alert('New User has been Inserted Successfully...!')</script>";
			echo "<script>window.open('index.php?view_users','_self')</script>";
		}
	}

 ?>


<?php } ?>