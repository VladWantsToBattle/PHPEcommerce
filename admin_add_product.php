<!DOCTYPE html>
<html>
<head>
	<title>E - Commerce (Admin > Add Product)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 mt-3">
			<h4 class="text-center">Add Product</h4>	
			<hr />
			<form method="POST" action="admin_add_product.php" enctype="multipart/form-data">
			  <label for="name">Name :</label>
			  <input type="text" id="name" name="productName" class="form-control" required />
			  <label for="category">Category :</label>
			  <input type="text" id="category" name="productCategory" class="form-control" required />
			  <label for="description">Description : </label>
			  <textarea id="description" name="productDecscription" class="form-control" required></textarea>
			  <label for="price">Price :</label>
			  <input type="number" id="price" name="productPrice" class="form-control" required />
			  <label for="quantity">Quantity :</label>
			  <input type="number" id="quantity" name="productQuantity" class="form-control" required />
			  <label for="photo"></label>
			  <input type="file" id="photo" name="productPhoto" class="form-control" accept="image/*" required />
			  <br/>
			  <input type="submit" class="btn btn-success btn-block" value="Add" />
			  <a href="admin.php" class="btn btn-danger btn-block">Cancel</a>
			</form>
		</div>
	</div>
  </div>
</body>

</html>

<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		$name = $_POST['productName'];
		$category = $_POST['productCategory'];
		$desc = $_POST['productDecscription'];
		$price = $_POST['productPrice'];
		$qty = $_POST['productQuantity'];
		
		$target_dir = "product_photo/";
		$photodir = $target_dir.basename($_FILES["productPhoto"]["name"]); 		
		move_uploaded_file($_FILES["productPhoto"]["tmp_name"],$photodir);
		
		$con = mysqli_connect("localhost","root","","ecommerce");
		//insert photo dir
		$sql = "INSERT INTO product (Product_Name, Product_Category, Product_Desc, Product_Price, Product_Quantity, Product_Photo) VALUES ('$name','$category','$desc','$price', '$qty', '$photodir')";
		$con->query($sql);
		mysqli_close($con);
		
		header('Location:admin.php');
	}
?>
