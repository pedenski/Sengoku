<?php 

class Activity {

	private $conn;

	//vars from form
	public $ActyTitle; //title
	public $UserID = "1"; //user
	public $SeverityID; //severity
	public $CategoryID; //category
	public $ActyStartDate; //activity date
	public $Textarea; //textarea
	public $AreaID;

	
	private $LastID; //so tags can access this

	public function __construct($db)
	{
		$this->conn = $db->getConn();
	}

	public function Execute_Insert()
	//insert new activity
	{
		$this->New_Activity();
		return $this->LastID;
	}


	public function New_Activity()
	//insert title, id, severity, category and author
	{


		$q = "INSERT INTO activity_titles 
				( ActyTitle,  UserID,  CategoryID,  SeverityID,  AreaID,  ActyStartDate) VALUES 
				(:ActyTitle, :UserID, :CategoryID, :SeverityID, :AreaID, :ActyStartDate) ";
					

		$sql = $this->conn->prepare($q);

		$sql->bindParam(':ActyTitle', 	$this->ActyTitle);
		$sql->bindParam(':UserID',		$this->UserID);
		$sql->bindParam(':CategoryID',	$this->CategoryID);
		$sql->bindParam(':SeverityID',	$this->SeverityID);
		$sql->bindParam(':AreaID',		$this->AreaID);
		$sql->bindParam(':ActyStartDate',	$this->ActyStartDate);

		$sql->execute();
		
		
		$this->LastID =  $this->conn->lastInsertID();  //get last id
		$this->Insert_Activity_Detail(); // execute insert of textarea
		return $sql->errorCode();
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

	public function Get_Title_Data($ActyID)
	{
		$q = "SELECT * FROM activity_titles WHERE ActyID =".$ActyID;
		$sql = $this->conn->prepare($q);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$this->ActyTitle = $row['ActyTitle'];
		$this->SeverityID = $row['SeverityID'];
		$this->CategoryID = $row['CategoryID'];
		$this->UserID = $row['UserID'];
		$this->ActyStartDate = $row['ActyStartDate'];
	}














}









 ?>