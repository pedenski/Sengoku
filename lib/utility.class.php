<?php
include_once('database.class.php');


Class Search {


	public function __construct()	{
		$db = new Database();
		$this->conn = $db->getConn();
	}


	public function Search($query) {
		$q = "SELECT * FROM activity_titles 
			  WHERE ActyTitle LIKE '%".$query."%'
			  OR ActyID LIKE '%".$query."%'";
		$sql = $this->conn->prepare($q);
		$sql->execute();

		if($sql->rowCount() != 0 ) {
			return $row = $sql->fetchAll(PDO::FETCH_ASSOC);
		} else {
			return false;
		}
	
	}


}





?>