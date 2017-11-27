<?php
class Database{
	private $servername="localhost";
	private $username="root";
	private $password="111111";
	private $dbname="dbcrud";
	public $connection;
	
	public function __construct(){
		if(!isset($this->connection)){
			$this->connection=mysqli_connect($this->servername,$this->username,$this->password,$this->dbname);
			if(!$this->connection){
				echo "Cannot Connect to DateBase";
			}
		}
		return $this->connection;
	}
	
}
$obj=new Database;
?>