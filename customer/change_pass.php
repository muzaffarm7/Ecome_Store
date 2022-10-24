<h1 class="center"> Create Your New Password </h1>


<form action="" method="post"><!-- form starts -->
	<div class="form-group"><!-- form-group strats-->
		<label>Enter Your Current Password: </label>
		<input type="password" name="old_pass" class="form-control" required>
	</div><!-- form-group strats-->	

	<div class="form-group"><!-- form-group strats-->
		<label>Enter Your New Password: </label>
		<input type="password" name="new_pass" class="form-control" required>
	</div><!-- form-group strats-->	

	<div class="form-group"><!-- form-group strats-->
		<label>Enter Your New Password Again: </label>
		<input type="password" name="new_pass_again" class="form-control" required>

	</div><!-- form-group strats-->

		<div class="text-center"><!-- text-center starts-->
		<button type="submit" name="update" class="btn btn-primary">
			<i class="fa fa-user-md"></i> Change Password
		</button>
	</div><!-- text-center ends-->	
</form><!-- form ends -->

<?php

	if (isset($_POST['update'])) 
	{
		$c_email = $_SESSION['customer_email'];
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$new_pass_again = $_POST['new_pass_again'];

		$sel_old_pass = "select * from customers where customer_pass='$old_pass'";
		$run_old_pass = mysqli_query($con, $sel_old_pass);
		$check_old_pass = mysqli_num_rows($run_old_pass);

		if ($check_old_pass==0) 
		{
			echo "<script>alert('Your current password not valid pls try again')</script>";
			exit();
		}
		if ($new_pass!= $new_pass_again) 
		{
			echo "<script>alert('Your password miss match')</script>";
			exit();
		}
		$update_pass = "update customers set customer_pass='$new_pass' where customer_email='$c_email'";


		$run_pass = mysqli_query($con, $update_pass);
		if ($run_pass) 
		{
			echo "<script>alert('Your password has been Successfull Change...!')</script>";
			echo "<script>window.open('my_account.php?my_orders','_self')</script>";
		}
	}

?>