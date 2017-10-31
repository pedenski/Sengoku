<?php 

class Users {

	private $conn;
	


	public function __construct($db)
	{
		$this->conn = $db->getConn();
	}

	public function Get_User_Names()
	{
		$q = "SELECT UserName FROM users";
		$sql = $this->conn->prepare($q);
		$sql->execute();
		return $row = $sql->fetchALL(PDO::FETCH_ASSOC);
	}



}













 ?>