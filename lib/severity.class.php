<?php 


class Severity {

	private $conn;
	private $Severity_List;

	public function __construct($db)
	{
		$this->conn = $db->getConn();
	}

	public function Get_Severity_List()
	{
		$this->Query_Severity_List();
		return $this->Severity_List;
	}

	public function Query_Severity_List()
	{
		$q = "SELECT SeverityID, SeverityName from activity_severity";
		$sql = $this->conn->prepare($q);
		
		$sql->execute();
		$this->Severity_List = $sql->fetchAll(PDO::FETCH_ASSOC);
	}





}

 ?>