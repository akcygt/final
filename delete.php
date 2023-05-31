<?php
	//connect to database
	$db=mysqli_connect("localhost","root","","mysite");

	//get userid from URL parameter
	$userid=$_GET['id'];

	//delete user from database
	$sql="DELETE FROM users WHERE userid=$userid";
	mysqli_query($db,$sql);

	//redirect to members page
	header("Location: users");
	exit();
?>