<?php 
include_once('database.class.php');

class Activity {

	private $conn;

	//vars from form
	public $ActyTitle; //title
	public $ActyID;
	public $UserID; //user
	public $SeverityID; //severity
	public $CategoryID; //category
	public $ActyStartDate; //activity date
	public $Textarea; //textarea
	public $AreaID;
	public $LogText;
	public $ModifiedBy;
	public $ModifiedDate;
	public $IssueID;
	public $ReferTo;
	public $is_Resolved;

	public $LastID; //so tags can access this

	public function __construct()
	{
		$db = new Database();
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
		//$this->Insert_Log(); // execute insert of textarea
		//return $sql->errorCode();
	}

	public function Insert_Log()
	//insert logs
	{
		$q = "INSERT INTO activity_log
				( ActyID,  LogText,  LogSeverityID,  UserID,  LogDate,  LogIssue,  ReferTo) VALUES
				(:ActyID, :LogText, :LogSeverityID, :UserID, :LogDate, :LogIssue, :ReferTo)";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(':ActyID', 			$this->LastID);
		$sql->bindParam(':LogText',			$this->LogText);
		$sql->bindParam(':LogSeverityID', 	$this->SeverityID);
		$sql->bindParam(':UserID',			$this->UserID);
		$sql->bindParam(':LogDate', 		$this->ActyStartDate);
		$sql->bindParam(':LogIssue',		$this->IssueID);
		$sql->bindParam(':ReferTo',			$this->ReferTo);
		

		$sql->execute();

		return $this->conn->lastInsertID();

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
		$q = "SELECT * FROM activity_titles ORDER BY ActyID DESC ";
		$sql = $this->conn->prepare($q);
		$sql->execute();
		return $row = $sql->fetchAll(PDO::FETCH_ASSOC);
	}
	

	public function Get_Activity_Detail($ActyID)
	{
		$q = "SELECT DetailText FROM activity_details WHERE ActyID = ?";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $ActyID);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$this->textarea = $row['DetailText'];
	}

	public function Get_Title_Data($ActyID)
	//get each activity data - used in index
	{
		$q = "SELECT * FROM activity_titles WHERE ActyID = ?";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $ActyID);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$this->ActyTitle = $row['ActyTitle'];
		$this->SeverityID = $row['SeverityID'];
		$this->CategoryID = $row['CategoryID'];
		$this->AreaID = $row['AreaID'];
		$this->UserID = $row['UserID'];
		$this->ActyStartDate = $row['ActyStartDate'];
		$this->ModifiedUserID = $row['ModifiedUserID'];
		$this->ModifiedDate = $row['ModifiedDate'];

	}

	public function Get_Logs($ActyID)
	//retrieve log from a specific activity
	{
		$q = "SELECT * FROM activity_log WHERE ActyID = ?";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $ActyID);	
		$sql->execute();
		return $sql->fetchALL(PDO::FETCH_ASSOC);
	
	}

	public function Last_Log_Insert($LastID)
	// Get last inserted log for json post success();
	{
		$q = "SELECT * FROM activity_log WHERE LogID = ?";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $LastID);	
		$sql->execute();
		return $sql->fetch(PDO::FETCH_ASSOC);

	}



	 public function Count_Entries_Per_Date($ActyID)
	 //used by graphjs 
    {

        $q = "SELECT COUNT(1) AS count, DATE(LogDate) as date FROM activity_log WHERE ActyID = ? GROUP BY DATE(LogDate)";
        $sql = $this->conn->prepare($q);
        $sql->bindParam(1, $ActyID);
        $sql->execute();
        return $row = $sql->fetchALL(PDO::FETCH_ASSOC);
        
    }

    public function CountIssues($ActyID) 
    //total issues
    {
    
    	$q = "SELECT COUNT(*) as issueCount FROM `activity_log` WHERE LogIssue = '1' AND ActyID = ?";
    	$sql = $this->conn->prepare($q);

    	$sql->bindParam(1, $ActyID);
    	$sql->execute();
    	return $row = $sql->fetch(PDO::FETCH_ASSOC);

    }

    public function Count_Active_Issues($ActyID) 
    //count active issues need fix
    {
    	
    	$q = "SELECT count(*) AS active FROM `activity_log` WHERE LogIssue = '1' AND  is_Resolved = '0' AND ActyID = ? ";
    	$sql = $this->conn->prepare($q);
    	$sql->bindParam(1, $ActyID);
    	$sql->execute();
    	return $row = $sql->fetch(PDO::FETCH_ASSOC);

    }

    public function CountAnswers($ActyID) 
    //total answers
    {
    
    	$q = "SELECT COUNT(*) as answer FROM `activity_log` WHERE ReferTo != '0' AND ActyID = ?";
    	$sql = $this->conn->prepare($q);

    	$sql->bindParam(1, $ActyID);
    	$sql->execute();
    	return $row = $sql->fetch(PDO::FETCH_ASSOC);

    }


	public function Query($id)
	// html/log_submit.php
	{
		$q = "SELECT * FROM activity_log WHERE LogID = ?";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $id);
		$sql->execute();
		return $sql->fetch(PDO::FETCH_ASSOC);

	}

	/*
	 * UPDATE
	 */

	public function Update_Activity()
	{
		$q = "UPDATE activity_titles SET
						ActyTitle 		= :ActyTitle,
						CategoryID 		= :CategoryID,
						SeverityID 		= :SeverityID,
						AreaID 			= :AreaID,
						ActyStartDate	= :ActyStartDate,
						ModifiedDate	= :ModifiedDate,
						ModifiedUserID	= :ModifiedUserID
						WHERE	
						ActyID = :ActyID";

	

			
		$sql = $this->conn->prepare($q);

		$sql->bindParam(':ActyTitle', 	$this->ActyTitle);
		$sql->bindParam(':CategoryID',	$this->CategoryID);
		$sql->bindParam(':SeverityID',	$this->SeverityID);
		$sql->bindParam(':AreaID',		$this->AreaID);
		$sql->bindParam(':ActyStartDate',	$this->ActyStartDate);
		$sql->bindParam(':ModifiedDate',	$this->ModifiedDate);
		$sql->bindParam(':ModifiedUserID',	$this->UserID);
		$sql->bindParam(':ActyID',	$this->ActyID);


		$sql->execute();
		

		$this->Update_Activity_Detail(); // execute insert of textarea
		//$this->Insert_Log(); // execute insert of textarea
		//return $sql->errorCode();	


	}

	public function Update_Issue_As_Answered()
	//update issues with answers as is_Resolved
	{
		$q = "UPDATE activity_log SET
				is_Resolved = :is_Resolved
				WHERE
				LogID 	= :LogID";

		$sql = $this->conn->prepare($q);
		$sql->bindParam(':is_Resolved', $this->is_Resolved);
		$sql->bindParam(':LogID', $this->ReferTo);
		$sql->execute();

	}
	
	public function Update_Activity_Detail()
	//update activity textarea details
	{
		$q = "UPDATE activity_details SET
			  DetailText 	= :DetailText
			  WHERE  ActyID = :ActyID";
		$sql = $this->conn->prepare($q);

		$sql->bindParam(':ActyID', 		$this->ActyID);
		$sql->bindParam(':DetailText',	$this->Textarea);
		$sql->execute();


	}


}









 ?>