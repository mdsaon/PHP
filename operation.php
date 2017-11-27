<?php
include_once("dbConfig.php");
class dalUser extends Database{
	//Function for Insertion
	public function insert($fields,$table){
	//insert into TableName(,,)Values('','');	
	$sql ="";
    $sql .="INSERT INTO ".$table;	
	$sql .="(".implode(",",array_keys($fields)).") VALUES ";
	$sql .="('".implode("','",array_values($fields))."')";
	$query=mysqli_query($this->connection,$sql);
    if($query){
		return true;
	}
  }
  
  //Function for Selection
  public function select($table){
	  $sql="SELECT * From ".$table;
	  $array=array();
	  $result=mysqli_query($this->connection,$sql);
	  while($row=mysqli_fetch_assoc($result)){
		  $array[]=$row;
	  }
	  return $array;
  }
  
  //Function for Selecting individual row by ID
  public function selectRowbyId($table,$where){
	  $sql="";
	  $condition="";
	  foreach($where as $key =>$value){
		  //id= '' AND name= '' AND email= '' AND
		  $condition .= $key . "='" .$value. "' AND ";
	  }
	  $condition= substr($condition,0, -5);
	  $sql .="SELECT * FROM ".$table." WHERE ".$condition;
	  $query = mysqli_query($this->connection,$sql);
	  $row = mysqli_fetch_array($query);
	  return $row;
  }
  
  //Function for Saving the Data While Updating
  public function update($table,$where,$fields){
	  $sql ="";
	  $condition ="";
	  foreach($where as $key =>$value){
		  //id= '' AND name= '' AND email= '' AND
		  $condition .= $key . "='" . $value . "' AND ";
	  }
	  $condition= substr($condition,0, -5);
	  foreach($fields as $key =>$value) {
		  //Update Table SET name= '', email= '', address= '' WHERE id = '' ;
		  $sql .= $key ."='".$value."', ";
	  }
	  $sql=substr($sql,0,-2);
	  $sql = "UPDATE ".$table." SET ". $sql. " WHERE ".$condition;
	  if(mysqli_query($this->connection,$sql)){
		  return true;
	  }
   }
   
   //Function for Delete each row
   public function delete($table,$where){
	   $sql ="";
	  $condition ="";
	  foreach($where as $key =>$value){
		  $condition .= $key . "='" . $value . "' AND ";
	  }
	  $condition= substr($condition,0, -5);
	  $sql = "DELETE FROM ".$table." WHERE ".$condition;
	  if(mysqli_query($this->connection,$sql)){
		  return true;
	  }
   }
}

//Instantiation the Class dalUser Here
$obj=new dalUser;
	//Code to check the database fields
	if(isset($_POST['submit'])){
	 $allFields=array(
		 "name"=>$_POST['name'],
		 "email"=>$_POST['email'],
		 "address"=>$_POST['address']
	);
	if($obj->insert($allFields,"user")){
		header("Location:index.php?msg=Data Inserted");
	}
}

	//Code to check the database fields while editing
	if(isset($_POST['edit'])){
	 $id=$_POST['id'];
     $where=array("id"=>$id); 	 
	 $allFields=array(
		 "name"=>$_POST['name'],
		 "email"=>$_POST['email'],
		 "address"=>$_POST['address']
	);
	if($obj->update("user",$where,$allFields)){
		header("Location:index.php?msg=Data Updated");
	}
}

//Code to check the delete Field
if(isset($_GET['delete'])){
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$where=array("id" => $id);
		if($obj->delete("user",$where)){
		header("Location:index.php?msg=Data Deleted");
	}
		
	}
	
}

?>