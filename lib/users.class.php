<?php 
include_once('database.class.php');

class Users {

	private $conn;
	private $UserName;
	private $Password;
	private $UserArr; //returns all details of particular user



	public function __construct()
	{
		$db = new Database();	
		$this->conn = $db->getConn();
	}

	public function Get_User_Listing()
	{
		$q = "SELECT UserName FROM users";
		$sql = $this->conn->prepare($q);
		$sql->execute();
		return $row = $sql->fetchALL(PDO::FETCH_ASSOC);
	}


	public function GetUser($UserID)
	{
		$this->Query_Username($UserID);
		return $this->UserName;
	}

	public function GetUserData()
	{
		return $this->UserArr;
	}


	public function Query_Username($UserID)
	{
		$q = "SELECT UserName FROM users where UserID = ? ";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $UserID);	
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$this->UserName = $row['UserName'];
	}


	/*
	 * LOGIN 
	 */

	public function Login($username, $password)
	{
		$this->UserName = $username;
		$this->Password = $password; 
	

		
		$UserArr = $this->Check_Cred();
		if($UserArr) //if true
		{
			$this->UserArr = $UserArr;
			$_SESSION['SESSID'] = $UserArr['UserID'];
			$_SESSION['SESSNAME'] = $UserArr['UserName'];

			//update login date
			$q = "UPDATE users  SET `LastLogin` = now() WHERE UserID = ?";
			$sql = $this->conn->prepare($q);
			$sql->bindParam(1, $UserArr['UserID']);
			$sql->execute();

			return $UserArr['UserID'];
		}

		return false;
	}

	public function Check_Cred() 
	{
		$q = "SELECT * FROM users WHERE UserName = ? AND Password = ?";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $this->UserName);
		$sql->bindParam(2, $this->Password);
		$sql->execute();

		if($sql->rowCount() > 0 ) 
		{
			$UserArr = $sql->fetch(PDO::FETCH_ASSOC);
			return $UserArr;
		}	


	}

	public function LastLogged() 
	{
		$q = "SELECT UserName FROM `users` WHERE DATE(`LastLogin`) = CURDATE()";
		$sql = $this->conn->prepare($q);
		$sql->execute();
		return $row = $sql->fetchAll(PDO::FETCH_ASSOC);
	}

}













 ?>