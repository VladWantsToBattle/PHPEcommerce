<?php
	$con=mysqli_connect("localhost","root","","ecommerce");
	$sql="select * from cart where Product_ID='{$_GET['id']}'";
	$result=$con->query($sql);
	if($result->num_rows>0){
		echo "<a href='my_cart.php'>The product is already in your cart. Click here to go to cart</a>";
	}
	else{
		$sql="INSERT into cart VALUES(0,'{$_GET['id']}','1')"; 
		$con->query($sql);
		echo "<a href='my_cart.php'>The product is added to your cart. Click here to go to cart</a>";
	}

	mysqli_close($con);
?>