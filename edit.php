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
	$sql="update user set name='".$name."',email='".$email."',address='".$address."' where id= ".$_GET['id'];
	$result=mysqli_query($conn,$sql);
	if($result){
		echo "Data Updated";
		$name="";
		$email="";
		$address="";
	}
}else{
	$sql="select *from user where id = ".$_GET['id'];
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_assoc($result)){
		$name=$row["name"];
		$email=$row["email"];
		$address=$row["address"];
	}
}
?>
<form action="" method="post">
Name:<input type="text" name="name" value="<?php print $name; ?>"/></br>
Email:<input type="text" name="email" value="<?php print $email; ?>"/></br>
Address:<input type="text" name="address" value="<?php print $address; ?>"/></br>
<button type="submit" name="submit"/>Save</button>
</form>