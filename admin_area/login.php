<?php

	session_start();
	include("includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title> Admin Login </title>
	<link rel="stylesheet" href="css/bootstrap.min.css" >

	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="container"><!-- container statrs-->
		<form method="post" action="" class="form-login"> <!-- form Starts -->
			<h2 class="form-login-heading"> Admin Login </h2>
			<input type="text" class="form-control" name="admin_email" placeholder="Email Address" required>

			<input type="password" class="form-control" name="admin_pass" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login"> L O G I N </button>
		</form><!-- form Ends -->
	</div><!-- container ends-->

	<script src="js/jquery.min.js"></script>

	<script src="js/bootstrap.min.js"></script>
</body>
</html>


<?php

	if (isset($_POST['admin_login'])) 
	{
		$admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
		$admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);

		$get_admin = "select * from admin where admin_email='$admin_email' AND admin_pass='$admin_pass' ";

		$run_admin = mysqli_query($con, $get_admin);

		$count = mysqli_num_rows($run_admin);
		if ($count==1) 
		{
			$_SESSION['admin_email'] = $admin_email;

			echo "<script>alert(' Your Logged into the admin panel ')</script>";

			echo "<script>window.open('index.php?dashboard','_self')</script>";
		}
		else
		{
			echo "<script>alert('Email or Password wrong pls try again...!')</script>";
		}
		
	}

?>