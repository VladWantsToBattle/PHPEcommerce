<!DOCTYPE html>
<html>
<head>
	<title>E - Commerce (Admin)</title>
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
				<a class="nav-link" href="admin_add_product.php">Add Product</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php">Logout</a>
			</li>
		</ul>  
	</nav>
	<div class="container mt-3">
	<?php 
		$con = mysqli_connect("localhost","root","","ecommerce");
		$sql = "SELECT * from product";
		$result = $con->query($sql);
		echo "<div class='row'>";
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				echo "<div class='col-lg-3 border border-info p-3 rounded'>";
				echo "<img src={$row['Product_Photo']} alt={$row['Product_Name']} class='border rounded' width='100%' height='200px' />";
				echo "<h2 class='text-center'>{$row['Product_Name']}</h2>";
				echo "<p class='text-center'> Php : {$row['Product_Price']}</p>";
				echo "<p class='text-center'> Stock : {$row['Product_Quantity']}</p>";
				echo "<center><a class='btn btn-info mr-1' target='_blank' href='product_preview.php?id={$row['Product_ID']}'>Preview</a>";
				echo "<a class='btn btn-success mr-1' href='admin_edit_product.php?id={$row['Product_ID']}'>Edit</a>";
				echo "<a class='btn btn-danger' href='admin_delete_product.php?id={$row['Product_ID']}'>Delete</a></center>";
				echo "</div>";
			}
		}
		echo "</div>";
	?>
	</div>
	</body>
</html>
