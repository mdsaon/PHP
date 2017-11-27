<?php include_once("operation.php");?>
<?php 
if(isset($_GET["update"])){
	/* In PHP Version 5, We can use this syntax if(isset($_GET['id'])){$id=$_GET['id];}*/
	//In PHP version 7, we can use the follwing systax similar to the above line
	//$id = $_GET['id'] ?? null;
	if(isset($_GET['id'])){
	$id=$_GET['id'];	
	$where= array ('id'=>$id);
	$row = $obj->selectRowbyId("user",$where);
	}
?>
	<form action="operation.php" method="post">
	<input type="hidden" name="id" value="<?php print $row["id"]; ?>"/>
	Name:<input type="text" name="name" value="<?php print $row["name"]; ?>"/>
	Email:<input type="text" name="email" value="<?php print $row["email"]; ?>"/>
	Address:<input type="text" name="address" value="<?php print $row["address"]; ?>"/>
	<button type="submit" name="edit" value="Update"/>Update</button>
	</form>
	<?php
} else {?>
	<form action="operation.php" method="post">
	Name:<input type="text" name="name"/>
	Email:<input type="text" name="email"/>
	Address:<input type="text" name="address"/>
	<button type="submit" name="submit"/>Save</button>
	</form>
	<?php
}
?>


<table border="1">
<tr><th>Name</th><th>Email</th><th>Address</th><th>Edit</th><th>Delete</th></tr>
<?php 
$myRow=$obj->select("user");
foreach($myRow as $rows){
	   echo '<tr>';
	   echo "<td>Name: " . $rows["name"]. "</td>";
	   echo "<td>Email: " . $rows["email"]. "</td>";
	   echo "<td>Address: " . $rows["address"]. "</td>";
	   echo '<td><a href="index.php?update=1&id='.$rows["id"].'">Edit</a></td>';
	   echo '<td><a href="operation.php?delete=1&id='.$rows["id"].'">Delete</a></td>';
}

?>
</table>