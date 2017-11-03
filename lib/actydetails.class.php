<?php 
include_once('database.class.php');

class ActyDetails {

	private $conn;
	private $Severity_List;
	private $Category_List;
	private $Area_List;

	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->getConn();
	}

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

	public function Query_Severity_List()
	{
		$q = "SELECT SeverityID, SeverityName from activity_severity";
		$sql = $this->conn->prepare($q);
		
		$sql->execute();
		$this->Severity_List = $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	public function Query_Category_List()
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


}
?>