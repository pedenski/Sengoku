<?php 
// Activity manipulation
// Insert
// Delete
// Update 
// Edit
// Search 



class Activity {

	private $conn;
	//vars from form
	private $ActyTitle;
	private $UserID = "zild";
	private $SeverityID;
	private $CategoryID;
	private $LastID;

	public function __construct($db)
	{
		$this->conn 		= $db->getConn();
		$this->ActyTitle	= $_POST['title'];
		//$this->UserID		= $_POST['title'];
		$this->SeverityID 	= $_POST['severity'];
		$this->CategoryID 	= $_POST['category'];
	}


	public function New_Activity()
	{
	

		$q = "INSERT INTO activity_titles
			  SET
			  ActyTitle 	=	:ActyTitle,
			  UserID		=	:UserID,
			  SeverityID	=	:SeverityID,
			  CategoryID	=	:CategoryID";
	
		$sql = $this->conn->prepare($q);
		$sql->bindParam(":ActyTitle", $this->ActyTitle);
		$sql->bindParam(":UserID", $this->UserID);
		$sql->bindParam(":SeverityID", $this->SeverityID);
		$sql->bindParam(":CategoryID", $this->CategoryID);

		$sql->execute();
		return $this->lastid = $this->conn->lastInsertID();
	}



}









 ?>