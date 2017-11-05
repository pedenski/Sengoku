<?php 
include_once('database.class.php');

class ActyDetails {

	private $conn;
	private $Severity_List;
	private $Category_List;
	private $Area_List;
	private $SeverityName;
	private $CategoryName;
	private $AreaName;

	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->getConn();
	}

	
	/** GET NAMES **/
	public function Get_Severity_Name($SeverityID)
	{
		$this->Query_Severity_Name($SeverityID);
		return $this->SeverityName;
	}

	public function Get_Category_Name($CategoryID)
	{
		$this->Query_Category_Name($CategoryID);
		return $this->CategoryName;
	}

	public function Get_Area_Name($AreaID)
	{
		$this->Query_Area_Name($AreaID);
		return $this->AreaName;
	}

	/** GET LISTINGS **/
	public function Get_Severity_List()
	{
		$this->Query_Severity_List();
		return $this->Severity_List;
	}

	public function Get_Category_List()
	{
		$this->Query_Category_List();
		return $this->Category_List;
	}

	public function Get_Area_List()
	{
		$this->Query_Area_List();
		return $this->Area_List;
	}


	public function Severity_Status($SeverityID)
	{
		switch($SeverityID){
			case 1:
				return "is-success";
				break;
			case 2:
				return "is-warning";
				break;
			case 3:
				return "is-danger";
				break;

		}
	}


	public function Query_Area_Name($AreaID)
	// TRANSLATE ID TO NAME e,g (1 = Butchery)
	{
		$q = "SELECT AreaName FROM activity_area where AreaID = ? ";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $AreaID);	
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$this->AreaName = $row['AreaName'];
	}	

	public function Query_Severity_Name($SeverityID)
	// TRANSLATE ID TO NAME e,g (1 = Low)
	{
		$q = "SELECT SeverityName FROM activity_severity where SeverityID = ? ";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $SeverityID);	
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$this->SeverityName = $row['SeverityName'];
	}

	public function Query_Category_Name($CategoryID)
	// TRANSLATE ID TO NAME e,g (1 = Optimizaton)
	{
		$q = "SELECT CategoryName from activity_category WHERE CategoryID = ?";
		$sql = $this->conn->prepare($q);
		$sql->bindParam(1, $CategoryID);
		$sql->execute();
		$row = $sql->fetch(PDO::FETCH_ASSOC);
		$this->CategoryName = $row['CategoryName'];
	}

	public function Query_Severity_List()
	//QUERY ALL SEVERITY ID AND NAME;
	{
		$q = "SELECT SeverityID, SeverityName from activity_severity";
		$sql = $this->conn->prepare($q);
		
		$sql->execute();
		$this->Severity_List = $sql->fetchAll(PDO::FETCH_ASSOC);
	}


	public function Query_Category_List()
	//QUERY ALL CATEGORY ID AND NAME
	{
		$q = "SELECT CategoryID, CategoryName from activity_category";
		$sql = $this->conn->prepare($q);
		
		$sql->execute();
		$this->Category_List = $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	public function Query_Area_List()
	{
		$q = "SELECT AreaID, AreaName from activity_area";
		$sql = $this->conn->prepare($q);
		
		$sql->execute();
		$this->Area_List = $sql->fetchAll(PDO::FETCH_ASSOC);
	}

}


class Validator extends ActyDetails {

	public function isPOST_Valid()
	{
		if(!$this->ifValid_Input())
		{
			return "Empty Field";
		} 
		elseif(!$this->ifValid_Category())
		{
			return "Please Select a valid category";
		}
		elseif(!$this->ifValid_Area())
		{
			return "Please select a valid area";
		}
	}

	public function ifValid_Input()
	{	
		$required = array('title','acty_date','textarea','tags');

		$isEmpty = false;
		$checked = array();
		foreach($required as $key)
		{
			if(empty($_POST[$key])) //check each $_POST 
			{
				$isEmpty = true; //true if found 1 empty $_POST
			}
		}

		if($isEmpty) //if true, an empty $_POST exists;
		{ 
			return false; //if empty
		}

		elseif(!$isEmpty) { 
			return true; 
		}

	}

	public function ifValid_Category()
	//checks if selected category from dropdown is valid
	{
		$CategoryList =  parent::Get_Category_List();
		foreach($CategoryList as $ckey => $cval) 
		{
			if(in_array($_POST['category'], $cval)) 
			{
				return true;
			}
		}
	}

	public function ifValid_Area()
	//checks if selected category from dropdown is valid
	{
		$AreaList =  parent::Get_Area_List();
		foreach($AreaList as $akey => $aval) 
		{
			if(in_array($_POST['area'], $aval)) 
			{
				return true;
			}
		}
	}

	public function ifValid_Severity()
	//checks if selected category from dropdown is valid
	{
		$CategoryList =  parent::Get_Severity_List();
		foreach($CategoryList as $ckey => $cval) 
		{
			if(in_array($_POST['severity'], $cval)) 
			{
				return true;
			}
		}
	}

	public function isLog_Valid()
	{
		if(!$this->ifValid_LogInput())
		{
			return "Empty Field";
		} 
		elseif(!$this->ifValid_Severity())
		{
			return "Please Select a valid severity";
		}
	}

	public function ifValid_LogInput()
	{	
		$required = array('acty_date','textarea');

		$isEmpty = false;
		$checked = array();
		foreach($required as $key)
		{
			if(empty($_POST[$key])) //check each $_POST 
			{
				$isEmpty = true; //true if found 1 empty $_POST
			}
		}

		if($isEmpty) //if true, an empty $_POST exists;
		{ 
			return false; //if empty
		}

		elseif(!$isEmpty) { 
			return true; 
		}

	}


}
?>