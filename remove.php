<?php
	$con=mysqli_connect("localhost","root","","ecommerce");
	$sql="delete from cart where Cart_ID='{$_GET['id']}'";
	$con->query($sql);
	header("Location:my_cart.php");
?>
