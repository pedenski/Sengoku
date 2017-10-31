<?php 

class Activity {

	private $conn;
	//vars from form
	public $ActyTitle;
	public $UserID = "1";
	public $SeverityID;
	public $CategoryID;
	public $Textarea;

	
	private $LastID; //so tags can access this

	public function __construct($db)
	{
		$this->conn = $db->getConn();
	}

	public function Execute_Insert()
	{
		
		$this->New_Activity();
		return $this->LastID;
	}


	public function New_Activity()
	//insert title, id, severity, category and author
	{
		$q = "INSERT INTO activity_titles SET
			  ActyTitle 	=	:ActyTitle,
			  UserID		=	:UserID,
			  SeverityID	=	:SeverityID,
			  CategoryID	=	:CategoryID";
		$sql = $this->conn->prepare($q);

		$sql->bindParam(":ActyTitle", 	$this->ActyTitle);
		$sql->bindParam(":UserID",		$this->UserID);
		$sql->bindParam(":SeverityID",	$this->SeverityID);
		$sql->bindParam(":CategoryID",	$this->CategoryID);
		$sql->execute();

		$this->LastID =  $this->conn->lastInsertID();  //get last id
		$this->Insert_Activity_Detail(); // execute insert of textarea
	}


	public function Insert_Activity_Detail()
	//insert textarea info
	{
		$q = "INSERT INTO activity_details SET
			  ActyID 		= :ActyID,
			  DetailText 	= :DetailText";
		$sql = $this->conn->prepare($q);

		$sql->bindParam("ActyID", 		$this->LastID);
		$sql->bindParam("DetailText",	$this->Textarea);
		$sql->execute();
	}


	/* 
	 * SELECT SECTION 
	 */


	public function Get_Title_Listing()
	//get all titles
	{
		$q = "SELECT * FROM activity_titles";
		$sql = $this->conn->prepare($q);
		$sql->execute();
		return $row = $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	

	public function Get_Activity_Detail($ActyID)
	{
		$q = "SELECT * FROM activity_details WHERE ActyID =".$ActyID;
		$sql = $this->conn->prepare($q);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$this->textarea = $row['DetailText'];
	}

	















}









 ?>