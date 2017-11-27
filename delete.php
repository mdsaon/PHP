<?php
$servername = "localhost";
$username = "root";
$password = "111111";
$dbname = "dbcrud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_GET['id']))
{
	$sql = "delete from user where id = ".$_GET['id'];
	if(mysqli_query($conn,$sql))
	{
		print '<span class="success">Data Deleted</span>';	
	}
	else
	{
		print '<span class="error">'.mysqli_error().'</span>';	
	}
}
?>