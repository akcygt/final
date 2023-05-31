<?php
//connect to database
$db = mysqli_connect("localhost","root","","mysite");

if(isset($_POST['update_btn'])) {
	$id = $_POST['id'];
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$user_type = mysqli_real_escape_string($db, $_POST['user_type']);

	// Map the user type value to admin_user value
	$admin_user = ($user_type == 'Admin') ? 1 : 0;

	// Update the user's information and admin_user value
	$update_sql = "UPDATE users SET username='$username', email='$email', admin_user='$admin_user' WHERE userid='$id'";
	mysqli_query($db, $update_sql);

	// Redirect to the desired page after the update
	header("location: users");
	exit();
}
?>