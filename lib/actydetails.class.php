<?php 


class ActyDetails {

	private $conn;
	private $Severity_List;
	private $Category_List;
	private $Area_List;

	public function __construct($db)
	{
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

 ?>