<!DOCTYPE html>
<html>
<head>
	<title>E - Commerce (Product Preview)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2 mt-3">
				<h4 class="text-center">Product Preview</h4>
				<hr />
				<?php 
					$id = $_GET['id'];
					$con = mysqli_connect("localhost","root","","ecommerce");
					$sql = "SELECT * from product WHERE Product_ID='$id'";
					$result = $con->query($sql);
					$row;
					if($result->num_rows>0){
						$row = $result->fetch_assoc();
					}
				?>
				  <center>
					<img src="<?php echo $row['Product_Photo'] ?>" class="border rounded mx-auto" alt="<?php echo $row['Product_Name']?>" width="70%" height="400px" />
					<h1><?php echo $row['Product_Name']?></h1>
					<h4>Category : <?php echo $row['Product_Category']?></p>
					<p><?php echo $row['Product_Desc']?></p>
					<p>Price : <?php echo $row['Product_Price']?></p>
						<p>Quantity : <?php echo $row['Product_Quantity']?></p>
				  </center>
				 <?php 
					if(isset($_GET['isUser'])){
						echo "<a class='btn btn-info btn-block mb-3' href='add_to_cart.php?id=".$id."'>Buy Now</a>";
					}
				 ?>
			</div>
		</div>
	</div>
</body>
</html>