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
			  OR ActyPostDate LIKE '%".$query."%'";
		$sql = $this->conn->prepare($q);
		$sql->execute();

		if($sql->rowCount() != 0 ) {
			return $row = $sql->fetchAll(PDO::FETCH_ASSOC);
		} else {
			return false;
		}
	
	}




}


Class Dates {

	public function dateInterval($start, $end) {
	//$interval->format("Year: %Y Month: %M Day: %D - %H:%I:%S");	

			$start = new DateTime($start);
			$end = new DateTime($end);

			return $interval = $start->diff($end);
			

	}
}




?>