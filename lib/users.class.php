<?php 

class Users {

	private $conn;
	public $UserName;


	public function __construct($db)
	{
		$this->conn = $db->getConn();
	}

	public function Get_User_Listing()
	{
		$q = "SELECT UserName FROM users";
		$sql = $this->conn->prepare($q);
		$sql->execute();
		return $row = $sql->fetchALL(PDO::FETCH_ASSOC);
	}

	public function Get_Username($UserID)
	{
		$q = "SELECT UserName FROM users where UserID = ? ";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $UserID);	
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$this->UserName = $row['UserName'];
	}



}













 ?>