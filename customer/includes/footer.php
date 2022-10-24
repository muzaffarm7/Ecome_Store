<div id="footer"><!--Footer starts-->
	<div class="container"><!--container starts-->
		<div class="row"><!--row starts -->
			<div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 starts-->
				<h4 class="text-left">Pages</h4>
				<ul class="text-left"><!--ul starts-->
					<li><a href="../cart.php">Shopping Cart</a></li>
					<li><a href="../contact.php">Contact Us</a></li>
					<li><a href="../shop.php">Shop</a></li>
					<li><?php

						if(!isset($_SESSION['customer_email'])){

						echo "<a href='../checkout.php' >My Account</a>";

						}
						else
						{

						echo "<a href='my_account.php?my_orders'> My Account </a>";

						}


						?></li>
				</ul><!--ul ends-->
				<hr>
				<h4 class="text-left">User Section</h4>
				<ul class="text-left"><!--ul starts-->
					<li><?php

						if(!isset($_SESSION['customer_email'])){

						echo "<a href='../checkout.php' >Login</a>";

						}
						else
						{

						echo "<a href='my_account.php?my_orders'> My Account </a>";

						}


						?></li>
					<li><a href="../customer_register.php">Ragister</a></li>

					<li><a href="../terms.php">Terms And Conditions</a></li>

				</ul><!--ul ends-->
				<hr class="hidden-md hidden-lg hidden-sm">
			</div><!--col-md-3 col-sm-6 ends-->
			<div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 starts-->
				<h4 class="text-left">Top Products Categories </h4>
				<ul class="text-left"><!--ul starts-->
					<?php
						$get_p_cats = "select * from product_categories";
						$run_p_cats = mysqli_query($con,$get_p_cats);
						while ($row_p_cats = mysqli_fetch_array($run_p_cats)) 
						{
							$p_cat_id = $row_p_cats['p_cat_id'];
							$p_cat_title = $row_p_cats['p_cat_title'];

							echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title</a></li>";
						}
					?>
				</ul><!--ul ends-->
				<hr class="hidden-md hidden-lg">
			</div><!--col-md-3 col-sm-6 ends-->

			<div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 starts-->
				<h4 class="text-left">Where to find Us</h4>
				<p class="text-left"><!--P starts-->
					<strong>ComputerServer Ltd</strong>
					<br>Nomaniya Colony
					<br>India
					<br>+91-8698779992
					<br>muzaffarm7@gmail.com
					<br>
					<strong>Mohammad Muzaffaruddin Mumtazuddin</strong>
				</p><!--P ends-->
				<a href="../contact.php">Go to Contact Us page</a>
			</div><!--col-md-3 col-sm-6 ends-->
			<hr class="hidden-md hidden-lg">
			<div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 starts-->
				<h4 class="text-left
				">Get The News</h4>
				<p class="text-muted text-left">
					Pellentesque habitant morbi tristique senectus at netus malesuada fames ac turpis egestas.
				</p>
				<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=computerfever', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><!--Form strats -->
					<div class="input-group"><!--input-group strats --> 
						<input type="text" class="form-control" name="email">
						<input type="hidden" value="computerfever" name="uri"/>
						<input type="hidden" name="loc" value="en_US"/>
						<span class="input-group-btn"><!--input-group-btn starts-->
							<input type="submit" value="Subscribe" class="btn btn-default">
						</span><!--input-group-btn ends-->
					</div><!--input-group ends -->
				</form><!--Form ends -->
				<hr>
				<h4 class="text-left"> Stay in touch </h4>
				<p class="social"><!-- social starts -->
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-google-plus"></i></a>
					<a href="#"><i class="fa fa-envelope"></i></a>
				</p><!-- social ends -->
			</div><!--col-md-3 col-sm-6 ends-->
		</div><!--row ends -->
	</div><!--container ends-->
</div><!--Footer ends-->


<div id="copyright"><!--copyright starts-->
	<div class="container"><!-- container strats-->
		<div class="col-md-6"><!--col-md-6 strats-->
			<p class="pull-left text-left"> &copy; 2020 Mohammad Muzaffaruddin Mumtazuddin</p>
		</div><!--col-md-6 ends-->
		<div class="col-md-5"><!--col-md-6 strats-->
			<p class="pull-right">
				Template by <a href="http://www.ComputerServer.com">ComputerServer.com</a>
			</p>
		</div><!--col-md-6 ends-->
	</div><!-- container ends-->
</div><!--copyright ends-->