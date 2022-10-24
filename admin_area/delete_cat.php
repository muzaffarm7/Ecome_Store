<?php 

	if (!isset($_SESSION['admin_email'])) 
	{
		echo "<script>window.open('login.php','_self')</script>";
	}
	else
	{


?>

<?php 

	if (isset($_GET['delete_cat'])) 
	{
		$delete_cat_id = $_GET['delete_cat'];
		$delete_cat = "delete from categories where cat_id='$delete_cat_id'"; 
		$run_cat = mysqli_query($con, $delete_cat);

		if ($run_cat) 
		{
			echo "<script>alert('One Category has been deteted..!')</script>";
			echo "<script>window.open('index.php?view_cat','_self')</script>";
		}
	}

?>

<?php } ?>