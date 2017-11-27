<?php
$servername = "localhost";
$username = "root";
$password = "111111";
$dbname = "dbcrud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$name="";
$email="";
$address="";
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$sql = "INSERT INTO user (name,email,address)
	VALUES ('".$name."','".$email."','".$address."')";
	if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>
<form action="" method="post">
Name:<input type="text" name="name"/></br>
Email:<input type="text" name="email"/></br>
Address:<input type="text" name="address"/></br>
<button type="submit" name="submit"/>Save</button>
</form>