<!DOCTYPE html>
<html>
	<head>
		<title>E - Commerce</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand mr-auto" href="#">
				Name of my Company
			</a>			  
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="my_cart.php" target="_blank">My Cart</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="admin.php">Administrator</a>
				</li>
			</ul>  
		</nav>	
		<div class="container mt-3">
			<div class=row>
				<div class="col-lg-2">
				
					<form method="GET" action="index.php">
					<label for="sCategory">Category : </label>
					<ul class="list-group">
						<a class="list-group-item <?php if(!isset($_GET['category'])) { echo "active"; }?>" href="index.php">All</a>
						<?php
						$con = mysqli_connect("localhost","root","","ecommerce");
						$sql = "SELECT DISTINCT(Product_Category) FROM `product`";
						$result = $con->query($sql);
						
						
						if($result->num_rows>0){
							while($row = $result->fetch_assoc()){
								if(isset($_GET['category']) && $row['Product_Category'] == $_GET['category']){
									echo "<a href=index.php?category=".urlencode($row['Product_Category'])." class='list-group-item active'>{$row['Product_Category']}</a>";
								}else{
									echo "<a href=index.php?category=".urlencode($row['Product_Category'])." class='list-group-item'>{$row['Product_Category']}</a>";
								}
							}
						}
						?>
					</ul>
				</div>
				<div class="col-md-10">
					<?php 
						
						$sql = "SELECT * from product";
						if(isset($_GET['category'])){
							$sql = $sql." WHERE Product_Category = '{$_GET['category']}'";
						}
						$result = $con->query($sql);
						echo "<div class='row'>";
						if($result->num_rows>0){
							while($row = $result->fetch_assoc()){
								echo "<div class='col-lg-3 border border-info p-3 rounded'>";
								echo "<img src={$row['Product_Photo']} alt={$row['Product_Name']} class='border rounded' width='100%' height='200px' />";
								echo "<h3 class='text-center'>{$row['Product_Name']}</h3>";
								echo "<p class='text-center'> Php : {$row['Product_Price']}</p>";
								echo "<p class='text-center'> Stock : {$row['Product_Quantity']}</p>";
								echo "<center><a class='btn btn-info btn-block' target='_blank' href='product_preview.php?id={$row['Product_ID']}&isUser=true'>Preview</a>";							
								echo "</div>";
							}
						}
						echo "</div>";
						mysqli_close($con);
					?>
				</div>
			</div>
		</div>	
	</body>
</html>