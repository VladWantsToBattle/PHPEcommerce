<!DOCTYPE html>
<html>
<head>
	<title>E - Commerce (My Cart)</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="row">
		<div class="col-md-8 offset-md-2 mt-3">
			<h4 class="text-center">My Cart</h4>
			<hr />
			<?php 
				$con = mysqli_connect("localhost","root","","ecommerce");
				$sql="SELECT * from cart c join product p on c.Product_ID=p.Product_ID";
				$result = $con->query($sql);
				if($result->num_rows>0){
					echo "<table border=2 class='table'><tr><th>Product name</th><th>Price</th><th>Quantity</th><th>Sub Total</th><th>Options</th></tr>";
					$total = 0;
					while($row=$result->fetch_assoc()){ 
						echo "<tr><td>{$row['Product_Name']}</td>";
						echo "<td>{$row['Product_Price']}</td>";
						echo "<td>{$row['Quantity']}</td>";
						echo "<td>".$row['Product_Price']*$row['Quantity']."</td>";
						echo "<td>";
						echo "<a href='add.php?id={$row['Cart_ID']}'> + </a>";
						echo "<a href='minus.php?id={$row['Cart_ID']}'> - </a>";
						echo "<a href='remove.php?id={$row['Cart_ID']}' style='color:red'> Remove </a>";
						echo "</td></tr>";
						$total = $total+($row['Product_Price']*$row['Quantity']);
					}
					echo "<tr><td colspan=5>Total : ₱{$total}</td></tr></table>";
				}else{
					echo "<center><div><h4>You have no product on your cart</h4></div></center>";
				}
			?>
		</div>
	</div>
  </div>
</body>
</html>
