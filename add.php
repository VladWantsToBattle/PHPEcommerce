<?php
	$con=mysqli_connect("localhost","root","","ecommerce");
	$sql="update cart set quantity=quantity + 1 where Cart_ID='{$_GET['id']}'";
	$con->query($sql);
	mysqli_close($con);
	header("Location:my_cart.php");
?>
