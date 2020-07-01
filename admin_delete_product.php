<?php 
	$con = mysqli_connect("localhost","root","","ecommerce");
	$sql = "DELETE FROM product WHERE Product_ID='{$_GET['id']}'";
	$con->query($sql);
	mysqli_close($con);
	
	header('Location:admin.php');
?>